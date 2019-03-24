<?php
	require_once ('connection.php');

	class Customer{

		private static $instance;
		private $dbh;

		private function __construct()
		{
			$this->dbh = Connection::singleton_connection();
		}

		public static function singletonCustomer()
		{
			if(!isset(self::$instance)){
				$myclass = __CLASS__;
				self::$instance = new $myclass;
			}
			return self::$instance;
		}

		public function createCustomer($data){
			try{
				$query = $this->dbh->prepare('INSERT INTO customers(first_name, last_name, phone) VALUES (:first_name, :last_name, :phone)');
				$query->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
				$query->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);
				$query->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
				$query->execute();
				return $this->dbh->lastId();
				$this->dbh = null;
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}

		}

		public function updateCustomerAddress($data){
			try{
				$query = $this->dbh->prepare('UPDATE customers SET street = :street, 
													house_number = :house_number,
													zip_code = :zip_code,
													city = :city
													WHERE id = :id');
				$query->bindParam(':street', $data['street'], PDO::PARAM_STR);
				$query->bindParam(':house_number', $data['house_number'], PDO::PARAM_STR);
				$query->bindParam(':zip_code', $data['zip_code'], PDO::PARAM_STR);
				$query->bindParam(':city', $data['city'], PDO::PARAM_STR);
				$query->bindParam(':id', $data['id'], PDO::PARAM_INT);
				$query->execute();
				return $this->dbh->lastId();
				$this->dbh = null;
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}
		}

		public function getCustomers($first_name, $last_name, $phone){
			try{
				$query = $this->dbh->prepare('SELECT * FROM customers WHERE first_name = :first_name
																		AND last_name = :last_name 
																		AND phone = :phone 
																		AND success IS NULL 
																		ORDER BY created_at DESC
																		LIMIT 1');
				$query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
				$query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
				$query->bindParam(':phone', $phone, PDO::PARAM_STR);
				$query->execute();
				return $query->fetchAll(PDO::FETCH_ASSOC);
				$this->dbh = null;
			}catch(PDOException $e){
				print "Error!: " . $e->getMessage();
			}
		}

		public function updateCustomerSuccess($data){
			try{
				$query = $this->dbh->prepare('UPDATE customers SET success = :success
													WHERE id = :id');
				$query->bindParam(':success', $data['success'], PDO::PARAM_STR);
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