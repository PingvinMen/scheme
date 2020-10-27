<?
	class ConectDB{

		private $dbHost = "localhost";
		private $dbUser = "root";
		private $dbPass = "";
		private $dbName = "scheme";

		public function setdbHost($dbHost){
			$this->dbHost = $dbHost;
		}

		public function setdbName($dbName){
			$this->dbName = $dbName;
		}

		public function setdbUser($dbUser){
			$this->dbUser = $dbUser;
		}

		public function setdbPass($dbPass){
			$this->dbPass = $dbPass;
		}

		public function Infolink(){
			$link = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
			if (!$link) {
				echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL . ".<br>";
				echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL . ".<br>";
				echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL . ".<br>";
				exit;
			}

			echo "Соединение с MySQL установлено" . PHP_EOL . ".<br>";
			echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL. ".";

			mysqli_close($link);
		}

		public function link(){
			return mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
			return mysqli_query($link, "SET NAMES 'utf8'");
		}

		public function AllSelect($nameTable){
			$sql = "SELECT * FROM $nameTable";
			$link = $this->link();
			return mysqli_query($link, $sql);
		}

		public function AllSelectId($nameTable, $id){
			$sql = "SELECT * FROM $nameTable WHERE ID = $id";
			$link = $this->link();
			return mysqli_query($link, $sql);
		}
	
		public function SelectWhere($nameTable, $columnTable, $value){
			$sql = "SELECT * FROM $nameTable WHERE $columnTable = $value";
			$link = $this->link();
			return mysqli_query($link, $sql);
		}
		/*
		получать строку из таблицы
		$nameTable - название таблицы
		$columnTable - название колонки
		$string - значение колонки
		$value - колонка результата выборки		
		*/

		public function OneMeaningFrom($nameTable, $columnTable, $string, $value){
			$sql = "SELECT * FROM $nameTable WHERE $columnTable = $string";
			$link = $this->link();
			$res = mysqli_query($link, $sql);

			while ($row = mysqli_fetch_array($res)) {
				return $row["$value"];
			}
		}
		/*
		получать значение из таблицы
		$nameTable - название таблицы
		$columnTable - название колонки
		$string - значение колонки
		$value - колонка результата выборки
		*/

		public function DeleteId($nameTable, $id){
			$sql = "DELETE FROM $nameTable WHERE $nameTable . ID = $id";
			$link = $this->link();
			return mysqli_query($link, $sql);
		}
		/*
		удалить строку по id
		$nameTable - название таблицы
		$id - id по которому 
		*/
	}