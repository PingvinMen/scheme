<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Delet</title>";

	if(!empty($_GET["id_client"])){
		
		echo "клиента удален";

		$link = $CDB0->link();

		$idc = mysqli_real_escape_string($link, $_GET['id_client']);

		$query = "DELETE FROM client WHERE ID = '$idc'";
	
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
		mysqli_close($link);
		echo '<script>location.replace("../?page=client");</script>';
	}else{
		if(!empty($_GET["id_apartament"])){
			echo "ID апартаментов: " . $_GET["id_apartament"] . "<br>";

			$link = $CDB0->link();

			$ida = mysqli_real_escape_string($link, $_GET['id_apartament']);

			$query = "DELETE FROM apartment WHERE ID = '$ida'";
		
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
			mysqli_close($link);
			echo '<script>location.replace("../?page=apartament");</script>';
		}else{
			if(!empty($_GET["id_inquiry"])){
				$znahcenie = $CDB0->OneMeaningFrom('inquiry', 'Activ', $_GET["id_inquiry"], 'Activ');
				echo $znahcenie;
				echo "ID запроса: " . $_GET["id_inquiry"] . "<br>";

				$link = $CDB0->link();
				$date =  date("d.m.y");

				$ida = mysqli_real_escape_string($link, $_GET['id_inquiry']);

				$query = "UPDATE inquiry SET deletion_date = '$date', Activ = '0' WHERE inquiry.ID = '$ida'";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				mysqli_close($link);
				echo '<script>location.replace("../?page=client_apartament");</script>';
			}else{
				echo "Ошибка!";
				echo '<script>location.replace("../?page=client");</script>';
			}
		}
	}