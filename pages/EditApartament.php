<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Edit apartament</title>";

	echo 'id квартиры: ' . htmlspecialchars($_GET["id"]) . '!';

	$result0 = $CDB0->AllSelectId('apartment', htmlspecialchars($_GET["id"]));

	$row = mysqli_fetch_array($result0);

	echo "<form method=\"POST\" action=\"\">";
		echo "<p>ID квартиры: <input value=\"" . $row['ID'] . "\" name=\"id\" type=\"text\" size=\"10\" readonly/>";
		echo "<p>Адрес: <input required value=\"" . $row['Adress'] . "\" name=\"Adress\" type=\"text\" size=\"50\"/></p>";
		echo "<p>Площадь квартиры: <input required value=\"" . $row['m2'] . "\" name=\"m2\" type=\"text\" size=\"50\"/></p>";
		echo "<p>Колличество комнат: <input required value=\"" . $row['Room'] . "\" name=\"Room\" type=\"text\" size=\"50\"/></p>";
		echo "<p>Дополнительная информация: <input value=\"" . $row['Info'] . "\" name=\"Info\" type=\"text\" size=\"50\"/></p>";

		echo "<input type=\"submit\" value=\"добавить\"/>";
	echo "</form>";

	if(empty($_POST['Adress']) or empty($_POST['m2']) or empty($_POST['Room'])){
		echo"Есть не заполненые поля.<br>";
	}else{
		$link = $CDB0->link();

		$id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
		$adres = htmlentities(mysqli_real_escape_string($link, $_POST['Adress']));
		$m2 = htmlentities(mysqli_real_escape_string($link, $_POST['m2']));
		$room = htmlentities(mysqli_real_escape_string($link, $_POST['Room']));
		$info = htmlentities(mysqli_real_escape_string($link, $_POST['Info']));

		$query = "UPDATE apartment SET Adress = '$adres', m2 = '$m2', Room = '$room', Info = '$info' WHERE apartment.ID = '$id'";
		
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result){
			echo "добавлен";
			echo '<script>location.replace("../?page=apartament");</script>';
			exit;
		}
	}