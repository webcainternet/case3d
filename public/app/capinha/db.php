<?php
$mysql_hostname = "www.capasparaiphone.com.br";
$mysql_user = "username";
$mysql_password = "password";
$mysql_database = "database";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>