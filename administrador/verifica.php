<?php

    session_start();
	
	if( (!isset($_SESSION['codeAdministrador'])) && (!isset($_SESSION['nomeAdministrador'])) && (!isset($_SESSION['tipo'])) )
	
    header('Location: ../login_administrador.php');

?>
