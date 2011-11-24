<?php
class Db {
	public static function connect($host, $db, $usr, $pwd) {
		$link = mysql_connect($host, $usr, $pwd, $newlink = true);
		Db::checkError($link);

		mysql_selectdb($db, $link);
		Db::checkError($link);

		Db::Query("SET NAMES 'utf8'", $link); //Kvuli tomu, aby se správě zobrazovaly kódovaný znaky v phpMyAdminu

		return $link;
	}
	
	public static function esc($string, $link = null) {
		if (is_callable('mysql_real_escape_string')) {
			return mysql_real_escape_string($string);
		} else {
			return addslashes($string);
		}
	}

	public static function checkError($link) {
		if ($link) $err = mysql_error($link);
		else {
			$err = "Chyba při spojení s databází";
			throw new Exception(sprintf(('Database query error: %s'), $err));
		}
	}
	
	/********/
	
	public static function Query($query, $link) {
		$res = mysql_query($query, $link);
		Db::checkError($link);
		return $res;
	}
	
	public static function FetchTable($resource) {
		$tbl = array();
		while ($row = mysql_fetch_assoc($resource)) array_push($tbl, $row);
		return $tbl;
	}
	
	public static function FetchRow($resource) {
		$row = mysql_fetch_assoc($resource);
		return $row;
	}
	public static function FetchArray($resource) {
		$array = mysql_fetch_array($resource);
		return $array;
	}
	
	public static function FetchColumn($resource, $column) {
		$row = Db::FetchRow($resource);
		return $row[$column];
	}
	
	
	public static function EscString($s) {
		if ($s === null) return 'NULL';
		if (strpos($s, '\\') === false) return "'" . mysql_real_escape_string($s) . "'";
		return ("'$s'");
	}
	
	public static function EscInteger($i) {
		if ($i === null) return 'NULL';
		return (int)$i;
	}
	
	public static function EscTimestamp($t) {
		if ($t === null) return 'NULL';
		$d = Rs::StampToDate((int)$t);
		return "'" . $d . "'";
	}
	public static function EscDatetime($t) {
		if ($t === null) return 'NULL';
		return "'" . $t . "'";
	}
	
	public static function EscBool($b) {
		$b = $b ? 'TRUE' : 'FALSE';
		return $b;
	}
	
	public static function EscIdentifier($i) {
		return "`" . mysql_real_escape_string($i) . "`";
	}
	
	public static function CheckExists($id, $table, $link, $column = 'id') {
		//Escape inputs
		$esc_table = Db::EscIdentifier($table);
		$esc_id = Db::EscInteger($id);
		$esc_column = Db::EscIdentifier($column);
		
		$res = Db::Query("
			SELECT *
			FROM $esc_table
			WHERE $esc_column = $esc_id
		", $link);
		
		$result = (bool)(mysql_fetch_assoc($res));
		
		return $result;
	}

}
?>
