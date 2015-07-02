<?php
namespace TYPO3\CMS\Core\Utility;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
/**
 * Class with helper functions for array handling
 *
 * @author Susanne Moog <typo3@susanne-moog.de>
 */
class ArrayUtility {

	/**
	 * Reduce an array by a search value and keep the array structure.
	 *
	 * Comparison is type strict:
	 * - For a given needle of type string, integer, array or boolean,
	 * value and value type must match to occur in result array
	 * - For a given object, a object within the array must be a reference to
	 * the same object to match (not just different instance of same class)
	 *
	 * Example:
	 * - Needle: 'findMe'
	 * - Given array:
	 * array(
	 *   'foo' => 'noMatch',
	 *   'bar' => 'findMe',
	 *   'foobar => array(
	 *     'foo' => 'findMe',
	 *   ),
	 * );
	 * - Result:
	 * array(
	 *   'bar' => 'findMe',
	 *   'foobar' => array(
	 *     'foo' => findMe',
	 *   ),
	 * );
	 *
	 * See the unit tests for more examples and expected behaviour
	 *
	 * @param mixed $needle The value to search for
	 * @param array $haystack The array in which to search
	 * @return array $haystack array reduced matching $needle values
	 */
	static public function filterByValueRecursive($needle = '', array $haystack = array()) {
		$resultArray = array();
		// Define a lambda function to be applied to all members of this array dimension
		// Call recursive if current value is of type array
		// Write to $resultArray (by reference!) if types and value match
		$callback = function (&$value, $key) use($needle, &$resultArray) {
			if ($value === $needle) {
				($resultArray[$key] = $value);
			} elseif (is_array($value)) {
				($subArrayMatches = \TYPO3\CMS\Core\Utility\ArrayUtility::filterByValueRecursive($needle, $value));
				if (count($subArrayMatches) > 0) {
					($resultArray[$key] = $subArrayMatches);
				}
			}
		};
		// array_walk() is not affected by the internal pointers, no need to reset
		array_walk($haystack, $callback);
		// Pointers to result array are reset internally
		return $resultArray;
	}

	/**
	 * Checks if a given path exists in array
	 *
	 * Example:
	 * - array:
	 * array(
	 *   'foo' => array(
	 *     'bar' = 'test',
	 *   )
	 * );
	 * - path: 'foo/bar'
	 * - return: TRUE
	 *
	 * @param array $array Given array
	 * @param string $path Path to test, 'foo/bar/foobar'
	 * @param string $delimiter Delimeter for path, default /
	 * @return boolean TRUE if path exists in array
	 */
	static public function isValidPath(array $array, $path, $delimiter = '/') {
		$isValid = TRUE;
		try {
			// Use late static binding to enable mocking of this call in unit tests
			static::getValueByPath($array, $path, $delimiter);
		} catch (\RuntimeException $e) {
			$isValid = FALSE;
		}
		return $isValid;
	}

	/**
	 * Returns a value by given path
	 *
	 * Example
	 * - array:
	 * array(
	 *   'foo' => array(
	 *     'bar' => array(
	 *       'baz' => 42
	 *     )
	 *   )
	 * );
	 * - path: foo/bar/baz
	 * - return: 42
	 *
	 * If a path segments contains a delimiter character, the path segment
	 * must be enclosed by " (double quote), see unit tests for details
	 *
	 * @param array $array Input array
	 * @param string $path Path within the array
	 * @param string $delimiter Defined path delimiter, default /
	 * @return mixed
	 * @throws \RuntimeException
	 */
	static public function getValueByPath(array $array, $path, $delimiter = '/') {
		if (empty($path)) {
			throw new \RuntimeException('Path must not be empty', 1341397767);
		}
		// Extract parts of the path
		$path = str_getcsv($path, $delimiter);
		// Loop through each part and extract its value
		$value = $array;
		foreach ($path as $segment) {
			if (array_key_exists($segment, $value)) {
				// Replace current value with child
				$value = $value[$segment];
			} else {
				// Fail if key does not exist
				throw new \RuntimeException('Path does not exist in array', 1341397869);
			}
		}
		return $value;
	}

	/**
	 * Modifies or sets a new value in an array by given path
	 *
	 * Example:
	 * - array:
	 * array(
	 *   'foo' => array(
	 *     'bar' => 42,
	 *   ),
	 * );
	 * - path: foo/bar
	 * - value: 23
	 * - return:
	 * array(
	 *   'foo' => array(
	 *     'bar' => 23,
	 *   ),
	 * );
	 *
	 * @param array $array Input array to manipulate
	 * @param string $path Path in array to search for
	 * @param mixed $value Value to set at path location in array
	 * @param string $delimiter Path delimiter
	 * @return array Modified array
	 * @throws \RuntimeException
	 */
	static public function setValueByPath(array $array, $path, $value, $delimiter = '/') {
		if (empty($path)) {
			throw new \RuntimeException('Path must not be empty', 1341406194);
		}
		if (!is_string($path)) {
			throw new \RuntimeException('Path must be a string', 1341406402);
		}
		// Extract parts of the path
		$path = str_getcsv($path, $delimiter);
		// Point to the root of the array
		$pointer = &$array;
		// Find path in given array
		foreach ($path as $segment) {
			// Fail if the part is empty
			if (empty($segment)) {
				throw new \RuntimeException('Invalid path segment specified', 1341406846);
			}
			// Create cell if it doesn't exist
			if (!array_key_exists($segment, $pointer)) {
				$pointer[$segment] = array();
			}
			// Set pointer to new cell
			$pointer = &$pointer[$segment];
		}
		// Set value of target cell
		$pointer = $value;
		return $array;
	}

	/**
	 * Remove a sub part from an array specified by path
	 *
	 * @param array $array Input array to manipulate
	 * @param string $path Path to remove from array
	 * @param string $delimiter Path delimiter
	 * @return array Modified array
	 * @throws \RuntimeException
	 */
	static public function removeByPath(array $array, $path, $delimiter = '/') {
		if (empty($path)) {
			throw new \RuntimeException('Path must not be empty', 1371757718);
		}
		if (!is_string($path)) {
			throw new \RuntimeException('Path must be a string', 1371757719);
		}
		// Extract parts of the path
		$path = str_getcsv($path, $delimiter);
		$pathDepth = count($path);
		$currentDepth = 0;
		$pointer = &$array;
		// Find path in given array
		foreach ($path as $segment) {
			$currentDepth++;
			// Fail if the part is empty
			if (empty($segment)) {
				throw new \RuntimeException('Invalid path segment specified', 1371757720);
			}
			if (!array_key_exists($segment, $pointer)) {
				throw new \RuntimeException('Path segment ' . $segment . ' does not exist in array', 1371758436);
			}
			if ($currentDepth === $pathDepth) {
				unset($pointer[$segment]);
			} else {
				$pointer = &$pointer[$segment];
			}
		}
		return $array;
	}

	/**
	 * Sorts an array recursively by key
	 *
	 * @param $array Array to sort recursively by key
	 * @return array Sorted array
	 */
	static public function sortByKeyRecursive(array $array) {
		ksort($array);
		foreach ($array as $key => $value) {
			if (is_array($value) && !empty($value)) {
				$array[$key] = self::sortByKeyRecursive($value);
			}
		}
		return $array;
	}

	/**
	 * Sort an array of arrays by a given key using uasort
	 *
	 * @param array $arrays Array of arrays to sort
	 * @param string $key Key to sort after
	 * @param bool $ascending Set to TRUE for ascending order, FALSE for descending order
	 * @return array Array of sorted arrays
	 * @throws \RuntimeException
	 */
	static public function sortArraysByKey(array $arrays, $key, $ascending = TRUE) {
		if (empty($arrays)) {
			return $arrays;
		}
		// @ operator used: Some PHP versions like 5.4.4-14+deb7u8 (debian wheezy) are
		// affected by PHP bug https://bugs.php.net/bug.php?id=50688 and trigger a warning.
		// The code itself is ok and covered by unit tests, so the @ operator is used to
		// suppress output of the PHP bug. This can be removed if the core does not
		// support PHP version affected by this issue anymore.
		$sortResult = @uasort($arrays, function (array $a, array $b) use ($key, $ascending) {
			if (!isset($a[$key]) || !isset($b[$key])) {
				throw new \RuntimeException('The specified sorting key "' . $key . '" is not available in the given array.', 1373727309);
			}
			return ($ascending) ? strcasecmp($a[$key], $b[$key]) : strcasecmp($b[$key], $a[$key]);
		});
		if (!$sortResult) {
			throw new \RuntimeException('The function uasort() failed for unknown reasons.', 1373727329);
		}
		return $arrays;
	}

	/**
	 * Exports an array as string.
	 * Similar to var_export(), but representation follows the TYPO3 core CGL.
	 *
	 * See unit tests for detailed examples
	 *
	 * @param array $array Array to export
	 * @param integer $level Internal level used for recursion, do *not* set from outside!
	 * @return string String representation of array
	 * @throws \RuntimeException
	 */
	static public function arrayExport(array $array = array(), $level = 0) {
		$lines = 'array(' . LF;
		$level++;
		$writeKeyIndex = FALSE;
		$expectedKeyIndex = 0;
		foreach ($array as $key => $value) {
			if ($key === $expectedKeyIndex) {
				$expectedKeyIndex++;
			} else {
				// Found a non integer or non consecutive key, so we can break here
				$writeKeyIndex = TRUE;
				break;
			}
		}
		foreach ($array as $key => $value) {
			// Indention
			$lines .= str_repeat(TAB, $level);
			if ($writeKeyIndex) {
				// Numeric / string keys
				$lines .= is_int($key) ? $key . ' => ' : '\'' . $key . '\' => ';
			}
			if (is_array($value)) {
				if (count($value) > 0) {
					$lines .= self::arrayExport($value, $level);
				} else {
					$lines .= 'array(),' . LF;
				}
			} elseif (is_int($value) || is_float($value)) {
				$lines .= $value . ',' . LF;
			} elseif (is_null($value)) {
				$lines .= 'NULL' . ',' . LF;
			} elseif (is_bool($value)) {
				$lines .= $value ? 'TRUE' : 'FALSE';
				$lines .= ',' . LF;
			} elseif (is_string($value)) {
				// Quote \ to \\
				$stringContent = str_replace('\\', '\\\\', $value);
				// Quote ' to \'
				$stringContent = str_replace('\'', '\\\'', $stringContent);
				$lines .= '\'' . $stringContent . '\'' . ',' . LF;
			} else {
				throw new \RuntimeException('Objects are not supported', 1342294987);
			}
		}
		$lines .= str_repeat(TAB, ($level - 1)) . ')' . ($level - 1 == 0 ? '' : ',' . LF);
		return $lines;
	}

	/**
	 * Converts a multidimensional array to a flat representation.
	 *
	 * See unit tests for more details
	 *
	 * Example:
	 * - array:
	 * array(
	 *   'first.' => array(
	 *     'second' => 1
	 *   )
	 * )
	 * - result:
	 * array(
	 *   'first.second' => 1
	 * )
	 *
	 * Example:
	 * - array:
	 * array(
	 *   'first' => array(
	 *     'second' => 1
	 *   )
	 * )
	 * - result:
	 * array(
	 *   'first.second' => 1
	 * )
	 *
	 * @param array $array The (relative) array to be converted
	 * @param string $prefix The (relative) prefix to be used (e.g. 'section.')
	 * @return array
	 */
	static public function flatten(array $array, $prefix = '') {
		$flatArray = array();
		foreach ($array as $key => $value) {
			// Ensure there is no trailling dot:
			$key = rtrim($key, '.');
			if (!is_array($value)) {
				$flatArray[$prefix . $key] = $value;
			} else {
				$flatArray = array_merge($flatArray, self::flatten($value, $prefix . $key . '.'));
			}
		}
		return $flatArray;
	}

	/**
	 * Determine the intersections between two arrays, recursively comparing keys
	 * A complete sub array of $source will be preserved, if the key exists in $mask.
	 *
	 * See unit tests for more examples and edge cases.
	 *
	 * Example:
	 * - source:
	 * array(
	 *   'key1' => 'bar',
	 *   'key2' => array(
	 *     'subkey1' => 'sub1',
	 *     'subkey2' => 'sub2',
	 *   ),
	 *   'key3' => 'baz',
	 * )
	 * - mask:
	 * array(
	 *   'key1' => NULL,
	 *   'key2' => array(
	 *     'subkey1' => exists',
	 *   ),
	 * )
	 * - return:
	 * array(
	 *   'key1' => 'bar',
	 *   'key2' => array(
	 *     'subkey1' => 'sub1',
	 *   ),
	 * )
	 *
	 * @param array $source Source array
	 * @param array $mask Array that has the keys which should be kept in the source array
	 * @return array Keys which are present in both arrays with values of the source array
	 */
	public static function intersectRecursive(array $source, array $mask = array()) {
		$intersection = array();
		foreach ($source as $key => $_) {
			if (!array_key_exists($key, $mask)) {
				continue;
			}
			if (is_array($source[$key]) && is_array($mask[$key])) {
				$value = self::intersectRecursive($source[$key], $mask[$key]);
				if (!empty($value)) {
					$intersection[$key] = $value;
				}
			} else {
				$intersection[$key] = $source[$key];
			}
		}
		return $intersection;
	}

	/**
	 * Renumber the keys of an array to avoid leaps if keys are all numeric.
	 *
	 * Is called recursively for nested arrays.
	 *
	 * Example:
	 *
	 * Given
	 *  array(0 => 'Zero' 1 => 'One', 2 => 'Two', 4 => 'Three')
	 * as input, it will return
	 *  array(0 => 'Zero' 1 => 'One', 2 => 'Two', 3 => 'Three')
	 *
	 * Will treat keys string representations of number (ie. '1') equal to the
	 * numeric value (ie. 1).
	 *
	 * Example:
	 * Given
	 *  array('0' => 'Zero', '1' => 'One' )
	 * it will return
	 *  array(0 => 'Zero', 1 => 'One')
	 *
	 * @param array $array Input array
	 * @param integer $level Internal level used for recursion, do *not* set from outside!
	 * @return array
	 */
	static public function renumberKeysToAvoidLeapsIfKeysAreAllNumeric(array $array = array(), $level = 0) {
		$level++;
		$allKeysAreNumeric = TRUE;
		foreach ($array as $key => $_) {
			if (is_numeric($key) === FALSE) {
				$allKeysAreNumeric = FALSE;
				break;
			}
		}
		$renumberedArray = $array;
		if ($allKeysAreNumeric === TRUE) {
			$renumberedArray = array_values($array);
		}
		foreach ($renumberedArray as $key => $value) {
			if (is_array($value)) {
				$renumberedArray[$key] = self::renumberKeysToAvoidLeapsIfKeysAreAllNumeric($value, $level);
			}
		}
		return $renumberedArray;
	}


	/**
	 * Merges two arrays recursively and "binary safe" (integer keys are
	 * overridden as well), overruling similar values in the original array
	 * with the values of the overrule array.
	 * In case of identical keys, ie. keeping the values of the overrule array.
	 *
	 * This method takes the original array by reference for speed optimization with large arrays
	 *
	 * The differences to the existing PHP function array_merge_recursive() are:
	 *  * Keys of the original array can be unset via the overrule array. ($enableUnsetFeature)
	 *  * Much more control over what is actually merged. ($addKeys, $includeEmptyValues)
	 *  * Elements or the original array get overwritten if the same key is present in the overrule array.
	 *
	 * @param array $original Original array. It will be *modified* by this method and contains the result afterwards!
	 * @param array $overrule Overrule array, overruling the original array
	 * @param boolean $addKeys If set to FALSE, keys that are NOT found in $original will not be set. Thus only existing value can/will be overruled from overrule array.
	 * @param boolean $includeEmptyValues If set, values from $overrule will overrule if they are empty or zero.
	 * @param boolean $enableUnsetFeature If set, special values "__UNSET" can be used in the overrule array in order to unset array keys in the original array.
	 * @return void
	 */
	static public function mergeRecursiveWithOverrule(array &$original, array $overrule, $addKeys = TRUE, $includeEmptyValues = TRUE, $enableUnsetFeature = TRUE) {
		foreach ($overrule as $key => $_) {
			if ($enableUnsetFeature && $overrule[$key] === '__UNSET') {
				unset($original[$key]);
				continue;
			}
			if (isset($original[$key]) && is_array($original[$key])) {
				if (is_array($overrule[$key])) {
					self::mergeRecursiveWithOverrule($original[$key], $overrule[$key], $addKeys, $includeEmptyValues, $enableUnsetFeature);
				}
			} elseif (
				($addKeys || isset($original[$key])) &&
				($includeEmptyValues || $overrule[$key])
			) {
				$original[$key] = $overrule[$key];
			}
		}
		// This line is kept for backward compatibility reasons.
		reset($original);
	}
}
