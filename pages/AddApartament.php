<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Add apartament</title>";

	echo "<form method=\"POST\" action=\"\">";
		echo "<p>Адрес: <input name=\"Adress\" type=\"text\" placeholder=\"\"/></p><br>";
		echo "<p>Площадь: <input name=\"m2\" type=\"text\" placeholder=\"\"/></p><br>";
		echo "<p>Коллчество комнат: <input name=\"Room\" type=\"text\" placeholder=\"\"/></p><br>";
		echo "<p>Дополнительная информация: <input name=\"Info\" type=\"text\" placeholder=\"\"/></p><br>";
		echo "<input type=\"submit\" value=\"Отправить\"/>";
	echo "</form>";

	if(empty($_POST['Adress']) or empty($_POST['m2']) or empty($_POST['Room'])){
		echo"Есть не заполненые поля.<br>";
	}else{
		$link = $CDB0->link();

		$Adress = htmlentities(mysqli_real_escape_string($link, $_POST['Adress']));
		$m2 = htmlentities(mysqli_real_escape_string($link, $_POST['m2']));
		$Room = htmlentities(mysqli_real_escape_string($link, $_POST['Room']));
		$Info = htmlentities(mysqli_real_escape_string($link, $_POST['Info']));

		$query ="INSERT INTO apartment VALUES(NULL, '$Adress','$m2', '$Room', '$Info')";
		     
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result)	{
			echo "Добавленно";
			echo '<script>location.replace("../?page=client");</script>';
			exit;
		}
	}