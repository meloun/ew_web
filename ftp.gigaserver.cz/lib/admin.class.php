<?php
class Admin {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM admins

		", LINK);
		
		$admins = Db::FetchTable($res);
		
		return $admins;
	}
	
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM admins
			WHERE id = {$id_esc}
		", LINK);
		
		$admins = Db::FetchRow($res);
		
		return $users;
	}
	
	public static function Delete($id) {
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM admins
			WHERE id = {$id_esc}
		", LINK);
	}
}
