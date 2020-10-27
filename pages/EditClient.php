<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Edit client</title>";

	echo 'id клиента: ' . htmlspecialchars($_GET["id"]) . ".<br>";

	$result0 = $CDB0->AllSelectId('client', htmlspecialchars($_GET["id"]));

	$row = mysqli_fetch_array($result0);

	echo "<form method=\"POST\" action=\"\">";
		echo "<p>ID клиента: <input value=\"" . $row['ID'] . "\" name=\"id\" type=\"text\" size=\"10\" readonly/>";
		echo "<p>Фамилия Имя Отчество: <input required value=\"" . $row['Name'] . "\" name=\"name\" type=\"text\" size=\"50\"/></p>";
		echo "<p>Адрес: <input required value=\"" . $row['Address'] . "\" name=\"adress\" type=\"text\" size=\"80\"/></p>";
		echo "<p>Телефон: <input required value=\"" . $row['Phone'] . "\" name=\"phone\" type=\"text\"/></p><br>";
		echo "<input type=\"submit\" value=\"добавить\"/>";
	echo "</form>";

	if(empty($_POST['name']) or empty($_POST['adress']) or empty($_POST['phone'])){
		echo"Есть не заполненые поля.<br>";
	}else{
		$link = $CDB0->link();

		$id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
		$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
		$adress = htmlentities(mysqli_real_escape_string($link, $_POST['adress']));
		$phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));

		$query = "UPDATE client SET Name = '$name', Address = '$adress', Phone = '$phone' WHERE client.ID = '$id'";
		
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result){
			echo "добавлен";
			echo '<script>location.replace("../?page=client");</script>';
			exit;
		}
	}