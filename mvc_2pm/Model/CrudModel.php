<?php
	
	class CrudModel {

		private $serverName = "localhost";
		private $userName = "root";
		private $password = "";
		private $dbName = "ecom";
		public $conn;
		public $query;
		public $result;
		public $response;
		public $finalArrayData = array();



		public function __construct() {
			$this->conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
		}

		public function getAllDetails($table) {

			$this->query = "SELECT * FROM $table";
			$this->result = mysqli_query($this->conn, $this->query);
			while($this->response[] = mysqli_fetch_assoc($this->result)) {}
			$this->finalArrayData = array_filter($this->response);		
			return $this->finalArrayData;
		}

		public function insertData($data, $table) {

			$arrayKey = array_keys($data);
			$colName = "`". implode("`,`", $arrayKey) . "`";

			$getValues = array_values($data);
			$getValues = "'". implode("','", $getValues) . "'";

			$this->query = "INSERT INTO $table ($colName) VALUES ($getValues)";

			return mysqli_query($this->conn, $this->query);

		}

		public function deleteData($data, $table) {

			$this->query = "DELETE FROM $table WHERE id = ".$data;

			return mysqli_query($this->conn, $this->query);
		}

		public function editById($data, $table) {
			$this->query = "SELECT * FROM $table WHERE id=".$data;

			$this->result = mysqli_query($this->conn, $this->query);

			return mysqli_fetch_object($this->result);
		}

		public function updateData($data, $table) {


			$this->query = "UPDATE $table SET `size`='".$data['size']."',`status`='".$data['status']."',`updated_at`='". date("Y-m-d H:i:s") ."' WHERE id=".$data['id'];
			return mysqli_query($this->conn, $this->query);

		}
	}

?>