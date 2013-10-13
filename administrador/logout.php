<?php

    session_start();
	
    unset($_SESSION['codigo']);
    unset($_SESSION['nome']);
	unset($_SESSION['tipo']);
	
	header('Location: ../login_administrador.php');

?>
