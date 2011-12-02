<?
 require_once dirname(__FILE__) . '/config.php';

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

echo $_GET['test'];

phpinfo();

?>	
	
