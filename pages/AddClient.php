<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	echo "<title>Add client</title>";

	echo "<form method=\"POST\" action=\"\">";
		echo "<p>Фамилия Имя Отчество: <input name=\"name\" type=\"text\" placeholder=\"Имя\"/></p>";
		echo "<p>Адрес: <input name=\"adress\" type=\"text\" placeholder=\"Адресс\"/></p>";
		echo "<p>Телефон: <input name=\"phone\" type=\"text\" placeholder=\"Телефон\"/></p>";
		echo "<input type=\"submit\" value=\"добавить\"/>";
	echo "</form>";

	if(empty($_POST['name'])){
		echo"Есть не заполненые поля.<br>";
	}else{
		if(empty($_POST['adress'])){
			echo"Есть не заполненые поля.<br>";
		}else{
			if(empty($_POST['phone'])){
				echo"Есть не заполненые поля.<br>";
			}else{
				$link = $CDB0->link();

				$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
				$adress = htmlentities(mysqli_real_escape_string($link, $_POST['adress']));
				$phone = htmlentities(mysqli_real_escape_string($link, $_POST['phone']));

				$query = "INSERT INTO client VALUES(NULL, '$name','$adress', '$phone')";
		
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				if($result){
					echo "добавлен";
					echo '<script>location.replace("../?page=client");</script>';
					exit;					
				}
			}
		}
	}