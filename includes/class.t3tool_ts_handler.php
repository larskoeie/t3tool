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
		public static function format_ts_diff($added, $deleted, $depth = 0, $prefix = '') {
			$ts = '';

			for ($runThrough = 0; $runThrough < 1; $runThrough++) {
				switch ($runThrough) {
					case 0 :
						$pri = &$added;
						$sec = &$deleted;
						break;
					case 1 :
						$pri = &$deleted;
						$sec = &$added;

						break;
				}

				if ($depth == 10) {


				echo 'pri : '; var_dump($pri);
				echo 'sec : '; var_dump($sec);
				}

				if (is_array($pri)) {

					foreach ($pri as $k_ => $v) {
						$k = rtrim($k_, '.');
						$v_sec = isset($sec[$k_]) ? $sec[$k_] : NULL;

						if (is_array($v)) {
							if (FALSE && sizeof($v) == 1 && $depth == 0) {
								$ts .= ' ' . $k . '.' . self::format_ts_diff($v, $v_sec, $depth);
							} else {
								$ts .= ' ' . str_repeat("  ", $depth) . "$k {\n";
								$ts .= self::format_ts_diff($added[$k_], $deleted[$k_], $depth + 1);
								$ts .= ' ' . str_repeat("  ", $depth) . "}\n";
							}
						} else {
							if (strstr($v, "\n")) {
								$ts .= "$k (\n$v\n" . str_repeat("  ", $depth) . ")\n";
							} else {
								if ($v_sec !== NULL) {
									$ts .= $runThrough == 1 ? (COLOR_ADDITION . '+') : (COLOR_DELETION . '-');

									$ts .= str_repeat("  ", $depth);
									$ts .= "$k = $v_sec\n";

									if ($runThrough == 0) {
										unset($deleted[$k_]);
									} else {
										unset($added[$k_]);
									}


								}
								$ts .= $runThrough == 0 ? (COLOR_ADDITION . '+') : (COLOR_DELETION . '-');
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
			$parts = explode('.', $path);
			foreach ($parts as $part_) {
				$part = $part_ . '.';
				if (!isset($config[$part])) {
					return FALSE;
				}
				$config = $config[$part];
			}
			return $config;
		}


		public static function removeConfigByPath (&$config, $path){

		}

		/**
		 * @param $ts1
		 * @param $ts2
		 * @param int $indent
		 */
		public static function output_formatted_ts_diff($ts1, $ts2, $indent = 0) {
			$removed = self::array_diff_recursive($ts1, $ts2);
			$added = self::array_diff_recursive($ts2, $ts1);


			if (sizeof($removed) || sizeof($added)) {
			} else {
				print "No difference\n";
				return;
			}


			if ($someFlag) {
				if (sizeof($removed)) {
					echo "Deletions:\n";
					print self::format_ts($removed, $indent, "\x1b[1;31m-");
					echo COLOR_RESET;
				}
			}

			if ($someFlag) {
				if (sizeof($added)) {
					echo "Additions:\n";
					print self::format_ts($added, $indent, "\x1b[1;34m+");
					echo COLOR_RESET;
				}
				echo "Combined:\n";
			}

			echo self::format_ts_diff($added, $removed);
			echo COLOR_RESET;

		}

		/**
		 *
		 */
		public static function array_diff_recursive($a, $b) {
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

	}