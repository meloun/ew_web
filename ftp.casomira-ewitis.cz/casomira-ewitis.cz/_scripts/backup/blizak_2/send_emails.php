<?php  

/* EMAIL CONFIGURATION */

  //obsah emailu
  $EMAIL_SUBJECT = "Video - Sázavský Blizák 2012";
  $EMAIL_CONTENT = "Ahoj závodníku,

jistě již netrpělivě čekáš na video ze závodu Sázavský Blizák, který si nedávno absolvoval.

K online shlédnutí je pro tebe video k dispozici zde: http://www.youtube.com/watch?v=ADHBNw9TEb8&feature=youtu.be
Ke stažení prosím použij tento odkaz: http://ulozto.cz/xWmtxYs/blizak-2012-33min-fhdp-25fps-tbr10-mbr30-44-1-320-mp4
a následující heslo: video12sazava

Pochvaly, případně dotazy a připomínky prosím do diskuze na webu závodu: http://blizak.cz/?p=napistenam
anebo přímo pořadateli závodu na email: prochazka.josef1@tiscali.cz
 
*Prosíme o čestné jednání a nešíření hesla ani výše uvedených odkazů.

za časomíru Ewitis
Luboš Melichar

";     
  $EMAIL_FROM = "info@casomira-ewitis.cz";
  //email na ktery se posle zprava pri prvnim spusteni (counter musi byt 0)
  $MY_EMAIL = "lubos.melichar@gmail.com";  
  //$MY_EMAIL = "jan.babcanik@seznam.cz"; 

/* SCRIPT CONFIGURATION */  
  //pocet emailu odeslanych najednou  
  $NR_EMAILS = 10;
  
  $LIST_OF_EMAILS = "
melounchytrak@seznam.cz;
houska@centrum.cz;
ka-las@volny.cz;
jenik.susta@seznam.cz;
matousek44@seznam.cz;
Richard124@seznam.cz;
wingleader@seznam.cz;
jikru@volny.cz;
denis.pecho@email.cz;
vlasta.karban@centrum.cz;
michalecek@seznam.cz;
mc_boris@volny.cz;
b.steinbachova@seznam.cz;
info@bajkservis.cz;
jimmy.prchal@post.cz;
holykar@seznam.cz;
treko@cmail.cz;
petr.ok@seznam.cz;
simonadivisova@seznam.cz;
KOLACEKJIRKA@SEZNAM.CZ;
dave2877@seznam.cz;
autopavelnovotny@centrum.cz;
krojcz@seznam.cz;
petrak.holy@seznam.cz;
honzakamr@seznam.cz;
galko@gsstav.cz;
judr.kutis@tiscali.cz;
rh.cz@email.cz;
TSANA@MSZ.PHA.JUSTICE.CZ;
V.Mares@radiokomunikace.cz;
SLAVETINSKYDAN@SEZNAM.cz;
KVYLETA@VOLNY.cz;
PAVELMARVEL@seznam.cz;
KRAL@KOLIN.cz;
LEGATOVA@VOLBY.cz;
FLOPIK9@seznam.cz;
MIREKFRE@seznam.cz;
tomik.prochazka@gmail.com;
tomas.padrta@gmail.com;
Babcanik@seznam.cz;
prochazka.josef1@tiscali.cz;
melounchytrak@seznam.cz;
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
