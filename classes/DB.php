<?php

	/**
	Klassen som sköter uppkoppling mot SQL-databasen


	*/
	class DB {
		private static $_instance = null;
		private $_pdo,
				$_query,
				$_error = false,
				$_result,
				$_count = 0;

		/**
		Privat construktor som skapar en PDOanslutning till databasen

		*/
		private function __construct(){
			try {
				$this->_pdo = new PDO(
					'mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'),
					Config::get('mysql/username'),
					Config::get('mysql/password'),
					array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
				);

			} catch(PDOException $e) {
				Redirect::to(500);
			}
		}

		/**
		Funktion för att skapa en instans av databasen ifall det inte redan finns en instans. Detta görs för att ENDAST skapa en instans och inte flera av databasen


		*/
		public static function getInstance(){
			if(!isset(self::$_instance)){

				self::$_instance = new DB();
			}
			return self::$_instance;
		}

		/**
		Funktionen som utför själv queryn mot databasen

		Parametrar som tas emot är själva queryn($sql) samt en array med parametrar($params) för sökningen


		*/
		public function query($sql, $params = array()){
			$this-> _error = false;
			if($this->_query = $this->_pdo->prepare($sql)){
				$x = 1;
				if(count($params)){
					foreach($params as $param){
						$this->_query->bindValue($x, $param);
						$x++;
					}
				}
				if($this->_query->execute()){
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				}else{
					$this->_error = true;

				}
			}
			return $this;
		}

		/**
		Funktionen förenklar hur man gör en query mot databasen

		Parametrar som tas emot är vilken typ av handling som skall utföras($action), på vilken tabell($table) samt en array med 3 värde($where).


		*/
		public function action($action, $table, $where = array()){
			if(count($where) === 3){
				$operators = array('=', '<', '>', '<=', '>=');

				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];

				if(in_array($operator, $operators)){
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

					if(!$this->query($sql, array($value))->error()){
						return $this;

					}
				}
			} else {
				$sql = "{$action} FROM {$table}";
				if (!$this->query($sql)->error()) {
					return $this;
				}
			}
			return false;

		}

		/**
		Funktion för att hämta värde ur databasen

		Parametrar som tas emot är vilken tabell($table) samt vilket värde($where)


		*/
		public function get($table, $where){
			return $this->action('SELECT *', $table, $where);
		}

		/**
		Funtkion för att hämta samtliga värden ur en specifik tabell.
		*/
		public function getAll($table) {
			return $this->action('SELECT *', $table);
		}

		/**
		Funktion för att radera värde ur databasen.

		Parametrar som tas emot är vilken tabell($table) samt vilket värde($where)

		*/
		public function delete($table, $where){
			return $this->action('DELETE', $table, $where);
		}

		/**
		Funktion för att lägga till värde i databasen

		Parametrar som tas emot är vilken tabell($table), samt en array ($fields) med värden som skall läggas till i  databasen


		*/
		public function insert($table, $fields = array()){
			if(count($fields)){
				$keys =array_keys($fields);
				$values = null;
				$x = 1;

				foreach($fields as $field){
					$values .= "?";
					if($x < count($fields)){
						$values .= ', ';
					}
					$x++;
				}

				$sql = "INSERT INTO {$table} (`" . implode('` , `', $keys) . "`) VALUES ({$values})";

				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			}
			return false;
		}

		/**
		Funktion för att uppdatera värde i databasen

		Parametrar som tas emot är vilken tabell($table), vilket id($id) som skall uppdateras samt en array ($fields) med värden som skall läggas till i  databasen


		*/
		public function update($table, $id, $fields){
			$set = '';
			$x = 1;

			foreach($fields as $name => $value){
				$set .= "{$name} = ?";
				if($x < count($fields)){
					$set .= ', ';
				}
				$x++;
			}

			$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

			if(!$this->query($sql, $fields)->error()){
				return true;
			}
			return false;
		}

		/**
		Funktionen returnerar $_result

		*/
		public function results(){
			return $this->_result;
		}

		/**
		Funktionen returnerar första elementet i $_result

		*/
		public function first(){
			return $this->results()[0];
		}

		/**
		Funktionen returnerar $_error

		*/
		public function error(){

			return $this->_error;
		}


		/**
		Funktionen returnerar $_count

		*/
		public function count(){
			return $this->_count;


		}

		public function lastInsertId() {
			return $this->_pdo->lastInsertId();
		}

	}

?>
