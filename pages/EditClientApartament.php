<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Edit inquiry</title>";

	$result3 = $CDB0->AllSelectId('inquiry', htmlspecialchars($_GET["id"]));
	$row = mysqli_fetch_array($result3);

	echo "Изменить следующие данные:<br><br>";
	echo "ID клиента: " . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'ID') . ".<br>";
	echo"ФИО клиента: " . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Name') . ".<br>";
	echo "ID квартиры: " . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'ID') . ".<br>";
	echo "адрес квартиры: " . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Adress') . "<br><br>";
	echo "Изменить на...:";

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
		$idget = $_GET["id"];
		$client = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
		$apartament = htmlentities(mysqli_real_escape_string($link, $_POST['apartament']));

		$query = "UPDATE inquiry SET ID_client = '$client', ID_apartament = '$apartament', update_data = '$date' WHERE inquiry.ID = '$idget'";
			
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		if($result){
			echo "добавлен";
			echo '<script>location.replace("../?page=client_apartament");</script>';
			exit;
		}
	}