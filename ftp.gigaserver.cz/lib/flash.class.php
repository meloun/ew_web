<?php

/**
 * Třída poskytuje funkce pro přenačtení stránky se speciálním FLASH dialogem.
 *
 * Například příkaz: $this->flash('Hello World!', '/index') přesměruje skript
 * na stránku /index a zobrazí hlášku 'Hello World!'.
 *
 * Funkce reload je to stejné, jako flash, ale nezobrazí hlášku. Pokud není
 * uveden parametr URL, je přenačtena současná stránka
 */

//require_once dirname(__FILE__) . "/athr.class.php";

class Flash //extends PageAthr
{
    public static function display()
    {
        global $flash;
        //parent::display();
        
        if (isset($_SESSION['app']['flash']))
        {
            //$this->flash = $_SESSION['app']['flash'];
            $flash = $_SESSION['app']['flash'];
            unset($_SESSION['app']['flash']);
        }
        else
        {
            //$this->flash = null;
            $flash = null;
        }
    }

    public static function flash1($flash, $url = null)
    {
        //if (DEBUG) $this->log('Flash', "({$url}) $flash");
        $_SESSION['app']['flash'] = $flash;
        if(isset($_POST['noheader']))
            return;
        echo("PRESMEROVAVAM");
        //Flash::reload($url);
    }

    public static function reload($url = null)
    {
        $url = $url ? $url : $_SERVER['REQUEST_URI'];        
        header("Location: $url");
        exit;
    }
}
?>
