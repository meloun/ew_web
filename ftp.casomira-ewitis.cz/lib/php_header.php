<?php
	error_reporting(E_ALL - E_NOTICE);

	//Automaticky nacte php tridu, kdyz je zavolana
	if (!function_exists(__autoload)) {
		function __autoload($name) {
			require_once LIB_PATH.'/' . strtolower($name) . '.class.php';
		}
	}

	//TODO: pripojit k databazi
	$link = Db::Connect(DB_HOST, DB_NAME, DB_USR, DB_PWD);
	define('LINK', $link);

        
        //Nacteni konkretni stranky podle parametru GET[page]
        session_start();
	ob_start();
        
	if (!isset($_GET['p'])) $_GET['p'] = 'casomira';
	if (!file_exists(WEB_PATH . strtolower($_GET['p']) . '.php'))
		$_GET['page'] = '404';
	include WEB_PATH . '/inc/' . strtolower($_GET['p']) . '.php';
	$content = ob_get_contents();
	ob_end_clean();

      //Osetreni zobrazeni topnote pri rychlem reloadu
/*      if ($_SESSION["top_note"] != "" && $top_note == "") {
        $top_note = $_SESSION["top_note"];
        $top_note_class = $_SESSION["top_note_class"];
        $top_note_delay = $_SESSION["top_note_delay"];        
        $_SESSION["top_note"] = "";
      } else {
        $_SESSION["top_note"] = $top_note;
        $_SESSION["top_note_class"] = $top_note_class;
        $_SESSION["top_note_delay"] = $top_note_delay;      
      }
      
echo($_SESSION["top_note"]);
echo($top_note);*/
  //Ochrana proti opakovanemu postu
    //if (($_POST)&&(!(isset($_POST['noheader'])))){
        //if ($_POST['redir']) header("Location: {$_POST['redir']}&lang=$lang");
        //else
      //  header("Location: {$_SERVER['REQUEST_URI']}");
   // }
        
        

if ($_POST){
        if(isset($_POST['noheader']))
            ;
        else{
            $url = $url ? $url : $_SERVER['REQUEST_URI'];
            header("Location: $url");
        }
}



   
?>

