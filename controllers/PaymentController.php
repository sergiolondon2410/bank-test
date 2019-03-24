<?php
	require_once "models/Payment.php";
	require_once "models/Customer.php";

	class PaymentController
	{
		private $model;
		private $customer_model;

		public function __construct()
		{
			$this->model = Payment::singletonPayment();
			$this->customer_model = Customer::singletonCustomer();
		}

		public function storeAction($customer)
		{
			$send_array = [
				'customerId' => $customer,
				'iban' => $_POST['iban'],
				'owner' => $_POST['account_owner']
			];
			
			$payment = $this->model->createPayment($send_array);

			$response_str = $this->api_call(json_encode($send_array));
			$response = json_decode($response_str, true);

			if(isset($response['error'])){
				$success = $this->customer_model->updateCustomerSuccess([
					'success' => 'false',
					'id' => $customer
				]);

				$output = ['success' => false,'message' => 'The payment was not successfully, please try it again'];
			}
			else{
				$payment_update = $this->model->updatePaymentData([
					'payment_data_id' => $response['paymentDataId'],
					'id' => $payment
				]);

				$success = $this->customer_model->updateCustomerSuccess([
					'success' => 'true',
					'id' => $customer
				]);

				$output = ['success' => true,'message' => $response['paymentDataId']];
			}

			return new View('payments','success', $output);
		}

		public function api_call($data)
		{
			$url = 'https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data';
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
			));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

			$result = curl_exec($curl);
			if(!$result) die("Connection Failure");
			curl_close($curl);
			return $result;
		}

	}