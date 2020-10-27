<!-- {{title: Квартиры}} -->
<?
	/*Таблица с квартирами*/

	$result0 = $CDB0->AllSelect('apartment');

	echo"<h2>Клиенты</h2>";
	echo"<table> <tr> <td>Адресс</td> <td>Площадь</td> <td>Комнат</td> <td>Дополнительная информация</td> <td>Фото</td> </tr>";

	while ($row = mysqli_fetch_array($result0)) {
		echo "<tr><td><ul><li><a class=\"string\">" . $row['Adress'] . "</a><ul><li><a href=\"./pages/EditApartament.php?id=" . $row['ID'] . "\">Обновить</a></li><li><a href=\"./pages/Delete.php?id_apartament=" . $row['ID'] . "\" class=\"brd\">Удалить</a></li></ul></li></ul></td><td>" . $row['m2'] . "</td><td>" . $row['Room'] . "</td><td>" . $row['Info'] . "</td><td><p><img class = \"PhotoInTable\" src=\"/elems/Photo/" . $CDB0->OneMeaningFrom('photo','ID',$row['ID'],'Photo') . "\"></p></td></tr>";
	};

	echo"</table>";
?>