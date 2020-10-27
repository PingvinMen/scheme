<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/class/FileClass.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/elems/include.php";

	$result0 = $CDB0->AllSelect('inquiry');

	$text0 = '<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<root>';

	$fp = fopen("xml_file.xml", "w");//открываем файл, если файл не существует, делается попытка создать его
	fwrite($fp, $text0);// записываем в файл текст

		while ($row = mysqli_fetch_array($result0)){
		$text1 = '
	<inquiry>
		<client id="' . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'ID') . '">
			<name>' . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Name') . '</name>
			<phone>' . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Phone') . '</phone>
			<adres>' . $CDB0->OneMeaningFrom('client','ID',$row['ID_client'],'Address') . '</adres>
		</client>
		<apartment id="' . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'ID') . '">
			<adres>' . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Adress') . '</adres>
			<area>' . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'m2') . '</area>
			<room>' . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Room') . '</room>
			<info>' . $CDB0->OneMeaningFrom('apartment','ID',$row['ID_apartament'],'Info') . '</info>
		</apartment>
	</inquiry>';

	$fp = fopen("xml_file.xml", "a");//открываем файл
	fwrite($fp, $text1);// дописываем в файл текст

			}
	$text2 = '
</root>';

	$fp = fopen("xml_file.xml", "a");//открываем файл
	fwrite($fp, $text2);// дописываем в файл текст
	fclose($fp);// закрываем
	echo "XML фаил создан находится : " .  $_SERVER['DOCUMENT_ROOT'] . "/elems/xml_file.xml";
	echo "</a><ul><li><a href=\" ../?page=client_apartament\">Вернуться на \"Клиенты и квартиры\"</a>";
?>