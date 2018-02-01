<?php
	session_start();	//musi być na samym początku, żeby działała tablica $SESSION
?><?php
	
	session_start();	//musi być na samym początku, żeby działała tablica $SESSION
	
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
				$_SESSION['zalogowany'] = true;		//flaga = zmienna typu bool (true/false), którą ustawiamy jako symbol zajścia czegoś w kodzie. W tym przypadku, że ktoś jest zalogowany.
				$wiersz = $rezultat->fetch_assoc(); // Tablica przechowywująca wszystkie kolumny tabeli
				$_SESSION['id']	= $wiersz['id'];	// 
				$_SESSION['user'] = $wiersz['user'];	//Zapisanie do tablicy $_SESSION ("pojemnik na zmienne")tablicy z MySql
				$_SESSION['drewno'] = $wiersz['drewno'];	
				$_SESSION['kamien'] = $wiersz['kamien'];	
				$_SESSION['zboze'] = $wiersz['zboze'];	
				$_SESSION['email'] = $wiersz['email'];	
				$_SESSION['dnipremium'] = $wiersz['dnipremium'];	
				
				unset($_SESSION['blad']);	//usunięcie z sesji zmiennej 'błąd'
				$rezultat->free_result();
				header('Location: gra.php'); 		//header = przekierowanie z użyciem nagłówka HTTP
			
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');	//przeniesienie do pliku index.php
			}
		}
		
		
		
		$polaczenie->close();
	}
// 01:16:04