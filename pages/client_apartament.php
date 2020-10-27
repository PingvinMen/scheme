<!-- {{title: Клиенты и квартиры}} -->
<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	
	echo "<h2>Квартиры и клиенты</h2>";

	echo"<table> <tr> <td colspan=\"3\">клиент</td> <td colspan=\"5\">квартира</td> <td rowspan=\"2\" colspan=\"1\">дата создания</td> <td rowspan=\"2\" colspan=\"1\">дата изменения</td> <td rowspan=\"2\" colspan=\"1\">дата удаления</td> </tr>";
	echo"<tr> <td colspan=\"1\">ФИО</td> <td colspan=\"1\">Адрес</td> <td colspan=\"1\">Телефон</td> <td colspan=\"1\">Адрес</td> <td colspan=\"1\">площадь (м2)</td> <td colspan=\"1\">Комнат</td> <td colspan=\"1\">Доп. информация</td> <td colspan=\"1\">Фото</td> <tr>";

	$result2 = $CDB0->AllSelect('inquiry');
	while ($row = mysqli_fetch_array($result2)) {

		echo"<tr> <td colspan=\"1\"><ul><li><a class=\"string\">" . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Name') . "</a><ul><li><a href=\"./pages/EditClientApartament.php?id=" . $row['ID'] . "\">Обновить</a></li><li><a href=\"./pages/Delete.php?id_inquiry=" . $row['ID'] . "\" class=\"brd\">Удалить</a></li></ul></li></ul><br></td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Address') . "</td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Phone') . "</td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Adress') . "</td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'m2') . "</td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Room') . "</td> <td colspan=\"1\">" . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Info') . "</td> <td colspan=\"1\"><p><img class = \"PhotoInTable\" src=\"/elems/Photo/" . $CDB0->OneMeaningFrom('photo','ID_apartament',$row['ID_apartament'],'Photo') . "\"></p></td> <td colspan=\"1\">" . $row['data_add'] . "</td>  <td colspan=\"1\">" . $row['update_data'] . "</td> <td colspan=\"1\">" . $row['deletion_date'] . "</td> </tr>";
	};
	echo "</table>";
	echo "</a><ul><li><a href=\"../elems/create_XML.php\">Создать XML фаил </a>";