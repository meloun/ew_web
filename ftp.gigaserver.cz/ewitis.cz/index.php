<?php

    //Nacteni konfiguracniho souboru
    require_once dirname(__FILE__) . '/config.php';
    require_once dirname(__FILE__) . '/../lib/texts.php';

    //texy
    require_once dirname(__FILE__). '/../texyla/php/libs/texy.compact.php';
    require_once dirname(__FILE__). '/../texyla/php/admin.cfg.php';
    function common_processTexy($text) {
        $texy = new AdminTexy();
        //Zpracovat pomoci texy

        $text = $texy->process($text);
        return $text;
    }

    // automaticke nacitani knihoven
    // pripojeni k db
    // session
    // include content
    // ochrana proti opakovanemu spamu
    require_once  LIB_PATH. '/php_header.php';
    


    

    //pokud je nastavena session pro flash zkopisruje se do $flash a smaze se
    //Flash::display();
    //Flash::flash1($flash);
    
    $admins = Admin::GetAll();
    $users = User::GetAll();
    $competitions = Competition::GetAll();     

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta http-equiv="Content-Language" content="cs" />
    <meta name="description" content="Rezervace ubytování. Ubytování v Apartmánu Ivona. Trpanj, poloostrov Pelješac, Chorvatsko." />
    <meta name="keywords" content="Časomíra, závody, tréninky, horská kola, mtb, atletika, běžecké závody" />
    <meta name="author" content="Lubos Melichar" />    
    <title><?=$TEXT['title_prefix']?> Časomíra Ewitis | Závody,tréninky - horská kola, atletika, běžecké závody</title>           

<link href="/css/header.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/tabs.css" rel="stylesheet" type="text/css" />

<link href="/css/default.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/common.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/layout.css" media="screen" rel="stylesheet" type="text/css" />

<link href="/jquery/themes/blue/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/css/tables.css" rel="stylesheet" type="text/css" />
<link href="/css/buttons.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript" ></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="/js/sohtanaka_navigation.js" type="text/javascript" ></script>


<script src="/js/tooltip.js" type="text/javascript" ></script>
<script type="text/javascript" src="/js/btn.js"></script>


<!-- Full version of jQuery Tools + jQuery 1.3.2 -->
<script src="http://cdn.jquerytools.org/1.1.2/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="/jquery/jquery-ui-personalized-1.5.2.packed.js"></script>
<script type="text/javascript" src="/jquery/jquery.tablesorter.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("table").tablesorter({widthFixed: false, widgets: ['zebra']});
                var $tabs = $('.tabnav').tabs(); // first tab selected
                $tabs.tabs('select', <?=($_GET["tab"]) ? $_GET["tab"] : 0 ?>);
	});
</script>
</head>

<body>       
<div id="container">    

     <div id="header">    
         <h1><a href="/" title="Ewitis.cz"><span></span>Ewitis.cz</a></h1>
            <ul id="topnav" class="v2">            
                <li <?=($_GET['p']=='ewitis') ? "id='current'": '';?>><a href="?p=ewitis">EWITIS</a></li>
                <li <?=(($_GET['p']=='zavody')|(($_GET['p']=='registrace'))) ? "id='current'": '';?>><a href="?p=zavody">Závody</a></li>
                <li <?=($_GET['p']=='reference') ? "id='current'": '';?>><a href="?p=reference">Reference</a></li>
                <li <?=($_GET['p']=='ceník') ? "id='current'": '';?>><a href="?p=cenik">Ceník</a></li>
                <li <?=($_GET['p']=='kontakt') ? "id='current'": '';?>><a href="?p=kontakt">Kontakt</a></li>
            </ul>
     </div>

	<div style="clear: both;"></div>
        <div id="content">           


        <? if (isset($flash)) { ?>
                <div id="flash" class="hidden">
                    <div class="close" onclick="_close('flash');"></div>
                    <?= $flash ?>
                </div>
        <? } ?>


            <?=$content?>
        </div>
</div>



<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16034666-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>