<?php

    if(isset($_GET['lang']))
        $lang = $_GET['lang'];
    else
        $lang = 'cz';   
    
    define('DEVELOP','1');
    define('SECOND_LANGUAGE','');
    define('WEB_NAME','Ewitis.cz');
    define('HEADING', 'Administrace Webu '.WEB_NAME);
	
    define('DB_SERVER', 'KAPUSTA');
    if(DB_SERVER=='KAPUSTA'){
        $db_name = 'casomira-ewitis_cz_1';
        define('DB_HOST', 'localhost');
        define('DB_NAME', $db_name);
        define('DB_USR', 'casomira-ewit_cz');
        define('DB_PWD', 'fR0Lsqdl2A');
	
        //PATHs 
        define('LIB_PATH',  $_SERVER['DOCUMENT_ROOT']. '/../lib');
        define('WEB_PATH',  $_SERVER['DOCUMENT_ROOT']);
        define('GALLERY_PATH', $_SERVER['DOCUMENT_ROOT'].'/galleries');

        //URLs        
        define('GALLERY_URL', '/galleries/');
	 
    }
    else{
        $db_name = 'eilil';
        define('DB_HOST', 'localhost');
        define('DB_NAME', $db_name);
        define('DB_USR', 'root');
        define('DB_PWD', 'climbing');


        define('ROOT_URL', '/'); //adresa rootu,
        define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']); //adresa rootu,

        define('WEB_URL', '/');
        define('WEB_PATH', '/');

        define('JQUERY_PATH', '/jquery/');
        define('JS_PATH', '/js/');
        define('TEXYLA_PATH', '/texyla/');

        define('GALLERY_URL', '/galleries/');
        define('GALLERY_PATH', $_SERVER['DOCUMENT_ROOT'].'galleries/');
        


        define('LIB_URL', INDEX_URL.'/lib');
        define('LIB_PATH', $_SERVER['DOCUMENT_ROOT'].'../../lisb/');
        define('ADMIN_URL', INDEX_URL.'/admin');
        define('ADMIN_PATH', ROOT_PATH . ADMIN_URL);
        define('FILES_URL', INDEX_URL.'/files');
        define('FILES_PATH', ROOT_PATH .'files/');

   /*define('ROOT_PREFIX', '/stepanek-wr09_cz');
   define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . ROOT_PREFIX);
   define('ROOT_URL', ROOT_PREFIX.'/admin');
	 define('WEB_URL', '/stepanek-wr09_cz/web');	 
	 define('WEB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/stepanek-wr09_cz/web');
	 define('FILES_PATH_PREFIX', '/texyla/files');
	 define('FILES_PATH', ROOT_PATH . FILES_PATH_PREFIX);*/
  }
	//if (!file_exists(WEB_PATH . '/galleries'))
		//mkdir(WEB_PATH . '/galleries');
		
	//if (!file_exists(WEB_PATH))
		//mkdir(WEB_PATH);		
?>