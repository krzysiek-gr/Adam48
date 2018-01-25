<?php

	require_once "connect.php";	//Instrukcja require_once - wczytuje plik "connect.php"
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);		// połączenie z bazą danych MySql (znak @ blokuje wyświetlanie błądów.)
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql = "select * from uzytkownicy where user='$login' and pass='$haslo'";
		
		if($rezultat = @$polaczenie->query($sql)) 	// wykona zapytanie $sql
		{
			$ilu_userow = $rezultat->num_rows;		//zapytanie zwróci ile jest zgodnych rekordów z zapytaniem sql
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				$user = $wiersz['user'];
				
				$rezultat->free_result();
				
			echo $user; 
			
			} else {
				
			}
		}
		
		
		
		$polaczenie->close();
	}
// 48:51
	
?>