<?php
class Ewitis {
    public static function getSexString($id){
	switch($id){
	    case 1:
		return "muž";
	    case 2:
		return "žena";
	}
	return "-";
    }
    public static function getContact($competition){
        $string = ($competition['contact']!= NULL) ? "V případě dotazů se obraťte na pořadatele závodu - {$competition['contact']}." : "";
        return $string;
    }
    public static function getUserString($user, $competition){
       //$competition = Competition::Get($user['competition_id']);
       $kategory = Kategory::Get($user['kategory_id']);
       $sex_string = Ewitis::getSexString($user['sex']);       
       $string = "<h3><span>Registrační údaje</span></h3>";       
       $string .= "
                <div>kategorie: <strong> {$kategory['name']}</strong></div>
                <div>Jméno: <strong>{$user['first_name']}</strong></div>
                <div>Příjmení: <strong>{$user['last_name']}</strong></div>
                <div>Email: <strong>{$user['email']}</strong></div>
                <div>Pohlaví: <strong>{$sex_string}</strong></div>
                <div>Rok narození: <strong>{$user['birthday']}</strong></div>
                ";        
        
        $string .= ($competition['user_field_1_name']!= NULL) ? "<div>".strip_tags($competition['user_field_1_name']).": <strong>{$user['user_field_1']}</strong></div>" : "";        
        $string .= "\n               ";
        $string .= ($competition['user_field_2_name']!= NULL) ? "<div>".strip_tags($competition['user_field_2_name']).": <strong>{$user['user_field_2']}</strong></div>" : "";        
        $string .= "\n               ";
        $string .= ($competition['user_field_3_name']!= NULL) ? "<div>".strip_tags($competition['user_field_3_name']).": <strong>{$user['user_field_3']}</strong></div>" : "";
        $string .= "\n               ";
        $string .= ($competition['user_field_4_name']!= NULL) ? "<div>".strip_tags($competition['user_field_4_name']).": <strong>{$user['user_field_4']}</strong></div>" : "";
        return $string;
    }
    public static function getPayString($user, $competition){
        $kategory = Kategory::Get($user['kategory_id']);
        //$competition = Competition::Get($user['competition_id']);
        $code = sprintf("%d",$user['symbol']);
        $cash_string = ($competition['nr_cash']== 1) ?
                "<div>cena : <strong>{$kategory['cash']}</strong></div>":
                "
                <div>cena 1: <strong>{$kategory['cash']}</strong>
                </div><div>cena 2: <strong>{$kategory['cash2']}</strong></div>";
                
        $string = "<h3><span>Platební údaje</span></h3>";
        $string .= "
                <div>číslo účtu: <strong>{$competition['account']}</strong></div>
                <div>variabilní symbol: <strong>{$code}</strong></div>
                ".$cash_string
                .(common_processTexy($competition['desc_cash']));
         return $string;        
    }
    public static function getCompetitionString($competition){        
        $string = "<h3><span>O závodě</span></h3>";
        $string .= "
                <p><b>kdy: </b>{$competition['date']}</p>
                <p><b>kde: </b>{$competition['place']}</p>
                <p><b>web: </b><a href=\"{$competition['web']}\">{$competition['web']}</a></p>
                <div class=\"size90\">".common_processTexy($competition['desc'])."</div>";
         return $string;
    }

    public static function getRegRequestString($user, $competition, $kategory){
	$sex_string = Ewitis::getSexString($_POST['sex']);
	return "
            Registrace na závod {$competition['name']}            

            ".strip_tags(Ewitis::getUserString($user, $competition))."
            ".strip_tags(Ewitis::getPayString($user, $competition))."
            ".strip_tags(Ewitis::getContact($competition))."

	    http://www.casomira-ewitis.cz
	    info@casomira-ewitis.cz
	";
    }
    public static function getRegConfirmString($user, $competition){
	$sex_string = Ewitis::getSexString($user['sex']);
	return "
	    Organizátor závodu {$competition['name']} právě potvrdil vaši registraci.

            ".strip_tags(Ewitis::getUserString($user, $competition))."                
            ".strip_tags(Ewitis::getContact($competition))."

	    http://www.casomira-ewitis.cz
	    info@casomira-ewitis.cz
	";
    }
    public static function getRegCancelString($user, $competition){
	$sex_string = Ewitis::getSexString($user['sex']);
	return "
	    Organizátor závodu {$competition['name']} zrušil vaší registraci.

	    !! VAŠE REGISTRACE NENÍ JIŽ PLATNÁ !!

            ".strip_tags(Ewitis::getUserString($user, $competition))."
            ".strip_tags(Ewitis::getContact($competition))."

	    http://www.casomira-ewitis.cz
	    info@casomira-ewitis.cz
	";
    }
    public static function getRegDeleteString($user, $competition){
	$sex_string = Ewitis::getSexString($user['sex']);
	return "
	    Organizátor závodu {$competition['name']} odmítl vaší žádost o registraci.

	    !! VAŠE REGISTRACE NENÍ PLATNÁ !!

            ".strip_tags(Ewitis::getUserString($user, $competition))."
            ".strip_tags(Ewitis::getContact($competition))."
                

	    http://www.casomira-ewitis.cz
	    info@casomira-ewitis.cz
	";
    }
}

?>
