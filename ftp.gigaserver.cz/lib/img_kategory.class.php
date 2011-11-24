<?php
class Kategory {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM kategories
			ORDER BY created_at
		", LINK);
		
		$kats = Db::FetchTable($res);
		
		return $kats;
	}
	
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM kategories
			WHERE id = {$id_esc}
		", LINK);
		
		$kat = Db::FetchRow($res);
		
		return $kat;
	}
	
	public static function Replace($post) {	
		$id_esc = Db::EscInteger($post['id']);
		$name_esc = Db::EscString($post['name']);
		$text_esc = Db::EscString($post['text']);
		
		Db::Query("
			REPLACE INTO kategories
			(id, name, text)
			VALUES
			({$id_esc}, {$name_esc}, {$text_esc})
		", LINK);
		
		$id = mysql_insert_id(LINK);
	
	}
	
	public static function Delete($id) {
            $id_esc = Db::EscInteger($id);
            //$kat = Kategory::get($id_esc);

            Db::Query("
                DELETE FROM kategories
		WHERE id = {$id_esc}
            ", LINK);

            Gallery::DeleteParKategory($id_esc);
	}
}
