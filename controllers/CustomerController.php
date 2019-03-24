<?php
	require_once "models/Customer.php";

	class CustomerController
	{
		private $model;

		public function __construct()
		{
			$this->model = Customer::singletonCustomer();
		}

		public function indexAction()
		{
			return new View('customers','index');
		}

		public function storeAction()
		{
			$validation = $this->model->getCustomers($_POST['first_name'], $_POST['last_name'], $_POST['phone']);

			if(count($validation) == 0){
				$customer = $this->model->createCustomer([
					'first_name' => $_POST['first_name'],
					'last_name' => $_POST['last_name'],
					'phone' => $_POST['phone']
				]);
				$view = new View('customers','address', compact('customer'));
			}
			elseif(is_null($validation[0]['street'])){
				$customer = $validation[0]['id'];
				$view = new View('customers','address', compact('customer'));
			}
			else{
				$customer = $validation[0]['id'];
				$view = new View('payments','index', compact('customer'));
			}

			return $view;
		}

		public function storeAddressAction($customer)
		{
			$address = $this->model->updateCustomerAddress([
				'street' => $_POST['street'],
				'house_number' => $_POST['house'],
				'zip_code' => $_POST['zip_code'],
				'city' => $_POST['city'],
				'id' => $customer
			]);

			return new View('payments','index', compact('customer'));
		}		
	}
?>