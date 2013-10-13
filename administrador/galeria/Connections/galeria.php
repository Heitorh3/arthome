<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_galeria = "localhost";
$database_galeria = "galeria";
$username_galeria = "root";
$password_galeria = "floresta";
$galeria = mysql_pconnect($hostname_galeria, $username_galeria, $password_galeria) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
