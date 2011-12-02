<?php
class Article {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM articles

		", LINK);
		
		$artcls = Db::FetchTable($res);
		
		return $artcls;
	}
	
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM articles
			WHERE id = {$id_esc}
		", LINK);
		
		$artcl = Db::FetchRow($res);
		
		return $artcl;
	}
	public static function GetParPage($page) {
		$page_esc = Db::EscInteger($page);
		
		$res = Db::Query("
			SELECT *
			FROM articles
			WHERE page = {$page_esc}
		", LINK);
		
		$artcls = Db::FetchTable($res);
		
		return $artcls;
	}
	
	public static function Replace($array, $query_sel='all') {
		$id_esc = Db::EscInteger($array['id']);
		$page_esc = Db::EscInteger($array['page']);
		$name_esc = Db::EscString($array['name']);
		//$name_en_esc = Db::EscString($array['name']);
		$name_en_esc = "'en name'";
		$description_esc = Db::EscString($array['description']);
		//$link_esc = Db::EscString($array['link']);
		$text_esc = Db::EscString($array['text']);
		$text_en_esc = Db::EscString($array['text_en']);
		
		
		switch($query_sel){
			case 'cz':
				$query = "
					REPLACE INTO articles
					(id, page, name, name_en, description, text, text_en)
					VALUES
					({$id_esc}, {$page_esc}, {$name_esc}, {$name_en_esc}, {$description_esc}, {$text_esc}, {$text_en_esc})
				";
				break;
			case 'en':	
				break;
			case 'all':
				$query = "
					REPLACE INTO articles
					(id, page, name, name_en, description, text, text_en)
					VALUES
					({$id_esc}, {$page_esc}, {$name_esc}, {$name_en_esc}, {$description_esc}, {$text_esc}, {$text_en_esc})
				";
				break;
		}
		Db::Query($query, LINK);
	}
	
	public static function Delete($id) {
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM articles
			WHERE id = {$id_esc}
		", LINK);
	}
	public static function getpage($id){
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
