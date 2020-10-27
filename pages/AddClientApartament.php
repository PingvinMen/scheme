<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Add inquiry</title>";

	echo "<form method=\"POST\" action=\"\">";

		echo "<p>Клиент: <select name=\"name\">";
			echo "<option value=\"\"></option>";

			$result0 = $CDB0->AllSelect('client');
			while ($row = mysqli_fetch_array($result0)) {
				echo "<option value=\"" . $row['ID'] . "\">" . $row['Name'] . "</option>";
			};

		echo "</select></p>";

		echo "<p>Квартира: <select name=\"apartament\">";
			echo "<option value=\"\"></option>";

			$result1 = $CDB0->AllSelect('apartment');
			while ($row = mysqli_fetch_array($result1)) {
				echo "<option value=\"" . $row['ID'] . "\">" . $row['Adress'] . "</option>";
			};

		echo "</select></p>";

		echo "<input type=\"submit\" value=\"добавить\"/>";
	echo "</form>";
	
	if(empty($_POST['name']) or empty($_POST['apartament'])){
		echo"Есть не заполненые поля.<br>";
	}else{
		$link = $CDB0->link();
		$date = date("d.m.y");

		$client = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
		$apartament = htmlentities(mysqli_real_escape_string($link, $_POST['apartament']));

		$query = "INSERT INTO inquiry VALUES(NULL, '$client','$apartament', '$date', '$date', NULL, '1')";
			
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result){
			echo "добавлен";
			echo '<script>location.replace("../?page=client_apartament");</script>';
			exit;
		}
	}