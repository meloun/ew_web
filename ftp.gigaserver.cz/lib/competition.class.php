<?php
class Competition {
	public static function GetAll() {
		$res = Db::Query("
			SELECT *
			FROM competitions
                        ORDER BY id DESC

		", LINK);
		
		$competitions = Db::FetchTable($res);
		
		return $competitions;
	}
	
	public static function Get($id) {
		$id_esc = Db::EscInteger($id);
		
		$res = Db::Query("
			SELECT *
			FROM competitions
			WHERE id = {$id_esc}
		", LINK);
		
		$competitions = Db::FetchRow($res);
		
		return $competitions;
	}
	/*public static function Replace($array) {
	    $id_esc = Db::EscInteger($array['id']);
	    $name_esc = Db::EscString($array['name']);
	    $date_esc = Db::EscString($array['date']);
	    $place_esc = Db::EscString($array['place']);
	    $description_esc = Db::EscString($array['descr']);
	    $money_esc = Db::EscString($array['money']);
	    $account_esc = Db::EscString($array['account']);
	    $registred_users_esc = Db::EscInteger($array['registred_users']);
	    $max_users_esc = Db::EscInteger($array['max_users']);
	    $date_created_esc = Db::EscDatetime($array['date_created']);

	    $query = "
		    REPLACE INTO competitions
		    (id, name, date, place, description, money, account, registred_users, max_users, date_created)
		    VALUES
		    ({$id_esc}, {$name_esc}, {$date_esc}, {$place_esc}, {$description_esc}, {$money_esc}, {$account_esc}, {$registred_users_esc}, {$max_users_esc}, {$date_created_esc})
	    ";

	    Db::Query($query, LINK);
	}*/
	public static function Delete($id) {
		$id_esc = Db::EscInteger($id);
		
		Db::Query("
			DELETE FROM competitions
			WHERE id = {$id_esc}
		", LINK);
	}
	public static function UpdateRegistredUsers($id, $registred_users){
	    $id_esc = Db::EscInteger($id);
	    $registred_users_esc = Db::EscInteger($registred_users);
	    Db::Query("
			UPDATE competitions SET registred_users = {$registred_users_esc}
			WHERE id = {$id_esc}
		      ", LINK);
	}
	public static function GenCode($id) {
	    $id_esc = Db::EscInteger($id);
	    //var_dump($id_esc);
	    $competition = Competition::Get($id_esc);
	    //var_dump($competition);
	    $users = $competition['registred_users'];
	    $competition['registred_users'] = $competition['registred_users'] + 1;
	    //Competition::Replace($competition);
	    Competition::UpdateRegistredUsers($id, $competition['registred_users']);
	    $code =($id*10000)+$users;
	    return $code;
	}

        //vlozi tabulku s kategoriemi, pripadne prida jeste radiobuttony a zpristupni podle pohlavi a veku
        public static function Html_tableKategories($competition_id, $sex = NULL, $birthday = NULL){
            $competition = Competition::Get($competition_id);
            $kategories = Kategory::GetParCompetitionId($competition_id);
            ?>
            
            <table id="tablesorter-demo" class="tablesorter" cellpadding="0" cellspacing="1">
            <thead>
                <tr>
                    <?=($birthday != NULL) ? "<th>-</th>" : ""?>
                    <th>Jméno</th>                                    
                    <th>Popis</th>                    
                    <?=($competition['nr_cash']== 1) ?
                            "<th class=\"cena\">Cena</th>" :
                            "<th class=\"cena\">Cena 1</th><th class=\"cena\">Cena 2</th>"
                    ?>
                </tr>
            </thead>


            <tbody>
            <?foreach($kategories as $kategory){
                    $IsInKategory = Kategory::IsInKategory($_POST['sex'], $_POST['birthday'], $kategory);
                    $class = ($class=='even') ? 'odd' : 'even';?>
                    <tr class="<?=$class?>">
                        <?if($birthday != NULL){?>
                            <td><input type="radio" name="kategory_id" value="<?=$kategory['id']?>" <?=($IsInKategory) ? "" : "disabled"?> ></td>
                        <?}?>
                        <td class="name"><?=$kategory['name']?></td>
                        
                        <td class="desc"><?=strip_tags(common_processTexy($kategory['description']), '<a>')?></td>
                        <td class="cena"><?=$kategory['cash']?></td>
                        <?=($competition['nr_cash']== 2) ? "<td class=\"cena\">{$kategory['cash2']}</td>" : ""?>
                    </tr>
            <?}?>
            </tbody>
            </table>
        <?
        }


        //predavam i users, uz vyfiltrovane napr. jen platici
        //casem asi predelat a predavat competition a filtr pro users
        public static function Html_tableUsers($competition, $kategory_filtr=NULL, $paid_filtr=NULL, $show_private = 0){
            $users = User::GetParCompetitionId($competition['id'], $kategory_filtr, $paid_filtr);
            ?>


            <table id="tablesorter-demo" class="tablesorter" cellpadding="0" cellspacing="1">
                <thead>
                    <tr>
                      <?if($show_private){?>
                        <th class="id">Id</th>
                      <?}?>
                        
                        <th class="kategory">Kategorie</th>
                        <th class="last_name">Příjmení</th>
                        <th class="first_name">Jméno</th>



                     <?if(($competition['user_field_1_name'])){
                        if(($show_private) || ($competition['user_field_1_public'])){?>
                            <th class="user_field_1"><?=$competition['user_field_1_name']?></th>
                        <?}
                     }?>

                     <?if(($competition['user_field_2_name'])){
                        if(($show_private) || ($competition['user_field_2_public'])){?>
                            <th class="user_field_2"><?=$competition['user_field_2_name']?></th>
                        <?}
                     }?>

                     <?if(($competition['user_field_3_name'])){
                        if(($show_private) || ($competition['user_field_3_public'])){?>
                            <th class="user_field_3"><?=$competition['user_field_3_name']?></th>
                        <?}
                     }?>

                     
                     <?if($show_private){?>
                        <th class="birthday">Rok</th>
                        <th class="sex">Sex</th>
                        <th class="email">Email</th>
                        <th class="symbol">Symbol</th>
                        <th class="paid">$</th>
                        <th class="actions">Akce</th>
                        <th class="desc">Poznámka</th>
                      <?}?>
                    </tr>
                </thead>
                <tbody>

            <?foreach($users as $user){
                $kategory = Kategory::Get($user['kategory_id']);
                    $class = ($class=='even') ? 'odd' : 'even';?>
                    <tr class="<?=$class?>">

                      <?if($show_private){?>
                        <td class="id"><?=$user['id']?></td>
                      <?}?>
                        <td><?=$kategory['name']?><!--<br/> <small><?=$kategory['description']?></small></td>-->
                        <td class="last_name"><b><?=$user['last_name']?></b></td>
                        <td><?=$user['first_name']?></td>

                        <?if(($competition['user_field_1_name'])){
                            if(($show_private) || ($competition['user_field_1_public'])){?>
                                <td class="user_field_1"><?=$user['user_field_1']?></td>
                            <?}
                        }?>

                        <?if(($competition['user_field_2_name'])){
                            if(($show_private) || ($competition['user_field_2_public'])){?>
                                <td class="user_field_2"><?=$user['user_field_2']?></td>
                            <?}
                        }?>

                        <?if(($competition['user_field_3_name'])){
                            if(($show_private) || ($competition['user_field_3_public'])){?>
                                <td class="user_field_3"><?=$user['user_field_3']?></td>
                            <?}
                        }?>

       

                        
                        <?if($show_private){?>                        
                        <td class="birthday"><?=$user['birthday']?></td>
                        <td class="sex"><?=Ewitis::getSexString($user['sex']);?></td>
                        <td><?=$user['email']?></td>
                        <td class="symbol"><?=$user['symbol']?></td>
                        <td class="paid"><?=$user['paid']?></td>
                        <td class="actions">
                            <form action="" method="post">
                                <input type="hidden" name="redir" value="?" />
                                <input type="hidden" name="uid" value="<?=$user['id']?>" />
                                <input type="submit" name="cash" value="$" class="smallBtn" title ="zaplaceno" <?=($user['paid']) ? 'disabled' : ''?> />
                                <input type="submit" name="nocash" value="0" class="smallBtn" title ="nezaplaceno"  <?=($user['paid']) ? '' : 'disabled'?> />
                                <input type="submit" name="delete" value="X" class="smallBtn" title ="smazat"
                                        onClick="return confirm('Opravdu uživatele \'<?=$user['first_name']?> <?=$user['last_name']?>\' nenávratně smazat?\n (a poslat mu email o zrušení registrace)');"/>
                            </form>
                        </td>

                        <td class="desc">
                            <form action="" method="post">
                                <input type="hidden" name="uid" value="<?=$user['id']?>" />
                                <input type="hidden" name="redir" value="?page=pictures&amp;gid=1" />
                                <input type="input" name="description" value="<?=$user['description']?>" size="20" />
                                <input type="submit" name="submit" value=">>" class="smallBtn" />
                            </form>
                        </td>
                      <?}?>

                    </tr>
            <?}?>
                </tbody>
            </table>
         <?
         }
         
         
/*
| id | nr | name | first name | category | birthday | sex | email | symbol | paid | description | user field_1|..| user field_4
*/

         public static function Export_CSV($competition, $kategory_filtr=NULL, $paid_filtr=NULL, $coding=NULL){
             
             $users = User::GetParCompetitionId($competition['id'], $kategory_filtr, $paid_filtr);
                         
              
              //csv string
              $aux_string = "id;nr;name;first_name;category;birthday;sex;email;symbol;paid;description;user field_1; user field_2; user field_3; user field_4;";
              $aux_string .=  "\n";
              foreach($users as $user){
                  $aux_kategory = Kategory::Get($user['kategory_id']);
                  $aux_sex = Ewitis::getSexString($user['sex']);
                  
                  $aux_string .= "{$user['id']};0;{$user['last_name']};{$user['first_name']};{$aux_kategory['name']};{$user['birthday']};{$user['sex']};{$user['email']};{$user['symbol']};{$user['paid']};{$user['description']};{$user['user_field_1']};{$user['user_field_2']};";
                  if($coding !== NULL)
                    $aux_string .= "{$user['birthday']};{$aux_sex};{$user['symbol']};{$user['paid']};";
                  $aux_string .=  "\n";
              }          
              
              //save to file
              $myPath = WEB_PATH."/exports/".Utils::Utf2ascii($competition['name']).".csv";
              $file = fopen($myPath,'w+');

              if($coding !== NULL)
                $aux_string = iconv('UTF-8',$coding,$aux_string);
              
              fwrite($file, $aux_string);
              fclose($file);              
         }
}
