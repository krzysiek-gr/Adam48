<?PHP
	session_start();	//musi być na samym początku, żeby działała tablica $SESSION
?>

<DOCTYPE HTML />
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv=X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>
<?php
	
	echo "<p>Witaj ".$_SESSION['user']."!</p>";
	echo "<p><b>Drewno</b>: ".$_SESSION['drewno'];
	echo "|<b>Kamień</b>: ".$_SESSION['kamien'];
	echo "|<b>Zboże</b>: ".$_SESSION['zboze']."</p>";
	
	echo "<p><b>E-mail</b>: ".$_SESSION['email'];
	echo "<p><b>Dni premium</b>: ".$_SESSION['dnipremium']."</p>";
	
	

?>

</body>
</html>