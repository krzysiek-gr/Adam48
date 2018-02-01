<?php
	session_start();
	
	session_unset();	// zamknięcie sesji 
	
	header('Location: index.php');	// Przekierowanie urzytkownika na stronę główną.
?>

