<?
define("SUBMIT_STEP1", "Pokračovat &raquo;");
define("SUBMIT_STEP2", "Registrovat");



//z url najdu zavod
$competitions = Competition::GetAll();
foreach($competitions as $competition){        
    if(Utils::friendly_url($competition['name']) == $_GET["n"])
            break;
}   


$step1_check_ok = 0;
$step2_check_ok = 0;

//existuje session? -> presmerovani po registrovani uzivatele
if (isset ($_SESSION['app']['user'])){

    //zkopirovani session do post, z nej se zobrazuji v templatu
    $_POST = $_SESSION['app']['user'];
    $_POST['noheader'] = '1';
    $_POST['submit'] = '';
    
    //dodatecne udaje
    $kategory = Kategory::Get($_POST['kategory_id']);
    

    //pop up okna
    $confirm = "Uživatel byl úspěšně zaregistrován.";
    $report = "Pro dokončení registrace zaplaťte požadovanou částku.";

    //template pro
    $step1_check_ok = 1;
    $step2_check_ok = 1;

    //smazani session
    unset($_SESSION['app']['user']);
}

elseif ($_POST){
    if(($_POST['first_name']=='') || ($_POST['last_name']==''))
	$report = "CHYBA: Nevyplněno jméno nebo příjmení!";
    elseif(Email::isValidEmail($_POST['email']) == false)
	$report = "CHYBA: Neplatný email!";
    elseif($_POST['sex']=='')
	$report = "CHYBA: Nevybráno pohlaví!";

    //povinny a nezadany klub?
    elseif($competition['club_duty'] && ($_POST['club'] == ''))
        $report = "CHYBA: Klub !";
    
    //povinne a nezadane uzivatelske pole?
    elseif($competition['user_field_1_duty'] && ($_POST['user_field_1'] == ''))
        $report = "CHYBA: ". strip_tags($competition['user_field_1_name'])." !";
        
    //povinne a nezadane uzivatelske pole?
    elseif( $competition['user_field_2_duty'] && ($_POST['user_field_2'] == ''))
        $report = "CHYBA: ". strip_tags($competition['user_field_2_name'])." !";

    //povinne a nezadane uzivatelske pole?
    elseif( $competition['user_field_3_duty'] && ($_POST['user_field_3'] == ''))
        $report = "CHYBA: ". strip_tags($competition['user_field_3_name'])." !";

    //antispam
    elseif($_POST['antispam']=='')
        $report = "CHYBA: Nevyplněn antispam!";
    elseif($_POST['antispam']!='2')
	$report = "CHYBA: antispam, 1 + 1 != {$_POST['antispam']}";


    //presmerovani na STEP2
    elseif($_POST['submit_step1']){
        //$_SESSION['app']['register_step_1'] = 1;
	$step1_check_ok = 1;
    }
    elseif($_POST['submit_step2'] == SUBMIT_STEP2){
	//$step1_check_ok = 1;
        $step1_check_ok = 1;
	if($_POST['kategory_id']==''){
	    $report = "CHYBA: Nevybrána kategorie!";
            $_POST['noheader'] = '1';
	}
	//REGISTRATION
	/*elseif(User::Add($_POST) == false){
	    $report = "CHYBA: Uživatel již existuje!";
	}*/

        //presmerovani succesfull registration
	else{
                        
            //pridani uzivatele
            $_POST['cid'] =  $competition['id'];
            User::Add($_POST);

            //zkopirovani postu do session
            $_SESSION['app']['user'] = $_POST;

            //emaily
            $kategory = Kategory::Get($_POST['kategory_id']);
	    $message = strip_tags(Ewitis::getRegRequestString($_POST, $competition, $kategory));
	    Email::Send($_POST['email'], $competition['name']." - Registrace - {$_POST['first_name']} {$_POST['last_name']}", $message,"info@casomira-ewitis.cz", "časomíra Ewitis");
	    Email::Send("registrace@casomira-ewitis.cz", "{$competition['name']} - Registrace - {$_POST['first_name']} {$_POST['last_name']}",$message,"info@casomira-ewitis.cz", "časomíra Ewitis");            
        }
    }

//Flash::flash1($confirm);
   
}
?>

<style type="text/css">    

    h2{font-size: 80%;}
    form label{width:120px;display:block;float:left;}
    form{text-align:  left;}
    label span{font-size:85%;}
    label span.povinne{font-size:100%; color:red;}
    input.submit{margin:10px auto 0 auto; width: 150px;display:block;}
    

</style>


 <? if (isset($confirm)) { ?>
    <div id="flash" class="hidden">
        <div class="close" onclick="_close('flash');"></div>
        <?= $confirm ?>
    </div>
<?}?>

 <? if (isset($report)) { ?>
    <div id="flash" class="hidden">
        <div class="close" onclick="_close('flash');"></div>
        <?= $report ?>
    </div>
<?}?>

<?if($competition['registration_en'] == 0){?>
    <div class="toggle_container">
        <div class="block">
          <h3><?=$competition['name']?> - Registrace</h3>
          <?=common_processTexy($competition['off_msg'])?>
        </div>
    </div>
 <?}
 elseif(($step1_check_ok == 0)&&($step2_check_ok == 0))
    include("tpl/tpl_registrace_step1.php");
 elseif(($step1_check_ok == 1)&&($step2_check_ok == 0))
    include("tpl/tpl_registrace_step2.php");
 else
    include("tpl/tpl_registrace_succes.php");
 ?>

