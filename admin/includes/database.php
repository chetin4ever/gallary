<?php
	require_once("new_config.php");
	class Database{
		public $connection;
		function __construct(){
			$this->open_db_connection();
		}
		public function open_db_connection(){
			
			/*$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if(!$this->connection){
				echo"failed";
			}
			if(mysqli_connect_errno()){
				die("Database connection failed badly".mysql_error());

			}*/
			$this->connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->connection->connect_errno){
				die("Database connection failed badly".mysql_error());
			}
		}
		public function query($sql){
			
			$result=mysqli_query($this->connection,$sql);
			//print_r($result);
			return $result;
		}
		private function confirm_query($result){
			if(!$result){
				die("query failed");
			}
		}
		public function escape_string($string){
			$escaped_string=mysql_real_escape_string($string);
			return($escaped_string);
		}
		public function the_insert_id(){
			mysqli_insert_id($this->connection);
			return true;
		}
	}//end of class
	$database=new Database();
	//$database->open_db_connection();
?>