<?php
	require_once "config.php";
	class Connection{

		private static $instance;
		private $dbh;

		private function __construct(){
			try{
				$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
				$this->dbh->exec("SET CHARACTER SET utf8");
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			} catch(PDOException $e){
				print "Error!: ".$e->getMessage();
				die();
			}
		}

		public function prepare($sql){
			return $this->dbh->prepare($sql);
		}

		public function lastId(){
			return $this->dbh->lastInsertId();
		}

		public static function singleton_connection(){
			if(!isset(self::$instance)){
				$myclass = __CLASS__;
				self::$instance = new $myclass;
			}
			return self::$instance;  
		}

		public function __clone()
		{
			trigger_error('you can not clone this object', E_USER_ERROR);
		}
	}
?>