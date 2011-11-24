<?php



    error_reporting(E_ALL - E_NOTICE);

    //Overeni prihlaseni

    if ($_SERVER['PHP_AUTH_USER'] != 'admin' || $_SERVER['PHP_AUTH_PW'] != 'renda') {

        Header('WWW-Authenticate: Basic realm="developer web ewitis.cz"');

        Header('HTTP/1.0 401 Unauthorized');

        echo("Neplatne jmeno nebo heslo");

    } else {

        //K databazi pripojit pouze, pokud je uzivatel prihlasen
        include "dev_web.htm"; 


    }

  
  ?>