<?php
class Report {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM reports
			ORDER BY id DESC
		", LINK);
		
		$reports = Db::FetchTable($res);
		
		return $reports;
	}
	public static function GetN($lim1, $lim2) {
		$res = Db::Query("
			SELECT *
			FROM reports
			WHERE created_at <= NOW()
			ORDER BY id DESC
			LIMIT $lim1,$lim2
		", LINK);
		
		$reports = Db::FetchTable($res);
		
		return $reports;
	}
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM reports
			WHERE id = {$id_esc}
		", LINK);
		
		$rep = Db::FetchRow($res);
		
		return $rep;
	}
	public static function GetCount(){
		$res = Db::Query("
			SELECT COUNT(*)
			FROM reports
		", LINK);
		
		$rep = Db::FetchArray($res);
		return $rep;
	}
	public static function Replace($array) {
		$id_esc = Db::EscInteger($array['id']);
		$name_esc = Db::EscString($array['name']);
		$name_en_esc = Db::EscString($array['name_en']);
		$name2_esc = Db::EscString($array['name2']);
		$name2_en_esc = Db::EscString($array['name2_en']);
		$text1_esc = Db::EscString($array['text1']);
		$text1_en_esc = Db::EscString($array['text1_en']);
		$text2_esc = Db::EscString($array['text2']);
		$text2_en_esc = Db::EscString($array['text2_en']);
		$created_at_esc = Db::EscString($array['created_at']);
		
		Db::Query("
			REPLACE INTO reports
			(id, name, name_en, name2, name2_en, text1, text1_en, text2, text2_en, created_at)
			VALUES
			({$id_esc}, {$name_esc},  {$name_en_esc}, {$name2_esc},  {$name2_en_esc}, {$text1_esc}, {$text1_en_esc}, {$text2_esc}, {$text2_en_esc},$created_at_esc)
		", LINK);
	}
	
	public static function Delete($id) {
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM reports
			WHERE id = {$id_esc}
		", LINK);
	}
}
