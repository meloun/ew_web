<?php session_start() ?>
<form method="post" action="">
<table bgcolor="#CCCCCC">
<tr><th>Contact us (Post new message):</th></tr>
<tr><td><textarea cols="30" rows="5" name="message"></textarea></td></tr>
<tr><td align="center">CAPTCHA:<br>
	(antispam code, 3 black symbols)<br>
	<table><tr><td><img src="captcha.php" alt="captcha image"></td><td><input type="text" name="captcha" size="3" maxlength="3"></td></tr></table>
</td></tr>
<tr><th><input type="submit" value="Submit"></th></tr>	
</table>
</form>
<?php
if(isset($_POST["captcha"]))
if($_SESSION["captcha"]==$_POST["captcha"])
{
    //CAPTHCA is valid; proceed the message: save to database, send by e-mail ...
	echo 'CAPTHCA is valid; proceed the message';
}
else
{
	echo 'CAPTHCA is not valid; ignore submission';
}
?>
