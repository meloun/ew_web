<?php

var_dump($_GET['p']);
var_dump($_GET['n']);
var_dump($_GET['t']);
var_dump($_GET['fk']);
header("Location: http://www.casomira-ewitis.cz/{$_GET['p']}/{$_GET['n']}/{$_GET['t']}/{$_GET['fk']}");
?>
