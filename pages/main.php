<!-- {{title: Главная}} -->
<h1>тестовое задание</h1>
<p>Условия:<br>
scheme.sql  - с таблицами которые она создаст для решения задачи<br>
*.php - один или несколько файлов php (без фреймворков) которые будут решать поставленную задачу.</p>
<p>Структура БД mysql:<br>
таблица 1 :<br>
содержит данные клиента<br>
	название клиента<br>
	адрес<br>
	телефон<br>
таблица 2 - содержит :<br>
привязка объекта (к примеру квартира) к клиенту<br>
уникальный идентификатор квартиры<br>
дата добавления записи<br>
дата обновления записи<br>
дата удаления записи<br>

таблица 3 - содержит параметры квартиры<br>
такие как номер квартиры, адрес ,  площадь , кол-во комнат,<br> этаж  и прочее<br>

таблица 4 - содержит фото этой квартиры<br>


Задание:<br>
1.	Создать в БД таблицы <br>
2.	Наполнить тестовыми данными <br>
должно быть минимум 3 клиента и у каждого по 2-3 квартиры с разными параметрами<br>
3.	Написать класс на php для взаимодействия с БД <br>
4.	Выбрать для 1го клиента только 1 комнатные квартиры , для 2го клиента 3х комнатные , а для 3го все записи<br>
5.	Из полученных данных сформировать xml файл произвольного формата (за основу можно взять яндекс формат или придумать свой) <br>