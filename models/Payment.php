<?php
	require_once ('connection.php');

	class Payment{

		private static $instance;
		private $dbh;

		private function __construct()
		{
			$this->dbh = Connection::singleton_connection();
		}

		public static function singletonPayment()
		{
			if(!isset(self::$instance)){
				$myclass = __CLASS__;
				self::$instance = new $myclass;
			}
			return self::$instance;
		}

		public function createPayment($data){
			try{
				$query = $this->dbh->prepare('INSERT INTO payments(customer_id, account_owner, iban) VALUES (:customer_id, :account_owner, :iban)');
				$query->bindParam(':customer_id', $data['customerId'], PDO::PARAM_INT);
				$query->bindParam(':account_owner', $data['owner'], PDO::PARAM_STR);
				$query->bindParam(':iban', $data['iban'], PDO::PARAM_STR);
				$query->execute();
				return $this->dbh->lastId();
				$this->dbh = null;
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}
		}

		public function updatePaymentData($data){
			try{
				$query = $this->dbh->prepare('UPDATE payments SET 
													payment_data_id = :payment_data_id
													WHERE id = :id');
				$query->bindParam(':payment_data_id', $data['payment_data_id'], PDO::PARAM_STR);
				$query->bindParam(':id', $data['id'], PDO::PARAM_INT);
				$query->execute();
				return $this->dbh->lastId();
				$this->dbh = null;
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}
		}

		public function __clone(){
			trigger_error('you can not clone this object', E_USER_ERROR);
		}
	}
?>