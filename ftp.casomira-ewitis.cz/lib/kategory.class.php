<?php
class Kategory {
	public static function GetAll() {
	    $res = Db::Query("
		    SELECT *
		    FROM kategories

	    ", LINK);

	    $kategories = Db::FetchTable($res);

	    return $kategories;
	}

	public static function Get($id) {
	    $id_esc = Db::EscInteger($id);

	    $res = Db::Query("
		    SELECT *
		    FROM kategories
		    WHERE id = {$id_esc}
	    ", LINK);

	    $kategories = Db::FetchRow($res);

	    return $kategories;
	}
	public static function GetParCompetitionId($id) {
		$id_esc = Db::EscInteger($id);

		$res = Db::Query("
			SELECT *
			FROM kategories
			WHERE competition_id = {$id_esc}
                        ORDER BY id
		", LINK);

		$kategories = Db::FetchTable($res);

		return $kategories;
	}
	public static function Replace($array) {
	    $id_esc = Db::EscInteger($array['id']);
	    $competition_id_esc = Db::EscInteger($array['competition_id']);
	    $name_esc = Db::EscString($array['name']);
	    $description_esc = Db::EscString($array['description']);
	    $sex_esc = Db::EscInteger($array['sex']);
	    $birthday_min_esc = Db::EscString($array['birthday_min']);
	    $birthday_max_esc = Db::EscString($array['birthday_max']);

	    $query = "
		    REPLACE INTO kategories
		    (id, competition_id, name, description, sex, birthday_min, birthday_max)
		    VALUES
		    ({$id_esc}, {$competition_id_esc}, {$name_esc}, {$description_esc}, {$sex_esc}, {$birthday_min_esc}, {$birthday_max_esc})
	    ";

	    Db::Query($query, LINK);
	}
	public static function IsInKategory($sex, $birthday, $kategory){
	    if(($sex != $kategory['sex']) && ($kategory['sex'] != 0))//0-nezalezi na pohlavi
		return false;	
	    if($birthday < $kategory['birthday_min'])
		return false;
	    if($birthday > $kategory['birthday_max'])
		return false;
	    return true;
	}

	public static function Delete($id) {
	    $id_esc = Db::EscInteger($id);

	    Db::Query("
		    DELETE FROM kategories
		    WHERE id = {$id_esc}
	    ", LINK);
	}
}

