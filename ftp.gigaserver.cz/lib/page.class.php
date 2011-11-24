<?php
class Page {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM pages

		", LINK);
		
		$gals = Db::FetchTable($res);
		
		return $gals;
	}
	
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM pages
			WHERE id = {$id_esc}
		", LINK);
		
		$page = Db::FetchRow($res);
		
		return $page;
	}
	
}
