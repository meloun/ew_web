<?php  

/* EMAIL CONFIGURATION */

  //obsah emailu
  $EMAIL_SUBJECT = "Pozvánka na Sázavský Blizák 2012";
  $EMAIL_CONTENT = "Ahoj závodníku,

ve spolupráci s pořadateli závodu Sázavský Blizák tě zveme na jeho další ročník.

Kdy: 16.6.2012
Kde: Sázava, okr. Benešov

Podrobné informace najdeš na webu závodu - http://blizak.cz/
registraci potom již u nás - http://www.casomira-ewitis.cz/zavod/blizak-2012/registrace
 
*Pokud se závodu nechceš zúčastnit, považuj tento email za bezpředmětný.

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
bittner.boris@seznam.cz;
blanka.safrankova@email.cz;
blood.mail@seznam.cz;
bohacc@seznam.cz;
BohdanN@seznam.cz;
bohuslav.kara@volny.cz;
bohuslavstejskal@seznam.cz;
Candys23@seznam.cz;
cava.r@seznam.cz;
cermakf@centrum.cz;
cernovskykrystof@seznam.cz;
Daniel.Bandas@seznam.cz;
danielvlach@seznam.cz;
dave2877@seznam.cz;
davesafranek@seznam.cz;
david.dks@centrum.cz;
david.krkoska@seznam.cz;
david.munzberg@unicreditgroup.cz;
davidboubal@seznam.cz;
davidroj@volny.cz;
davy.n@seznam.cz;
dejda@volny.cz;
denisa.blazkova@parexel.com;
dkobr@seznam.cz;
dolezal.sport@seznam.cz;
donzaag@seznam.cz;
dragon180@seznam.cz;
evropa@centrum.cz;
fanda.petrasek@seznam.cz;
fandabuchta@seznam.cz;
fany.petrasek@seznam.cz;
faraonek@seznam.cz;
filip.lukes@advantage-fl.cz;
filipludvik@seznam.cz;
fleg.divi@seznam.cz;
Flopik9@seznam.cz;
Frantisek.Pajer@skanska.cz;
fulin@hntechnology.cz;
gold@emco.cz;
h.hannah@seznam.cz;
h.slanina@seznam.cz;
h.vrbovcova@centrum.cz;
hana.stejskalova@unicreditgroup.cz;
haufik@seznam.cz;
havel.tomik@seznam.cz;
havlicek.honza@quick.cz;
havlicek62@seznam.cz;
hedvika@pasky.cz;
hejna@bal.cz;
hetman@centrum.cz;
hodnysoused@gmail.com;
hofikus@hotmail.com;
Hogou@seznam.cz;
hojik@email.cz;
honza.k.25@seznam.cz;
honzajuska@seznam.cz;
honzuek@seznam.cz;
hoopr@seznam.cz;
houdek.ktm@seznam.cz;
houska@centrum.cz;
htczech@quick.cz;
huh@centrum.cz;
hybernia@seznam.cz;
chaloupka@inchema.cz;
i.jaroslav.dostal@seznam.cz;
i.moravec@espressobar.cz;
ifo@centrum.cz;
ijakunka@seznam.cz;
info@bajkservis.cz;
info@lyze-kola.cz;
info@masozposazavi.cz;
info@vadamo.cz;
ivan.arn@seznam.cz;
ivan.hanzel@seznam.cz;
ivana.jurkaninova@seznam.cz;
j.richtera@seznam.cz;
j.stancl@post.cz;
j.votocek@centrum.cz;
j.zaky@volny.cz;
a.ruzha@seznam.cz;
jahoda.vit@seznam.cz;
jakub.dobias@seznam.cz;
jakub.randal@seznam.cz;
jakub.vit@volny.cz;
jakubstangler@seznam.cz;
jan_kubicek@seznam.cz;
jan.dite@volny.cz;
jan.hudecek@vfsco.com;
jan.juklicek@atlas.cz;
jan.pirk@ikem.cz;
jan.ruzha@alutooling.cz;
jan.ruzha@seznam.cz;
jan.soukup@rott.cz;
jan.suchopar@stabilplastik.cz;
janareha@seznam.cz;
janu-martin@seznam.cz;
janvochmelka@seznam.cz;
Jarana1@seznam.cz;
jardavandr@tiscali.cz;
jarja92@seznam.cz;
jaroslav.vanous@austromar.cz;
jasip-sro@volny.cz;
jelinek@hntechnology.cz;
jenik.susta@seznam.cz;
jetotrapny@email.cz;
jezlibor@seznam.cz;
jimmy.prchal@post.cz;
jiri.halama@post.cz;
jirijand@gmail.com;
JirinaHrbkova@seznam.cz;
jirivaio7@seznam.cz;
jirka.pekos@seznam.cz;
jirka@exnerovi.eu;
jkmarik@seznam.cz;
johannis@seznam.cz;
jokerdave@seznam.cz;
josefbenes@centrum.cz;
jrikovsky@cpoj.cz;
jsl@seznam.cz;
jsvatos@volny.cz;
judr.kutis@tiscali.cz;
k.jangl@seznam.cz;
k.selingerova@seznam.cz;
k.vejdovsky@volny.cz;
ka-las@volny.cz;
kajapolivkova@email.cz;
karelmamut@seznam.cz;
karlik@hntechnology.cz;
karlospop@seznam.cz;
karlossantos@seznam.cz;
kasza@seznam.cz;
keloh@seznam.cz;
kemo@seznam.cz;
khaxon@seznam.cz;
kinglukas@seznam.cz;
klarkaa@seznam.cz;
kliklong@email.cz;
KOLACEKJIRKA@SEZNAM.CZ;
kopp@brema.cz;
kostelecky.petr@seznam.cz;
kousek.divi@seznam.cz;
krakora@krabis.cz;
krakora@rsf.cz;
krojcz@seznam.cz;
kubalekj@seznam.cz;
kubera@skokypraha.cz;
kvyleta@volny.cz;
ladislav.mikes@mpss.cz;
LadislavVodvarka@seznam.cz;
ladislavvodvarka@seznam.cz;
ledererm@seznam.cz;
Libor.Mensa@seznam.cz;
libor.tucek@email.cz;
lida.greslova@tiscali.cz;
lojza.an@seznam.cz;
lpekarek@gmail.com;
lskvorova@seznam.cz;
lubomir.cihak@seznam.cz;
lubos31@seznam.cz;
ludek.novy@tiscali.cz;
ludida@seznam.cz;
lukas.nestarec@gmail.com;
lukasmejdrech@atlas.cz;
lukyduratec@seznam.cz;
lukynatec.l@seznam.cz;
m.herman@seznam.cz;
m.minarik66@seznam.cz;
m.polipsy@seznam.cz;
m.svoboda@vesta.cz;
m.zbuzek@seznam.cz;
Ma.Jisova@seznam.cz;
mai.dvorak@seznam.cz;
marca007@seznam.cz;
marcelasirmerova@gmail.com;
marek.lukes@hp.com;
martakobrova@seznam.cz;
martin@belik.eu;
martin83@centrum.cz;
martincepa@seznam.cz;
martinwena@centrum.cz;
martsestak@seznam.cz;
matej@cepicka.cz;
matousek44@seznam.cz;
MatouskovaTereza@email.cz;
matys@veidec.cz;
mavit@post.cz;
mc_boris@volny.cz;
mcakkolo@seznam.cz;
mihal79@seznam.cz;
michaela.kindlova@volny.cz;
michal@cepicka.cz;
michal@sportsedge.cz;
Michalcila@seznam.cz;
michalsvarc@seznam.cz;
michsazava@seznam.cz;
mikes@simonkolman.eu;
milanrutto@seznam.cz;
milos.tadra@tiscali.cz;
mipa306@volny.cz;
mirek.v@email.cz;
mirekfr@volny.cz;
mirobiker@seznam.cz;
miroslav.chara@seznam.cz;
misak.stribro@seznam.cz;
misakmajer@seznam.cz;
mkarella@volny.cz;
mkarkos@volny.cz;
monika.stribrska@seznam.cz;
mpart@mujmail.cz;
mpechr@homecredit.cz;
mpokorny@seznam.cz;
mrejholec@seznam.cz;
mtb@cenytisku.cz;
novacek@epholding.cz;
oaza@oazarest.cz;
obrik@volny.cz;
okastasro3@seznam.cz;
ondrakunc@gmail.com;
ondrej.krivanek@centrum.cz;
ondrej.vana@seznam.cz;
ondrejberan@centrum.cz;
opife@seznam.cz;
orezavatko@post.cz;
osvatos@volny.cz;
ozotroniq@email.cz;
p-bulda@seznam.cz;
p.dubitzky@gsymposion.cz;
pa.svarc@gmail.com;
pajaxx@seznam.cz;
palicka@lesy-praha.cz;
panoch@quick.cz;
panochlukas@gmail.com;
pateo@seznam.cz;
pav.filip@seznam.cz;
pavel.khol@seznam.cz;
pavel.sustr@seznam.cz;
pavel.venda@volny.cz;
pavla.kasparova@unimills.cz;
pbutora@seznam.cz;
PCUDRAK@SEZNAM.CZ;
pek@peksport.cz;
pekny.s@seznam.cz;
peksport@peksport.cz;
pepa08@seznam.cz;
pet.majer@seznam.cz;
pet.slavik@t-mobile.cz;
peta.pecka@seznam.cz;
petazkolina@centrum.cz;
petr.hanzel@atlas.cz;
petr.holomecek@bistromatic42.cz;
petr.panuscik@seznam.cz;
petr@kavalir.cz;
petra.pospisilka@seznam.cz;
petra.skrbkova@unicreditgroup.cz;
petraskova@lesoservis.cz;
petrcepa@gmail.com;
petrharnos@centrum.cz;
pholomecek@chello.cz;
pirko@emco.cz;
pivonka@hugoles.cz;
pokorny.pisek@seznam.cz;
pokornymatyas@gmail.com;
pribyl.mi@seznam.cz;
ptacek@ekorent.cz;
pudivitr@seznam.cz;
PWeiman@seznam.cz;
R.Jonak@seznam.cz;
r.skorepa@seznam.cz;
radek.leeb@advantage-fl.cz;
radek.sedlacek@kasa.cz;
Radil1@seznam.cz;
radim.aust@unicreditbank.cz;
radim.aust@unicreditgroup.cz;
radim.stantejsky@tiscali.cz;
ranak@centrum.cz;
ranak@centrum.cz;
rejzanda@seznam.cz;
richard.hejduk@seznam.cz;
richard.nemecek@lubstar.cz;
Richard124@seznam.cz;
RICHARD124@SEZNAM.CZ;
rkukula@seznam.cz;
robert@boatpark.cz;
roman.vymetal@unicreditgroup.cz;
Romana.Siskova@seznam.cz;
romankod@seznam.cz;
rostiob@gmail.com;
rusapi@seznam.cz;
rvymetal@seznam.cz;
rybanapavel@seznam.cz;
s.krenova@tiscali.cz;
s.votruba@seznam.cz;
saffek@skokypraha.cz;
saman1992@seznam.cz;
servis@velointest.cz;
setare@seznam.cz;
scheba@seznam.cz;
simakov@seznam.cz;
skeletroll@gmail.com;
skimen3238@seznam.cz;
Slyer999@seznam.cz;
smallmagus@email.cz;
spejzl@emco.cz;
spekoun7@seznam.cz;
stan.hajek.cz@gmail.com;
stana.cermak@seznam.cz;
standadvorak.sd@seznam.cz;
stastna@icpf.cas.cz;
steel74@volny.cz;
stepan.marko@seznam.cz;
stepan.marko@seznam.cz;
stepankova@geomap.cz;
supkam@bnhelp.cz;
svoboda@skokypraha.cz;
svobodazdenek@yahoo.com;
t.bartsch@seznam.cz;
t.bartsch@seznam.cz;
tereza_bartova@centrum.cz;
thladik@kordis-jmk.cz;
tkmarik@seznam.cz;
tkmarik@seznam.cz;
tomas.bruner@centrum.cz;
tomas.drabek@unicreditgroup.cz;
tomas.jancarek@specialized.com;
tomas.kucera@sazava.eu;
tomas.pritasil@seznam.cz;
tomas.valta@unicreditgroup.cz;
tomas@studio071.cz;
tomaskolenaty@gmail.com;
tomaskolenaty@volny.cz;
tomik.braun@gmail.com;
tomik@hekto.cz;
tonda.zavadil@seznam.cz;
tpirk@osoud.pha3.justice.cz;
treko@cmail.cz;
treybalv@email.cz;
truhlarstvi.firbas@cbox.cz;
tsana@msz.pha.justice.cz;
uromed@uromed.cz;
v.prosek@seznam.cz;
v.prosek@seznam.cz;
vaclav.candra@centrum.cz;
vaclavbikezhas@seznam.cz;
vagner@veskom.cz;
vebr.f@centrum.cz;
veronika.hajna@gmail.com;
veroonka@hotmail.com;
veslav.nozka@seznam.cz;
vichtar@seznam.cz;
viktor.kryda@seznam.cz;
vita.d@tiscali.cz;
vitdrahota@seznam.cz;
vladimir.simcak@seznam.cz;
vladimirdanes@gmail.com;
vlachovsky.michal@atlas.cz;
vlasta.karban@centrum.cz;
vlavac@centrum.cz;
vldanek@email.cz;
vopicak-xs@email.cz;
vorel.josef@seznam.cz;
vorf.krystof@seznam.cz;
votocek.v@seznam.cz;
vratislav.donat@gmail.com;
vrbata@cmail.cz;
vsteflickova@seznam.cz;
weca@centrum.cz;
xtr66@seznam.cz;
z.cervinka@gmail.com;
zdenek.albl@t-mobile.cz;
zdenek.kohout@tgcz.cz;
Zdenek.Pekarek@seznam.cz;
Zdenouch@centrum.cz;
zk@seznam.cz;
zstach@click.cz;
zuzana@belik.eu;
zvolsky@kessl.cz;
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
