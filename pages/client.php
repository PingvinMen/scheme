<!-- {{title: Клиенты}} -->
<?
	$result0 = $CDB0->AllSelect('client');

	echo"<h2>Клиенты</h2>";
	echo"<table> <tr> <td>Имя</td> <td>Адресс</td> <td>Телефон</td> </tr>";

	while ($row = mysqli_fetch_array($result0)) {
		echo "<tr><td><ul><li><a class=\"string\">" . $row['Name'] . "</a><ul><li><a href=\"./pages/EditClient.php?id=" . $row['ID'] . "\">Обновить</a></li><li><a href=\"./pages/Delete.php?id_client=" . $row['ID'] . "\" class=\"brd\">Удалить</a></li></ul></li></ul></td><td>" . $row['Address'] . "</td><td>" . $row['Phone'] . "</td></tr>";
	};

	echo"</table>";