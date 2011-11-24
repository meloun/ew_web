<?php
class Email {
    /** Kontrola e-mailové adresy
    * @param string e-mailová adresa
    * @return bool syntaktická správnost adresy
    * @copyright Jakub Vrána, http://php.vrana.cz/
    */
    public static function check_email($email) {
	$atom = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]'; // znaky tvořící uživatelské jméno
	$domain = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])'; // jedna komponenta domény
	return eregi("^$atom+(\\.$atom+)*@($domain?\\.)+$domain\$", $email);
    }
    public static function encode_header($string) {
      return  '=?UTF-8?B?' . base64_encode($string) . '?=';
    }
    public static function Send($to, $subject, $message, $from_email, $from_name) {
	$headers .= "From: ".Email::encode_header($from_name)."<".$from_email.">\n"; //
	$headers .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit";
	mail(
	    $to,
	    Email::encode_header($subject),
	    "$message",
	    $headers
	  );
    }
}
?>