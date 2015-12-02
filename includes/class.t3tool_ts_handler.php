<?php


	/**
	 * Class t3tool_ts_handler
	 *
	 * TypoScript handler that handles TypoScript without TYPO3 initialization
	 */
	class t3tool_ts_handler
	{

		/**
		 * Formats a parsed array back to Typoscript with indenting and bracketing.
		 */
		public static function format_ts(array $config, $depth = 0, $prefix = '') {
			$ts = '';
			foreach ($config as $k_ => $v) {
				$k = rtrim($k_, '.');
				if (is_array($v)) {
					// on root level, use dot notation if possible
					if (sizeof($v) == 1 && $depth == 0) {
						$ts .= $k . '.' . self::format_ts($v);
					} else {
						$ts .= str_repeat(INDENT, $depth) . "$k {\n";
						$ts .= self::format_ts($v, $depth + 1);
						$ts .= str_repeat(INDENT, $depth) . "}\n";
					}
				} else {
					$ts .= str_repeat(INDENT, $depth);
					if (strstr($v, "\n")) {
						$ts .= "$k (\n$v\n" . str_repeat(INDENT, $depth) . ")\n";
					} else {
						$ts .= "$k = $v\n";
					}
				}
			}
			$ts = $prefix . str_replace("\n", "\n" . $prefix, $ts);
			$ts = rtrim($ts, $prefix);
			$ts = preg_replace(";\n+;", "\n", $ts);
			return $ts;
		}

		/**
		 * @param array $added
		 * @param array $deleted
		 * @param int $depth
		 * @param string $prefix
		 * @return string
		 */
		public static function format_ts_diff(&$added, &$deleted, $path, $depth = 0, $prefix = '') {
			$ts = '';

			for ($runThrough = 0; $runThrough < 2; $runThrough++) {
				switch ($runThrough) {
					case 0 :
						$pri = self::getTSByPath($added, $path);
						$sec = self::getTSByPath($deleted, $path);
						break;
					case 1 :
						$pri = self::getTSByPath($deleted, $path);
						$sec = self::getTSByPath($added, $path);
						break;
				}

				if ($depth == 20) {


					echo 'pri : ';
					var_dump($pri);
					echo 'sec : ';
					var_dump($sec);
					die;
				}

				if (is_array($pri) && sizeof($pri)) {


					foreach ($pri as $k_ => $v) {
						$k = rtrim($k_, '.');
						$v_sec = isset($sec[$k_]) ? $sec[$k_] : NULL;

						if (is_array($v)) {
							if (FALSE && sizeof($v) == 1 && $depth == 0) {
								$ts .= '  ' . $k . '.' . self::format_ts_diff($v, $v_sec, $depth);
							} else {
								$ts .= '  ' . str_repeat("  ", $depth) . "$k {\n";
								$ts .= self::format_ts_diff($added, $deleted, $path . $k_, $depth + 1);
								$ts .= '  ' . str_repeat("  ", $depth) . "}\n";
							}
						} else {
							if (strstr($v, "\n")) {
								$ts .= "$k (\n$v\n" . str_repeat("  ", $depth) . ")\n";
							} else {
								if ($v_sec !== NULL) {
									$ts .= $runThrough == 1 ? PREFIX_ADDITION : PREFIX_DELETION;

									$ts .= str_repeat("  ", $depth);
									$ts .= "$k = $v_sec\n";

									if ($runThrough == 0) {
										self::removeConfigByPath($deleted, $path . $k_);
									} else {
										self::removeConfigByPath($added, $path . $k_);
									}


								}
								$ts .= $runThrough == 0 ? PREFIX_ADDITION : PREFIX_DELETION;
								$ts .= str_repeat("  ", $depth);
								$ts .= "$k = $v" . COLOR_RESET . "\n";
							}
						}
					}
				}
				$ts = $prefix . str_replace("\n", "\n" . $prefix, $ts);
				$ts = rtrim($ts, $prefix);
				$ts = preg_replace(";\n+;", "\n", $ts);
			}
			return $ts;
		}

		/**
		 * @param $ts
		 */
		public static function reformat_ts($ts) {

		}

		/**
		 * @param $ts
		 */
		public static function reindent_ts($ts) {

		}

		/**
		 *
		 */
		public static function getTSByPath($config, $path) {

			$path = trim($path, ' .');
			if (!$path) {
				return $config;
			}

			$parts = explode('.', $path);
			foreach ($parts as $part_) {
				$part = $part_ . '.';
				if (!isset($config[$part])) {
					if (isset($config[$part_])) {
						return $config[$part_];
					}
					return FALSE;
				}
				$config = $config[$part];
			}
			return $config;
		}


		public static function removeConfigByPath(&$config, $path) {
			// print_r($config); var_dump($path);
			$path = trim($path, ' .');
			if (!$path) {
				return;
			}

			$path = preg_replace('/\.+/', '.', $path);
			$parts = explode('.', $path);
			$prevEl = NULL;
			$el = &$config;

			foreach ($parts as $i => &$part_) {
				if (!trim($part_, ' .')) {
					continue;
				}

				$part = $part_ . '.';

				// @TODO : is this as good as checking if we have a leaf part ?
				if (!isset($el[$part])) {
					if (isset($el[$part_])) {
						$part = $part_;
					}
				}

				$prevEl = &$el;
				$el = &$el[$part];
			}
			if ($prevEl !== NULL) {
				unset($prevEl[$part]);
				// if this was the last element, remove the parent
				if (sizeof($prevEl) == 0) {
					$pathMinusLastPart = implode('.', array_slice($parts, 0, $i));
					self::removeConfigByPath($config, $pathMinusLastPart);
				}
			}

		}

		/**
		 * @param $ts1
		 * @param $ts2
		 * @param int $indent
		 */
		public static function output_formatted_ts_diff(array $ts1, array $ts2, $indent = 0) {
			$removed = self::array_diff_recursive($ts1, $ts2);
			$added = self::array_diff_recursive($ts2, $ts1);

			$someFlag = FALSE;

			if (sizeof($removed) || sizeof($added)) {
			} else {
				print "No difference\n";
				return;
			}


			if (TRUE) {
				echo COLOR_BOLD . "\nSplit:\n" . COLOR_RESET;
				if (sizeof($removed)) {
					print self::format_ts($removed, $indent, COLOR_DELETION . "- ");
					echo COLOR_RESET;
				}
			}

			if (TRUE) {
				if (sizeof($added)) {

					echo "\n";
					print self::format_ts($added, $indent, COLOR_ADDITION . "+ ");
					echo COLOR_RESET;
				}
				echo COLOR_BOLD . "\nCombined:\n" . COLOR_RESET;
			}

			if (FALSE) {
				echo self::format_ts_diff($added, $removed, '', 0);

			}
			echo COLOR_RESET;

		}

		/**
		 * Returns all elements in $a
		 */
		public static function array_diff_recursive(array $a, array $b) {
			$result = array();
			foreach ($a as $k => $v) {
				if (array_key_exists($k, $b)) {
					if (is_array($v)) {
						$diff = self::array_diff_recursive($v, $b[$k]);
						if (sizeof($diff)) {
							$result[$k] = $diff;
						}
					} else {
						if (self::strip_whitespace_in_lines($v) != self::strip_whitespace_in_lines($b[$k])) {
							$result[$k] = $v;
						}
					}
				} else {
					$result[$k] = $v;
				}
			}
			return $result;
		}

		/**
		 * Recursively computes the intersection of arrays using keys for comparison.
		 *
		 * @param   array $array1 The array with master keys to check.
		 * @param   array $array2 An array to compare keys against.
		 * @return  array associative array containing all the entries of array1 which have keys that are present in array2.
		 **/
		public static function array_intersect_key_recursive(array $array1, array $array2) {
			$array1 = array_intersect_key($array1, $array2);
			foreach ($array1 as $key => &$value) {
				if (is_array($value) && is_array($array2[$key])) {
					$value = array_intersect_key_recursive($value, $array2[$key]);
				}
			}
			return $array1;
		}


		public static function strip_whitespace_in_lines($s) {
			$lines = array();
			foreach (explode("\n", $s) as $line) {
				$lines[] = trim($line);
			}
			return implode("\n", $lines);
		}

		/**
		 * Output an array of TS as PHP.
		 *
		 * @param $config
		 */
		public static function export_ts($config) {
			echo '<?php $config=';
			var_export($config);
			echo ";";
		}

		/**
		 * Load and concat TS from dir.
		 * Path can be a file or directory.
		 *
		 * @param $path
		 */
		public static function readTsFromDirectory($path) {

			$path = rtrim($path, '/');
			$ts = "\n#\n# " . $path . "\n#\n";

			if (is_file($path)) {
				if (preg_match('/\.(ts)$/', $path)) {
					$ts .= file_get_contents($path);
				}
			}
			if (is_dir($path)) {
				foreach (scandir($path) as $file) {
					if ($file{0} == '.') {
						continue;
					}
					$ts .= self::readTsFromDirectory($path . '/' . $file);

				}
			}


			return $ts;

		}


		public static function diff($old, $new) {
			$matrix = array();
			$maxlen = 0;
			foreach ($old as $oindex => $ovalue) {
				$nkeys = array_keys($new, $ovalue);
				foreach ($nkeys as $nindex) {
					$matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ?
						$matrix[$oindex - 1][$nindex - 1] + 1 : 1;
					if ($matrix[$oindex][$nindex] > $maxlen) {
						$maxlen = $matrix[$oindex][$nindex];
						$omax = $oindex + 1 - $maxlen;
						$nmax = $nindex + 1 - $maxlen;
					}
				}
			}
			if ($maxlen == 0) return array(array('d' => $old, 'i' => $new));
			return array_merge(
				self::diff(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
				array_slice($new, $nmax, $maxlen),
				self::diff(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
		}

		public static function htmlDiff($old, $new) {
			$ret = '';
			$diff = self::diff(preg_split("/[\s]+/", $old), preg_split("/[\s]+/", $new));
			foreach ($diff as $k) {
				if (is_array($k))
					$ret .= (!empty($k['d']) ? "<del>" . implode(' ', $k['d']) . "</del> " : '') .
						(!empty($k['i']) ? "<ins>" . implode(' ', $k['i']) . "</ins> " : '');
				else $ret .= $k . ' ';
			}
			return $ret;
		}

		public static function shDiff($old, $new) {
			$ret = '';
			$diff = self::diff(preg_split("/[\s]+/", $old), preg_split("/[\s]+/", $new));
			foreach ($diff as $k) {
				if (is_array($k))
					$ret .= (!empty($k['d']) ? "\n" . PREFIX_DELETION . implode("\n" . PREFIX_DELETION, $k['d']) . COLOR_RESET : '') .
						(!empty($k['i']) ? "\n" . PREFIX_ADDITION . implode("\n" . PREFIX_ADDITION, $k['i']) . COLOR_RESET : '');
				else $ret .= "\n" . PREFIX_NOTCHANGED . $k;
			}
			$ret .= "\n";
			return $ret;
		}


	}