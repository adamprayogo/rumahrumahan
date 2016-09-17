<?php
/*
application/controllers/payments.php
*/
use Omnipay\Omnipay;
class payments extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
	}

    function index(){

    }

	function checkout(){
		$paypal_settings=getSettings(PAYPAL_FILE);
		$gateway = Omnipay::create('PayPal_Express');

		$gateway->setUsername($paypal_settings['username']);
		$gateway->setPassword($paypal_settings['pwd']);
		$gateway->setSignature($paypal_settings['signature']);
		if($paypal_settings['is_test']=='true'){
			$gateway->setTestMode('true');
		}

		$desc=$this->input->post('title');
		$amount=$this->input->post('price');
		$payment_params=array(
			'amount' => $amount.'.00', 
			'quantity' =>'1',
			'currency' => 'USD',
			'description'=>$desc,
			'return_url' =>base_url().'payments/complete',
			'cancel_url' =>base_url().'payments/cancel_payment'
			);

		$packages_info=array(
			'max_post'=>$this->input->post('max_post'),
			'expr_time'=>$this->input->post('expr_time')
			);
		$_SESSION['packages_info']=$packages_info;
		$_SESSION['payment_params']=$payment_params;
		$response = $gateway->purchase($payment_params)->send();
		$response->redirect();
	}

	function complete(){
		$user=$_SESSION['user'];
		$gateway = Omnipay::create('PayPal_Express');
		$gateway->setUsername($paypal_settings['username']);
		$gateway->setPassword($paypal_settings['pwd']);
		$gateway->setSignature($paypal_settings['signature']);
		if($paypal_settings['is_test']=='true'){
			$gateway->setTestMode('true');
		}
		$payment_params=$_SESSION['payment_params'];
		$response = $gateway->completePurchase(
			$payment_params
			)->send();
		$paypalResponse = $response->getData();
		if(isset($paypalResponse['PAYMENTINFO_0_ACK']) && $paypalResponse['PAYMENTINFO_0_ACK'] === 'Success'){ 
			//update info here
			$packages_info=$_SESSION['packages_info'];
			$this->load->model('users_model');
			$data['max_post']=$user[0]->max_post+$packages_info['max_post'];
			$data['expr_time']=date('Y-m-d',strtotime($user[0]->expr_time. "+".$packages_info['expr_time']." days"));
			$user[0]->expr_time=$data['expr_time'];
			$_SESSION['user']=$user;
			$this->users_model->update($data, array('id'=>$user[0]->id));
		}
	}

	function cancel_payment(){
		echo 'you have choice cancel payment';
	}

}
?>