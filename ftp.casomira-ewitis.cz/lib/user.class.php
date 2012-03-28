<?php
class User {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM users

		", LINK);
		
		$users = Db::FetchTable($res);
		
		return $users;
	}
	
	public static function Get($id) {

		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM users
			WHERE id = {$id_esc}
		", LINK);
		
		$users = Db::FetchRow($res);
		
		return $users;
	}
        public static function GetCount($competition_id, $kategory_filtr=NULL, $paid_filtr=NULL) {
            $competition_id_esc = Db::EscInteger($competition_id);
            $karegory_id_esc = Db::EscInteger($kategory_filtr);
            $paid_esc = Db::EscInteger($paid_filtr);


            if(($kategory_filtr !== NULL)&&($kategory_filtr !== "")){
                $kategory_where = "
                    AND (kategory_id = {$karegory_id_esc})
                ";
            }
            if($paid_filtr !== NULL){
                $paid_where = "
                    AND (paid = {$paid_esc})
                ";
            }

            $res = Db::Query("
                    SELECT count(*) AS pocet
                    FROM users
                    WHERE competition_id = {$competition_id_esc}
                    $kategory_where
                    $paid_where
            ", LINK);

            $users = Db::FetchRow($res);

            return $users;
	}
	public static function GetParCompetitionId($id, $kategory_filtr=NULL, $paid_filtr=NULL) {
		$id_esc = Db::EscInteger($id);
		$karegory_id_esc = Db::EscInteger($kategory_filtr);
		$paid_esc = Db::EscInteger($paid_filtr);

		if($kategory_filtr != NULL){
		    $kategory_where = "
			AND (kategory_id = {$karegory_id_esc})
		    ";
		}
		if($paid_filtr !== NULL){
		    $paid_where = "
			AND (paid = {$paid_esc})
		    ";
		}                
		
		$res = Db::Query("
			SELECT *
			FROM users
			WHERE competition_id = {$id_esc}
			$kategory_where
			$paid_where
                        ORDER BY id DESC
		", LINK);

		$users = Db::FetchTable($res);
		
		return $users;
	}

	public static function GetParName($first_name, $last_name) {
	    $first_name_esc = Db::EscString($first_name);
	    $last_name_esc = Db::EscString($last_name);

	    $res = Db::Query("
		    SELECT *
		    FROM users
		    WHERE 
			first_name = {$first_name_esc}
			AND
			last_name = {$last_name_esc}
	    ", LINK);

	    $users = Db::FetchRow($res);

	    return $users;
	}
        public static function GetParSymbol($symbol) {
            $symbol_esc = $symbol;

	    $res = Db::Query("
		    SELECT *
		    FROM users
		    WHERE
			symbol = {$symbol_esc}
	    ", LINK);

	    $users = Db::FetchRow($res);

	    return $users;
	}
	
	public static function Add(&$array, $replace_permission = 0) {	    
	    $id_esc = Db::EscInteger($array['id']);
	    $first_name_esc = Db::EscString($array['first_name']);
	    $last_name_esc = Db::EscString($array['last_name']);
	    $email_esc = Db::EscString($array['email']);
	    $birthday_esc = Db::EscInteger($array['birthday']);
	    $sex_esc = Db::EscInteger($array['sex']);
	    $competition_id_esc = Db::EscInteger($array['cid']);
	    $kategory_id_esc = Db::EscInteger($array['kategory_id']);

            $user_field_1_esc = Db::EscString($array['user_field_1']);
            $user_field_2_esc = Db::EscString($array['user_field_2']);
            $user_field_3_esc = Db::EscString($array['user_field_3']);
            $user_field_4_esc = Db::EscString($array['user_field_4']);
	    
	    //$user_exist = User::GetParName("$array[first_name]", "$array[last_name]");

	    //vygenerovani kodu
	    //if($user_exist == false){ //uzivatel neexistuje?
		$array['symbol']= Competition::GenCode($competition_id_esc);
		$symbol_esc = $array['symbol'];
	    //}


	    //vlozeni noveho zaznamu, anebo prepsani stareho
	    //if(($user_exist == false )||($replace_permission)){
	    $query = "
		    REPLACE INTO users
		    (id, competition_id, kategory_id, first_name, last_name, email, birthday, sex, user_field_1, user_field_2, user_field_3,user_field_4, symbol)
		    VALUES
		    ({$id_esc}, {$competition_id_esc}, {$kategory_id_esc}, {$first_name_esc}, {$last_name_esc}, {$email_esc}, {$birthday_esc}, {$sex_esc}, {$user_field_1_esc}, {$user_field_2_esc}, {$user_field_3_esc}, {$user_field_4_esc}, {$symbol_esc})
	    ";
            var_dump($query);
	    Db::Query($query, LINK);

	    //}
	    //else
		//return false;
	    //return true;
            //return $array['symbol'];
	}
	public static function Replace($array) {
	    User::Add($array, 1);
	}
	public static function UpdatePaid($id, $paid){
	    $id_esc = Db::EscInteger($id);
	    $paid_esc = Db::EscInteger($paid);
	    Db::Query("
			UPDATE users SET paid = {$paid_esc}
			WHERE id = {$id_esc}
		      ", LINK);
	}
	public static function UpdateDescription($id, $description){
	    $id_esc = Db::EscInteger($id);
	    $description_esc = Db::EscString($description);	
	    
	    Db::Query("
			UPDATE users SET description = {$description_esc}
			WHERE id = {$id_esc}
		      ", LINK);

	    $user = User::get($id_esc);
	    var_dump($user);

	}
	public static function Delete($id) {
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM users
			WHERE id = {$id_esc}
		", LINK);
	}
}
