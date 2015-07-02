<?php
namespace TYPO3\CMS\Extbase\Mvc\Controller;

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
 * A validator for controller arguments
 *
 * @deprecated since Extbase 1.4.0, will be removed two versions after Extbase 6.1 Is only needed for old property mapper.
 */
class ArgumentsValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractObjectValidator {

	/**
	 * Checks if the given value (ie. an Arguments object) is valid.
	 *
	 * If at least one error occurred, the result is FALSE and any errors can
	 * be retrieved through the getErrors() method.
	 *
	 * @param object $arguments The arguments object that should be validated
	 * @throws \InvalidArgumentException
	 * @return boolean TRUE if all arguments are valid, FALSE if an error occurred
	 */
	public function isValid($arguments) {
		if (!$arguments instanceof \TYPO3\CMS\Extbase\Mvc\Controller\Arguments) {
			throw new \InvalidArgumentException('Expected TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments, ' . gettype($arguments) . ' given.', 1241079561);
		}
		$this->errors = array();
		$result = TRUE;
		foreach ($arguments->getArgumentNames() as $argumentName) {
			if ($this->isPropertyValid($arguments, $argumentName) === FALSE) {
				$result = FALSE;
			}
		}
		return $result;
	}

	/**
	 * Checks the given object can be validated by the validator implementation
	 *
	 * @param object $object The object to be checked
	 * @return boolean TRUE if this validator can validate instances of the given object or FALSE if it can't
	 */
	public function canValidate($object) {
		return $object instanceof \TYPO3\CMS\Extbase\Mvc\Controller\Arguments;
	}

	/**
	 * Checks if the specified property (ie. the argument) of the given arguments
	 * object is valid. Validity is checked by first invoking the validation chain
	 * defined in the argument object.
	 *
	 * If at least one error occurred, the result is FALSE.
	 *
	 * @param object $arguments The arguments object containing the property (argument) to validate
	 * @param string $argumentName Name of the property (ie. name of the argument) to validate
	 * @throws \InvalidArgumentException
	 * @return boolean TRUE if the argument is valid, FALSE if an error occurred
	 */
	public function isPropertyValid($arguments, $argumentName) {
		if (!$arguments instanceof \TYPO3\CMS\Extbase\Mvc\Controller\Arguments) {
			throw new \InvalidArgumentException('Expected TYPO3\\CMS\\Extbase\\Mvc\\Controller\\Arguments, ' . gettype($arguments) . ' given.', 1241079562);
		}
		$argument = $arguments[$argumentName];
		$validatorConjunction = $argument->getValidator();
		if ($validatorConjunction === NULL) {
			return TRUE;
		}
		$argumentValue = $argument->getValue();
		if ($argumentValue === $argument->getDefaultValue() && $argument->isRequired() === FALSE) {
			return TRUE;
		}
		if ($validatorConjunction->isValid($argumentValue) === FALSE) {
			$this->addErrorsForArgument($validatorConjunction->getErrors(), $argumentName);
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Adds the given errors to $this->errors and creates an ArgumentError
	 * instance if needed.
	 *
	 * @param array $errors Array of \TYPO3\CMS\Extbase\Validation\Error
	 * @param string $argumentName Name of the argument to add errors for
	 * @return void
	 */
	protected function addErrorsForArgument(array $errors, $argumentName) {
		if (!isset($this->errors[$argumentName])) {
			$this->errors[$argumentName] = new \TYPO3\CMS\Extbase\Mvc\Controller\ArgumentError($argumentName);
		}
		$this->errors[$argumentName]->addErrors($errors);
	}
}
