<?  //Overeni prihlaseni
    // HTTP autentikace
    // prochazeni pres vsechny adminy v db, hledani shodneho jmena a hesla
    $admins = Admin::GetAll();
    foreach($admins as $admin)
        if($_SERVER['PHP_AUTH_USER'] == $admin['name'] && $_SERVER['PHP_AUTH_PW'] == $admin['password']){
            $login_succesful = TRUE;
            break;
        }

    //presmerovani pokud chybne prihlaseni
    if($login_succesful != TRUE){
        Header('WWW-Authenticate: Basic realm="Administrace Ewitis.cz"');
        Header('HTTP/1.0 401 Unauthorized');
        $_GET['p'] = "unauthorized";
    }
    else{


/* GET PARAMETRY */
    $FILTER_KATEGORY = $_GET["fk"];
    $FILTER_PAID = $_GET["fp"];

    /* ADRESY */
    $ADRESS_THIS = "?p={$_GET['p']}"
        .($FILTER_KATEGORY ? "&fk=$FILTER_KATEGORY" : "")
        .(($FILTER_PAID !== NULL) ? "&fp=$FILTER_PAID" : "");
    $ADRESS_EXCEPT_FILTER_KATEGORY = "?p={$_GET['p']}&"
        .(($FILTER_PAID !== NULL) ? "fp=$FILTER_PAID&" : "");
    $ADRESS_EXCEPT_FILTER_GROUP = "?p={$_GET['p']}&"
        .($FILTER_KATEGORY ? "fk=$FILTER_KATEGORY&" : "");


    $competition = Competition::Get( $admin['competition_id']);
    $kategories = Kategory::GetParCompetitionId($admin['competition_id']);

    //vyhodnoceni formularu
    if($_POST['uid']){

        $user = User::Get($_POST['uid']);
        if($_POST['delete'] != NULL){
            User::Delete($_POST['uid']);
            $message = Ewitis::getRegDeleteString($user, $competition);
            $subject = "{$competition['name']} - Odmítnutí registrace - {$user['first_name']} {$user['last_name']}";
            //Email::Send("info@ewitis.cz", $subject, $message, "info@ewitis.cz");
            //Email::Send($user['email'], $subject, $message, "info@ewitis.cz");
        }
        //elseif(($_POST['cash'] != NULL)||($_POST['nocash'] != NULL)){
            if($_POST['cash'] != NULL){
                User::UpdatePaid($_POST['uid'], 1);
                $message = Ewitis::getRegConfirmString($user, $competition);
                $subject = "{$competition['name']} - Platba - {$user['first_name']} {$user['last_name']}";
            }
            elseif($_POST['nocash'] != NULL){
                User::UpdatePaid($_POST['uid'], 0);
                $message = Ewitis::getRegCancelString($user, $competition);
                $subject = "{$competition['name']} - Zrušení registrace - {$user['first_name']} {$user['last_name']}";
            }
        //}
        elseif($_POST['description'] != NULL){
            User::UpdateDescription($_POST['uid'], $_POST['description']);
        }

        //odesilani emailu
        if(($subject) && ($message)){
            Email::Send($user['email'], $subject, $message,"info@ewitis.cz", "časomíra Ewitis");
            Email::Send("registrace@ewitis.cz", $subject, $message,"bot@ewitis.cz", "časomíra Ewitis");
        }
    }

    if($_GET['csv'] == 1){
        Competition::Export_CSV($competition, $_GET["fk"], $_GET["fp"], 'CP1250');
        echo("<h3>CSV vyexportováno</h3>");
    }
    else if($_GET['csv'] == 2){
        Competition::Export_CSV($competition, $_GET["fk"], $_GET["fp"]);
        echo("<h3>CSV vyexportováno</h3>");
    }
    

    //get users to view on page    
    $users = User::GetParCompetitionId($admin['competition_id'],$FILTER_KATEGORY,$FILTER_PAID);
    $users_count = User::GetCount($admin['competition_id'], $FILTER_KATEGORY);
    $users_count_no_paid = User::GetCount($admin['competition_id'],$FILTER_KATEGORY, 0);
    $users_count_paid = User::GetCount($admin['competition_id'], $FILTER_KATEGORY, 1);

?>

<style type="text/css">
    #container{width:1200px;}
    .selected{font-weight: bold; font-size: 120%;}
    h3{margin-bottom:0;}
</style>

    <h2><?=$competition['name']?></h2>
    <h3>Přihlášen uživatel <?=$admin['name']?></h3>
    <a href="/exports/<?=Utils::Utf2ascii($competition['name']).".csv"?>"><img src="/gfx/excel.png" title="stáhnout CSV"/></a>
    vytvoř export : 
    <a href="<?=$ADRESS_THIS?>&csv=1">Excel(CP1250)</a> -
    <a href="<?=$ADRESS_THIS?>&csv=2">Aplikace(UTF-8)</a>  

 <div id="filter">
    <form action="" method="get">
    <input type="hidden" name="p" value="<?=$_GET['p'];?>" />
    <input type="hidden" name="fp" value="<?$FILTER_PAID?>" />
    <select name="fk" onChange="this.form.submit()" >
	<option value="">- - -</option>
	<?foreach($kategories as $kategory){?>
	    <option value="<?=$kategory['id']?>" <?=($FILTER_KATEGORY == $kategory['id']) ? 'selected':''?>><?=$kategory['name']?></option>
	<?}?>
    </select>
    </form>     
    <a href="<?=$ADRESS_EXCEPT_FILTER_GROUP?>" <?=($FILTER_PAID==NULL) ? 'class="selected"':''?>>všichni(<?=$users_count['pocet']?>)</a> |
    <a href="<?=$ADRESS_EXCEPT_FILTER_GROUP?>&fp=1" <?=($FILTER_PAID=='1') ? 'class="selected"':''?>>jen platící(<?=$users_count_paid['pocet']?>)</a> |
    <a href="<?=$ADRESS_EXCEPT_FILTER_GROUP?>&fp=0" <?=($FILTER_PAID=='0') ? 'class="selected"':''?>>jen neplatící(<?=$users_count_no_paid['pocet']?>)</a>

 </div>

<?= Competition::Html_tableUsers($competition, $FILTER_KATEGORY, $FILTER_PAID, 1);?>

<?}?>

