<?php

	/**
	 * t3tool - cli tool for administering a TYPO3 installation
	 *
	 * @package t3tool
	 * @author  Lars Køie <lars@koeie.dk>
	 * @license GNU GPL
	 *
	 */

	/**
	 * Handle a command. Can be the actual command from command line, subcommands called from there, or commands in an alias.
	 *
	 * @param array Arguments
	 * @param int Level of command chaining. Command from command line has level 0.
	 * @return string Human readable output of the command.
	 *
	 */
	function t3tool_handlecmd($argv, $level = 0) {
		$args = $argv;
		foreach ($args as $k=>$v) {
			if ($v == '') {
				unset($args[$k]);
			}
		}

		// check if an alias matches
		foreach ($args as $i => $value) {
			$alias_key = implode(' ', array_slice($args, 0, $i));

			if (isset($GLOBALS['aliases'][$alias_key])) {
				$alias_args = array_slice($args, $i);
				if (is_array($GLOBALS['aliases'][$alias_key])) {
					// run commmands
					foreach ($GLOBALS['aliases'][$alias_key]['commands'] as $str) {
						foreach ($alias_args as $k => $v) {
							$str = str_replace('$' . $k, $v, $str);
						}
						$child_args = explode(' ', $str);
						return t3tool_handlecmd($child_args, $level + 1);
					}

				} else {
					$args = explode(' ', str_replace($alias_key, $GLOBALS['aliases'][$alias_key], implode(' ', $args)));
					return t3tool_handlecmd($args, $level + 1);
				}
			}
		}

		$module = array_shift($argv);


		// handle help function
		if ($module == 'help') {
			$out = '';
			if ($argv[0]) {
				$m = $argv[0];
				$function = 't3tool_' . $m . '_usage_long';
				if (function_exists($function)) {
					$out .= $function() . "\n";
				}
			} else {
				$out .= "Usage:\n";
				foreach ($GLOBALS['modules'] as $m) {
					$function = 't3tool_' . $m . '_usage_short';
					if (function_exists($function)) {
						$out .= $function() . "\n";
					}

				}
			}

			return $out;

			/**
			 * Flags are :
			 * - d : include deleted records in lists and searches. Default is "exclude deleted records".
			 * - f : full - do not crop long strings
			 * - l : "local configuration" : Changes to configuration are written to the local one, the one in .gitignore (localconf_local or AdditionalConfiguration).
			 * - p : "pid" - all operations are filtered to elements on this pid - not implemented yet
			 * - r : "recursive" - infinitely - not implemented yet
			 * - v : verbose - show all output
			 *
			 */

		}

		// dispatch command and arguments to module
		if (in_array($module, $GLOBALS['modules'])) {
			$function = 't3tool_' . $module . '_handlecmd';
			if (function_exists($function)) {
				return $function($argv, $level + 1);
			}

		} else {
			echo "Missing command. See 't3tool help' for more info\n";
		}

		if (is_array($GLOBALS['info'])) {
			foreach ($GLOBALS['info'] as $s) {
				echo str_repeat('  ', $level + 1) . $s . "\n";
			}
			$GLOBALS['info'] = array();
		}

	}


	/**
	 * Build the TCA and store it in global var.
	 */
	function buildTCA() {
		$tca = include(PATH_script . 'includes/tca-core-6-1.php');
		$tca_t3tool = array();
		if (file_exists('includes/tca-t3tool.php')) {
			$tca_t3tool = include('includes/tca-t3tool.php');
		}
		$GLOBALS['TCA'] = array_replace_recursive($tca, $tca_t3tool);
	}

	/**
	 * Read TYPO3 configuration and store it in global var.
	 */
	function readConf() {
		global $TYPO3_CONF_VARS;

		if ($GLOBALS['version_4']) {
			require_once('typo3conf/localconf.php');
			$GLOBALS['TYPO3_CONF_VARS']['DB'] = array(
				'host' => $typo_db_host,
				'username' => $typo_db_username,
				'password' => $typo_db_password,
				'database' => $typo_db,
			);
		}
		if ($GLOBALS['version_6']) {
			$TYPO3_CONF_VARS = include(PATH_typo3conf . 'LocalConfiguration.php');
			if (is_file(PATH_typo3conf . 'AdditionalConfiguration.php')) {
				include(PATH_typo3conf . 'AdditionalConfiguration.php');
			}
		}

		// realurl ?
		if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['realurl'])) {
			$temp = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['realurl']);
			if (isset($temp['configFile'])) {
				if (file_exists($temp['configFile'])) {
					include_once(PATH_site . $temp['configFile']);
				}
			}
		}

	}

	/**
	 * Connect to database. We use lazy database initialization for performance.
	 *
	 * @return bool Success
	 */
	function initDB() {
		if ($GLOBALS['DBIsInited']) {
			return TRUE;
		}

		global $TYPO3_CONF_VARS;

		$db = $TYPO3_CONF_VARS['DB'];
		$typo_db_host = $db['host'];
		$typo_db_username = $db['username'];
		$typo_db_password = $db['password'];
		$typo_db = $db['database'];

		if (!$typo_db) {
			die("Error: Can't connect to DB. Halting.\n\n");
		}

		# connect to db
		global $mysqli;
		$mysqli = mysqli_connect($typo_db_host, $typo_db_username, $typo_db_password);
		if (!$mysqli) {
			die("Could not connect to DB\n");
		}

		$success = mysqli_select_db($mysqli, $typo_db);
		if (!$success) {
			die("Could not select DB\n");
		}


		$GLOBALS['DBIsInited'] = TRUE;

		// remove tables from TCA that don't exist in database
		$temp = sql_get_rows('show tables');
		foreach ($temp as $temp2) {
			list(, $table) = each($temp2);
			$db_tables[$table] = TRUE;
		}
		if (is_array($GLOBALS['TCA'])) {
			$GLOBALS['TCA'] = array_intersect_key($GLOBALS['TCA'], $db_tables);
		}

		return TRUE;
	}

	/**
	 * Query DB
	 *
	 * @param $sql
	 *
	 * @return bool|mysqli_result
	 *
	 */
	function sql_query($sql) {
		initDB();
		global $mysqli;
		$res = mysqli_query($mysqli, $sql);
		//   print "$sql\n\n";
		if ($res === FALSE) {
			$error = mysqli_error($mysqli);
			if ($error) {
				print "\n  SQL error : $error\n  SQL : $sql\n";
			}
			if ($debug) {
				foreach (debug_backtrace() as $bt) {
					print $bt['function'] . ', ' . $bt['file'] . ', line ' . $bt['line'] . "\n";
				}
			}

			return FALSE;
		}
		return $res;
	}

	/**
	 * Fetch next associative array
	 *
	 * @param $res
	 *
	 * @return array|null
	 */
	function sql_fetch_assoc($res) {
		return mysqli_fetch_assoc($res);
	}

	/**
	 * Fetch next associative array
	 *
	 * @param $res
	 *
	 * @return array|null
	 */
	function sql_fetch_array($res) {
		return sql_fetch_assoc($res);
	}

	/**
	 * Converts a SQL statement to an array containing the first row of the returned result.
	 *
	 * @param $sql
	 *
	 * @return array|null
	 */
	function sql_get_row($sql) {
		$res = sql_query($sql);
		$row = sql_fetch_assoc($res);

		return $row;
	}

	/**
	 * Converts a SQL statement to an array of all returned results.
	 *
	 * @param $sql
	 *
	 * @return array|bool
	 */
	function sql_get_rows($sql) {
		$res = sql_query($sql);
		if ($res === FALSE) {
			return FALSE;
		}
		if ($res === TRUE) {
			return TRUE;
		}
		$rows = array();
		while ($row = sql_fetch_assoc($res)) {
			$rows[] = $row;
		}
		return $rows;
	}

	/**
	 * Returns number of rows from last SELECT statement.
	 *
	 * @return int
	 */
	function sql_num_rows() {
		global $mysqli;
		return mysqli_num_rows($mysqli);
	}

	/**
	 * Returns number of affected rows by last SQL statement.
	 *
	 * @return int
	 */
	function sql_affected_rows() {
		global $mysqli;
		return mysqli_affected_rows($mysqli);
	}

	/**
	 * Make an array from a single field from a query
	 *
	 * @param $sql
	 *
	 * @return array
	 */
	function sql_get_column($sql) {
		$rows = sql_get_rows($sql);
		if ($rows) {
			foreach ($rows as $row) {
				$temp = each($row);
				$column[] = $temp['value'];
			}
		}

		return $column;
	}

	/**
	 * Puts all rows in the correct place in the page tree and output the result.
	 *
	 * @param array $rows
	 */
	function showRecordsInPageTree(array $rows, $table = '') {
		global $label;

		if (!is_array($rows)) {
			return;
		}

		$result = array();
		foreach ($rows as $row) {
			if (!isset($row['deleted'])) {
				$row['deleted'] = '0';
			}
			if (!isset($row['_table'])) {
				$row['_table'] = $table;
			}
			if (!isset($row['title']) && isset($label[$row['_table']])) {
				$row['title'] = $row[$label[$row['_table']]];
			}
			$result[$row['pid']]['_'][$row['_table']][$row['uid']] = $row;
		}
		pt($result);
		pt($result);
		pt($result);
		$b = array();
		//flattenArray($result, $b);
		return sendAsTable($result);
	}

	/**
	 * Determine the rootline of the pid and output the result.
	 *
	 * @param $pid
	 *
	 * @return array
	 */
	function getRootline($pid) {
		pa($pid, $a);
		if (!sizeof($a)) {
			die("Page not found\n");
		}
		$a = array_reverse($a);
		return $a;
	}

	/**
	 * Return an array of pids under a pid
	 *
	 * @param int $pid
	 * @param int $depth
	 *
	 * @return array
	 */
	function getPidList($pid, $depth = 100) {
		$pages = sql_get_rows('select uid from pages where pid=' . intval($pid) . getDeleteClause('pages'));
		$pids = array($pid);
		foreach ($pages as $page) {
			$pids = array_merge($pids, getPidList($page['uid']));
		}

		return $pids;
	}

	/**
	 * Get a rootline of a page formatted as delimited page titles
	 *
	 * @param int Page id
	 * @param boolean Crop titles or not
	 * @return string something like "TYPO3/Welcome/About..."
	 */
	function getFormattedRootline($pid, $crop = TRUE) {
		$a = array();
		$titles = array();
		pa($pid, $a);
		$a = array_slice($a, 0, 5);
		foreach ($a as $page) {
			$titles[] = $crop ? crop($page['title'], 15) : $page['title'];
		}

		return implode('/', array_reverse($titles));
	}

	/**
	 * Converts an array of records to a tree structure array of records.
	 *
	 * @param $a
	 */
	function pt(&$a) {
		foreach ($a as $pid => $b) {
			$res = sql_query('select title, uid, pid, deleted, hidden from pages where uid=' . intval($pid));
			if ($page = sql_fetch_array($res)) {
				foreach ($page as $k => $v) {
					$a[$page['pid']]['_']['pages'][$pid][$k] = $v;
				}
				$a[$page['pid']]['_']['pages'][$pid]['_table'] = 'pages';

				if ($page['uid']) {
					$a[$page['pid']]['_']['pages'][$pid] = array_replace_recursive($a[$page['pid']]['_']['pages'][$pid], $b);
					unset($a[$pid]);
				}
			}
		}
	}

	/**
	 * Crops the string around the search query and hilite the query within the string.
	 *
	 * @todo : at this point, actually only crops
	 * @param $s
	 * @param $q
	 *
	 * @return string
	 */
	function cropAndHilite($s, $q) {
		$a = strpos($s, $q);
		if ($a === FALSE) {
			return '';
		}
		$a = max(0, $a - 10);
		$l = min($a + strlen($q) + 20, strlen($s));

		return substr($s, $a, $l - $a);
	}


	/**
	 * Converts .... something ....
	 *
	 * @param $uid
	 * @param $a
	 *
	 * @return bool
	 */
	function pa($uid, &$a) {
		$res = sql_query('select title, uid, pid, deleted, hidden from pages where pid>-1 and uid=' . intval($uid));
		$page = sql_fetch_array($res);
		if (!$page) {
			return FALSE;
		}
		$a[] = $page;
		if ($page['pid']) {
			pa($page['pid'], $a);
		}
	}


	/**
	 * Returns a delete clause for the table. Very similar to t3lib_befunc::enableFields().
	 *
	 * @todo : should use TCA
	 * @param $table
	 * @param $alias
	 */
	function getDeleteClause($table, $alias = '') {
		if (getFlag('d')) {
			return '';
		}
		if ($alias == '') {
			$alias = $table;
		}

		// these tables have field deleted
		if (in_array($table, array(
			'pages',
			'sys_template',
			'tt_content'
		))) {
			return " and not $alias.deleted";
		}

		return '';
	}

	/**
	 * Get value of flag/option
	 *
	 * @param string Name of flag
	 * @return mixed Value
	 */
	function getFlag($f) {
		if (!isset($GLOBALS['options'][$f])) {
			return FALSE;
		}

		return $GLOBALS['options'][$f];
	}


	/**
	 * Returns records from table that match q in one of the fields.
	 *
	 * @param       $table
	 * @param       $q
	 * @param array $fields
	 *
	 * @return array|bool Array of records or FALSE if no records
	 */
	function getRecordsByString($table, $q = '', $fields = array(), $selectFields = '*', $orderby = '', $limit = 0) {
		if ($table == 'pages') {
			// handle special "magic" shorthands
			switch ($q) {
				case 'FIRSTROOT' :
					if ($page = getFirstRootpage()) {
						$q = $page['uid'];
					}
					break;
				default :
			}

		}


		if (!is_array($fields)) {
			$fields = explode(',', $fields);
		}


		if ($q) {
			$q = str_replace(array('*', '?'), array('%', '_'), $q);
			// handle negation
			if (strpos($q, '!') !== FALSE) {
				if (preg_match(';^\!\((.*)\)$;', $q, $m)) {
					$q = $m[1];

					$and = " $table.uid!='$q'";
					foreach ($fields as $field) {
						$and .= " and $table.$field not like '$q'";
					}
					$where = "and ($and)" . getDeleteClause($table);

				} else {
					// "!" used in a way that is not allowed
					output_fail('"!" is allowed only as first character and only followed by paranthesises that surround the entire string.');
					return array();
				}
			} else {
				$or = '0';
				if (is_array($GLOBALS['TCA'][$table])) {
					$or .= " or $table.uid='$q'";

				}

				foreach ($fields as $field) {
					$or .= " or $table.$field like '$q'";
				}
				$where = "and ($or)" . getDeleteClause($table);

			}

		}

		$matches = sql_get_rows("select $selectFields from $table where 1 " . $where .
			($orderby ? ' order by ' . $orderby : '') .
			($limit ? ' limit ' . $limit : '')
		);

		return $matches;
	}

	/**
	 * Returns an array containing one single record from table matching q in one of the fields.
	 * If the number of records matched is not exactly one, the script dies with a message.
	 *
	 * @param $table
	 * @param $fields
	 * @param $q
	 */
	function getSingleRecordByString($table, $q, $fields = array()) {
		$matches = getRecordsByString($table, $q, $fields);
		$matchcount = sizeof($matches);

		if ($matchcount == 1) {
			return $matches[0];
		}
		if ($matchcount > 1) {
			return FALSE;
		}

		return FALSE;
	}


	/**
	 * Get and return an array containing the first root page.
	 * That is the topmost page in a fully expanded page tree, that contains a domain record.
	 *
	 * @param int Page id - for internal use, do not use.
	 * @return bool
	 */
	function getFirstRootpage($pid = 0) {
		$pages = sql_get_rows("
        select pages.uid, pages.pid, is_siteroot, title, domainName
        from pages left join sys_domain on sys_domain.pid=pages.uid
        where pages.pid=$pid and not pages.deleted and not pages.hidden
        order by pages.sorting
        ");

		foreach ($pages as $page) {
			if ($page['is_siteroot'] && $page['domainName']) {
				return $page;
			}

			$temp = getFirstRootPage($page['uid']);
			if (is_array($temp)) {
				return $temp;
			}
		}

		return FALSE;

	}


	/**
	 * Formats and outputs a record as a table with headers on left.
	 *
	 * @param array $a
	 */
	function sendRecordAsTable(array $a) {
		$l = array();
		$keys = array_keys($a);
		$values = array_values($a);

		foreach ($keys as $k => $v) {
			$l[0] = max($l[0], strlen($keys[$k]));
			$b[0] = str_pad('', $l[0], '-');
		}
		foreach ($values as $k => $v) {
			if (preg_match('/^A|O:[0-9]+:/', $values[$k])) {
				$values[$k] = unserialize($values[$k]);
			}
			if (is_object($values[$k])) {
				$values[$k] = print_r($values[$k], 1);
			} elseif (is_array($v)) {
				$values[$k] = print_r($values[$k], 1);
			} else {
				$values[$k] = objectToString($values[$k]);
			}
			$l[1] = max($l[1], strlen($values[$k]));
			$b[1] = str_pad('', $l[1], '-');
		}

		foreach ($keys as $k => $v) {
			$keys[$k] = str_pad($keys[$k], $l[0]);
		}
		foreach ($values as $k => $v) {
			$values[$k] = str_pad($values[$k], $l[1]);
		}

		$out .= "+-" . implode('-+-', $b) . "-+\n";
		foreach ($keys as $k => $v) {
			$out .= '| ';
			$out .= $keys[$k] . " | ";
			$out .= $values[$k] . " |\n";
		}
		$out .= "+-" . implode('-+-', $b) . "-+\n";
		return $out;

	}

	/**
	 * Crop s to length l with ellipsis.
	 *
	 * @param     $s
	 * @param int $l
	 *
	 * @return string
	 */
	function crop($s, $l = 50) {
		if (getFlag('f')) {
			return $s;
		}
		return substr($s, 0, $l) . (strlen($s) > $l ? ' ...' : '');
	}

	/**
	 * Convert an object to a readable string, in any way possible.
	 *
	 * @param $s
	 */
	function objectToString($s) {
		if (preg_match('/^A|O:[0-9]+:/i', $s)) {
			$s = unserialize($s);
		}
		if (is_object($s)) {
			$s = print_r($s, 1);
		} elseif (is_array($s)) {
			$s = print_r($s, 1);
		}

		$s = preg_replace(";\n|\r\t;", ' ', $s);
		$s = crop($s);

		return $s;
	}

	/**
	 * Format an array of records as a table with headers on top.
	 *
	 * @param array $a
	 */
	function sendAsFlatTable(array $a) {
		$return = '';

		$l = array();
		if (!sizeof($a)) {
			return "No records\n";
		}
		$cols = array_keys($a[0]);
		$footer[$cols[0]] = count($a);

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = objectToString($a[$y][$x]);
			}
		}
		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$h[$x] = $x;
				$l[$x] = max($l[$x], strlen($d));
				$l[$x] = max($l[$x], strlen($x));
			}
		}

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = str_pad($d, $l[$x]);
				$h[$x] = str_pad($h[$x], $l[$x]);
				$footer[$x] = str_pad($footer[$x], $l[$x]);
				$b[$x] = str_pad('', $l[$x], '-');
			}
		}

		foreach ($a as $y => $row) {
			$sorted[$row['pid']][] = $row;
		}


		$return .= "+-" . implode('-+-', $b) . "-+\n";
		$return .= "| " . implode(' | ', $h) . " |\n";
		$return .= "+-" . implode('-+-', $b) . "-+\n";
		foreach ($sorted as $pid => $a) {
			if ($pid) {
				$return .= "| " . str_pad('- ' . getFormattedRootline($pid, TRUE) . ' :', array_sum($l) + 3 * (sizeof($l) - 1)) . " |\n";
			}
			foreach ($a as $y => $row) {
				$return .= '| ';
				$return .= implode(' | ', $row) . " |\n";
			}
		}
		$return .= "+-" . implode('-+-', $b) . "-+\n";
		$return .= "| " . implode(' | ', $footer) . " |\n";
		$return .= "+-" . implode('-+-', $b) . "-+\n";

		return $return;
	}

	/**
	 * @param $list
	 */
	function sendRawElementList(array $list) {
		foreach ($list as $element) {
			echo $element . "\n";
		}
	}

	/**
	 * Formats and outputs an array of records as a table with headers on top, sorted by elements path in page tree.
	 *
	 * @param array $a
	 */
	function sendAsFlatTableWithoutPaths(array $a) {
		$l = array();
		if (!sizeof($a)) {
			$out .= "No records\n";

			return $out;
		}
		$cols = array_keys($a[0]);
		$footer[$cols[0]] = count($a);

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = objectToString($a[$y][$x]);
			}
		}
		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$h[$x] = $x;
				$l[$x] = max($l[$x], strlen($d));
				$l[$x] = max($l[$x], strlen($x));
			}
		}

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = str_pad($d, $l[$x]);
				$h[$x] = str_pad($h[$x], $l[$x]);
				$footer[$x] = str_pad($footer[$x], $l[$x]);
				$b[$x] = str_pad('', $l[$x], '-');
			}
		}
		$out .= "+-" . implode('-+-', $b) . "-+\n";
		$out .= "| " . implode(' | ', $h) . " |\n";
		$out .= "+-" . implode('-+-', $b) . "-+\n";
		foreach ($a as $y => $row) {
			$out .= '| ';
			$out .= implode(' | ', $row) . " |\n";
		}
		$out .= "+-" . implode('-+-', $b) . "-+\n";
		$out .= "| " . implode(' | ', $footer) . " |\n";
		$out .= "+-" . implode('-+-', $b) . "-+\n";

		return $out;
	}

	/**
	 * Formats an array as a table, indenting the title by depth, and outputs the result.
	 *
	 * @param array $a
	 * @param int $depth
	 */
	function sendAsTable(array $a, $depth = 0) {
		if (!is_array($a)) {
			return;
		}
		if (!sizeof($a)) {
			return;
		}

		$l = array(
			'_table' => 20,
			'title' => 80,
			'uid' => 5,
			'pid' => 5,
		);
		$t = each($a);
		foreach ($t['value'] as $k => $v) {
			$h[$k] = $k;
		}

		foreach ($a as $y => $row) {
			if (isset($row['deleted']) && $row['deleted']) {
				unset($a[$y]);
				continue;
			}

			if ($depth > 1) {
				$a[$y]['title'] = str_repeat('   ', $depth - 1) . '+- ' . $a[$y]['title'];
			}
			foreach ($a[$y] as $x => $f) {
				if ($x == '_') {
					continue;
				}
				$a[$y][$x] = substr($f, 0, 80) . (strlen($f) > 80 ? ' ...' : '');
				if (is_int($x)) {
					unset($a[$y][$x]);
				}
				$l[$x] = isset($l[$x]) ? max($l[$x], strlen($a[$y][$x])) : strlen($a[$y][$x]);
			}
		}
		foreach ($a as $y => $row) {

			foreach ($row as $x => $f) {
				if ($x == '_') {
					continue;
				}
				$a[$y][$x] = str_pad($a[$y][$x], $l[$x]);
			}
		}

		foreach ($a as $y => $row) {

			$out .= '| ';
			$out .= implode(' | ', array(
				$row['_table'],
				$row['uid'],
				$row['pid'],
				$row['deleted'],
				$row['title'],
			));

			if (isset($row['_match'])) {
				$out .= preg_replace("/\n|\r|\t/", ' ', $row['_match']);
			}

			$out .= "\n";

			if (isset($row['_'])) {
				foreach ($row['_'] as $table => $records) {
					$out .= sendAsTable($records, $depth + 1);
				}
			}
		}

		return $out;
	}


	/**
	 * Write a value to local configuration.
	 *
	 * @param $path
	 * @param $value
	 * @param null $local
	 */
	function setLocalConf($path, $value, $local = NULL) {
		$path = explode('.', $path);

		$data = &$GLOBALS['TYPO3_CONF_VARS'];
		$exists = TRUE;
		foreach ($path as $index) {
			if (!isset($data[$index])) {
				$exists = FALSE;
			}
			$data = &$data[$index];
		}
		$olddata = $data;
		$data = $value;

		$filename = getConfFilename($local);

		if ($GLOBALS['version_4'] || $local) {
			appendToPHPFile($filename, "\$GLOBALS['TYPO3_CONF_VARS']['" . implode("']['", $path) . "'] = " . var_export($value, 1) . ";\n");
		} else {
			// TODO : this will write entire array, including stuff from local, which it should not.....
			file_put_contents($filename, '<?php return ' . var_export($GLOBALS['TYPO3_CONF_VARS'], 1) . ';');
		}
		echo "ok.\n";

	}

	/**
	 * Get filename of current configuration file. Relative to PATH_site.
	 *
	 * @param $local
	 * @return string
	 */
	function getConfFilename($local) {
		$filename = 'typo3conf/';
		if ($GLOBALS['version_4']) {
			$filename .= $local ? 'localconf_local.php' : 'localconf.php';
		} else {
			$filename .= $local ? 'AdditionalConfiguration.php' : 'LocalConfiguration.php';
		}

		return $filename;
	}

	/**
	 * Get single value from local configuration.
	 *
	 * @param      $path Dot separated list of keys
	 * @param null $local
	 *
	 * @return mixed
	 */
	function getLocalConf($path) {
		$data = $GLOBALS['TYPO3_CONF_VARS'];
		foreach (explode('.', $path) as $index) {
			if (!isset($data[$index])) {
				return NULL;
			}
			$data = $data[$index];
		}

		return $data;
	}


	/**
	 * Write a line to a php file, existing or not.
	 *
	 * @param $filename
	 * @param $s
	 */
	function appendToPHPFile($filename, $s) {
		$data = "";
		if (file_exists($filename)) {
			$data = file_get_contents($filename);
			$data = str_replace('?>', '', $data);
		}
		if (!preg_match(';<\?php;', $data)) {
			$data = "<?php\n" . $data;

		}

		$data = $data . "\n" . $s;
		file_put_contents($filename, $data);

	}

	/**
	 * Write t3tool persistent data to file.
	 *
	 * @param $data
	 */
	function writeData() {
		if (FALSE) {
			file_put_contents(PATH_site . '.t3tool_data.php', '<?php $GLOBALS["t3tool_data"] = ' . var_export($GLOBALS['t3tool_data'], 1) . ';');
		}
	}

	/**
	 * Read t3tool persistent data from file.
	 *
	 * @param $data
	 */
	function readData() {
		$GLOBALS["t3tool_data"] = array();

		if (is_file(PATH_site . '.t3tool_data.php')) {
			include(PATH_site . '.t3tool_data.php');
		}
	}

	/**
	 * Like the *nix command 'tail -f', but for a MySQL table.
	 * Returns nothing, as everything is sent to stdout directly.
	 *
	 * @param $sql
	 * return void
	 */
	function sql_tail($sql) {
		$n = 20;
		$follow = TRUE;

		$a = sql_get_rows($sql . ' limit ' . intval($n));
		$a = array_reverse($a);

		$l = array();

		$cols = array_keys($a[0]);
		$footer[$cols[0]] = count($a);

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = objectToString($a[$y][$x]);
			}
		}
		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$h[$x] = $x;
				$l[$x] = max($l[$x], strlen($d));
				$l[$x] = max($l[$x], strlen($x));
			}
		}

		foreach ($a as $y => $row) {
			foreach ($row as $x => $d) {
				$a[$y][$x] = str_pad($d, $l[$x]);
				$h[$x] = str_pad($h[$x], $l[$x]);
				$footer[$x] = str_pad($footer[$x], $l[$x]);
				$b[$x] = str_pad('', $l[$x], '-');
			}
		}
		echo "+-" . implode('-+-', $b) . "-+\n";
		echo "| " . implode(' | ', $h) . " |\n";
		echo "+-" . implode('-+-', $b) . "-+\n";
		foreach ($a as $y => $row) {
			echo '| ';
			echo implode(' | ', $row) . " |\n";
		}

		if ($follow) {
			$last = $row['uid'];
			while (TRUE) {
				$a = sql_get_rows($sql . ' limit 20');
				$a = array_reverse($a);

				foreach ($a as $y => $row) {
					if ($a[$y]['uid'] <= $last) {
						continue;
					}
					$last = $a[$y]['uid'];

					echo '| ';
					foreach ($row as $x => $d) {
						$a[$y][$x] = objectToString($a[$y][$x]);
						$a[$y][$x] = str_pad($a[$y][$x], $l[$x]);
					}

					echo implode(' | ', $a[$y]) . " |\n";
				}
				sleep(1);
			}
		}


	}

	/**
	 * Enable realtime output to stdout.
	 */
	function enable_output() {
		$GLOBALS['output'] = TRUE;
	}

	/**
	 * Disable realtime output to stdout.
	 */
	function disble_output() {
		$GLOBALS['output'] = FALSE;
	}

	/**
	 * Output a piece of info to terminal.
	 *
	 * @param string The info
	 * @param int The depth of command execution. For indentation.
	 */
	function output_info($s, $level = 0) {
		$GLOBALS['info'][] = $s;
	}

	/**
	 * @param $level
	 */
	function output_sendinfo($level) {
		if (is_array($GLOBALS['info'])) {
			foreach ($GLOBALS['info'] as $info) {
				echo '        ' . str_repeat('  ', $level) . $info . "\n";
			}
		}
		$GLOBALS['info'] = array();

	}

	/**
	 * @param $s
	 */
	function output_cmd($s, $level = 0) {
		$out = '[....] ' . $s;
		echo $out;
	}

	/**
	 * @param $s
	 * @param int $level
	 */
	function output_cmd_success ($out, $level = 0) {
		// move all left
		echo "\x1b[90D" .

		// move one right
		"\x1b[1C";

		echo $out;
	}

	/**
	 *
	 */
	function output_ok($s = '', $level = 0) {
		$out = ' ok ';
		// add green
		$out = "\x1b[1;32m$out\x1b[0m\n";

		output_cmd_success($out, $level);
		output_sendinfo($level + 1);
	}

	/**
	 *
	 */
	function output_usage($s = '', $level = 0) {
		$out = $s;
		echo $out;
		$GLOBALS['pos'] = 0;
		output_sendinfo($level + 1);
		exit;
	}

	/**
	 * @param $s
	 */
	function output_fail($s, $level = 0) {
		$out = 'fail';
		// add red
		$out = "\x1b[1;31m$out\x1b[0m\n";

		output_cmd_success($out, $level);
		output_sendinfo($level + 1);
	}


	function t3tool_core_completion_tables() {
		$tables = array('all');
		$rows = sql_get_rows('show tables');
		foreach ($rows as $row) {
			$temp = each($row);
			$tables[] = $temp['value'];
		}

		return $tables;
	}

	function t3tool_core_completion_pages() {
		// only magic pages for now
		return array('FIRSTROOT');
	}


	/**
	 * @param $current
	 * @param $comp_line
	 *
	 * @return string
	 *
	 * TODO: Does not work when command contains options ("-p" , "--recursive")
	 */
	function getTabCompleteString($current, $comp_line) {
		$args = explode(' ', trim($comp_line));
		array_shift($args);

		if ($current == $args[sizeof($args) - 1]) {
			array_pop($args);
		}
		$t = $GLOBALS['commands'];
		foreach ($args as $n => $arg) {
			if (!isset($t[$arg])) {
				return '';
			}
			if (is_string($t[$arg])) {
				$funcs = explode(',', $t[$arg]);
				$func = trim($funcs[sizeof($args) - $n - 1]);
				if (function_exists($func)) {
					return implode(' ', call_user_func($func, $current, $comp_line));
				}
			}
			$t = $t[$arg];
		}
		if (is_array($t)) {
			return implode(' ', array_keys($t));
		}

		return '';
	}

	/**
	 * @param $prompt
	 */
	function readPassword() {
		$pw1 = readline('Enter password : ', TRUE);
		$pw2 = readline('Enter password again : ', TRUE);
		if ($pw1 == $pw2) {
			return $pw1;
		}
		echo "Passwords do not match.";

		return FALSE;
	}

	/**
	 *
	 */
	if (!function_exists('readline')) {
		function readline($prompt = '', $pw = FALSE) {
			echo $prompt;
			if ($pw) {
				system('stty -echo');
			}
			$s = rtrim(fgets(STDIN), "\n");
			if ($pw) {
				system('stty echo');
				echo "\n";
			}

			return $s;
		}
	}