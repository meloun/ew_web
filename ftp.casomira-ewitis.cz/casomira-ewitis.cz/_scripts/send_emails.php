<?php  

/* EMAIL CONFIGURATION */

  //obsah emailu
  $EMAIL_SUBJECT = "Pozdrav poslaný skriptem";
  $EMAIL_CONTENT = "Jóo Ewitis, to jsou kucíí šikovní!!";     
  $EMAIL_FROM = "info@casomira-ewitis.cz";
  //email na ktery se posle zprava pri prvnim spusteni (counter musi byt 0)
  $MY_EMAIL = "lubos.melichar@gmail.com";  
  //$MY_EMAIL = "jan.babcanik@seznam.cz"; 

/* SCRIPT CONFIGURATION */  
  //pocet emailu odeslanych najednou  
  $NR_EMAILS = 2;
  
  $LIST_OF_EMAILS = "
      lubos.melichar@gmail.com;
      tomik.prochazka@gmail.com;
      tomas.padrta@gmail.com;
      jan.babcanik@seznam.cz;
  ";
  
/*END OF PARAMETERS*/

  
/***********************************************
 * !! ODSUD DOLU NEMENIT POKUD NEJSES MELOUN !!
 ************************************************/
  
//Nacteni konfiguracniho souboru
require_once dirname(__FILE__) . '/../../lib/email.class.php';  
      
//nacteni citace a jeho inkrementace
$counter = file_get_contents("counter.txt");
file_put_contents("counter.txt",($counter==0) ? $counter+1 : $counter+$NR_EMAILS);

//nacteni emailovych adres a rozkouskovani do pole
//$emails = file_get_contents("emails.txt");
$array_of_emails = explode(";",$LIST_OF_EMAILS);
$array_of_emails = str_replace("\n","",$array_of_emails);
$array_of_emails = str_replace(" ","",$array_of_emails);
$array_of_emails = str_replace("\r","",$array_of_emails);
?>

<p>
<br><b>Counter:</b> <?=$counter?>
<br><b>From:</b> <?=$EMAIL_FROM?>
<br><b>Subject:</b> <?=$EMAIL_SUBJECT?>
<br><b>Content:</b> <?=$EMAIL_CONTENT?>
</p>
<p>
    
<?
//posilani emailu
if($counter == 0){
    //test - poslani sam sobe
    echo("<br> <b>TEST:</b> $MY_EMAIL");  
    $check = Email::isValidEmail($MY_EMAIL);
    echo("<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;check: ".$check);  
    if($check){
        Email::Send($MY_EMAIL,$EMAIL_SUBJECT, $EMAIL_CONTENT, "info@casomira-ewitis.cz", "časomíra Ewitis");
        echo("<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;posilam..");
    }    
}
else{
    //poslani dalsi davky
    for($i=$counter-1;$i<$counter-1+$NR_EMAILS;$i++){
        echo("<br> <b>$i:</b> $array_of_emails[$i]");  
        $check = Email::isValidEmail($array_of_emails[$i]);
        echo("<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;check: ".$check);  
        if($check){
            Email::Send($array_of_emails[$i],$EMAIL_SUBJECT, $EMAIL_CONTENT, "info@casomira-ewitis.cz", "časomíra Ewitis");
            echo("<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;posilam..");
        } 
        //var_dump($array_of_emails[$i]);
    }
}

?>
</p>
