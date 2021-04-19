<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\customers;
// use Srmklive\PayPal\Facades\PayPal as PayPalClient;
use App\Http\Controllers\AppBaseController;

class PayPalController extends AppBaseController

{
/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function payment($amount,$from_id,$type,$to_id)
{

 $data = [];
 $data['items'] = [
[
'name' => 'Aytam',
'price' => $amount,
'desc' => 'Aytam Application',
'qty' => 1
]
];

 $data['invoice_id'] = 1;
 $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
 $data['return_url'] = route('payment.success');
 $data['cancel_url'] = 'http://localhost:8000/cancel?amount='.$amount.'&from_id='.$from_id.'&type='.$type.'&to_id='.$to_id;
 $data['total'] = $amount;

 $data['f']=4;
 $provider = new ExpressCheckout;
 $response = $provider->setExpressCheckout($data);
 $response = $provider->setExpressCheckout($data, true);

$response['f']=4;
// dd($response);
return redirect($response['paypal_link']);
}

/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function cancel()
{
	// harag3 json w khlas
	return $this->sendError( 'Payment retrieved not successfully');
 dd('Your payment is canceled. You can create cancel page here.');
}

/**
 * Responds with a welcome message with instructions
 *
 * @return \Illuminate\Http\Response
 */

public function success(Request $request)
{
 $response = $provider->getExpressCheckoutDetails($request->token);

if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

		
$customers_from=customers::find($_GET['from_id']);
if (isset($_GET['to_id'])&&$_GET['to_id']>0) {
	$customers_to=customers::find($_GET['to_id']);
}


	$title='تبرع';
	if (app()->getLocale()=='ar') {
		$body=$customers_from->name . "نويت ان اكفلك وستصلك رسالة فور وصول
		المصاريف لحسابك";
	}
	else {
		$body= $customers_from->name . " did sported you, and the application will notify you whenever the transaction is done.";
	}

	$payment=\DB::table('payment')->insert([
		'amount' =>$_GET['amt'],
		'from_id' => $_GET['from_id'],
		'type'=>$_GET['type'],
		'to_id'=>$_GET['to_id'] >0 ?$_GET['to_id']: null,
		'currency_code' => $_GET['cc'],
		'payment_status' => $_GET['st'],
		'transaction_id'=> $_GET['tx'],
	]);
	if (isset($_GET['to_id'])&&$_GET['to_id']>0) {
	$this->firebase_notification($customers_to->id, $title, $body,null);
	}
	return $this->sendResponse($payment, 'Payment retrieved successfully');
	//insert
//  dd('Your payment was successfully. You can create success page here.');
}
return $this->sendError( 'Payment retrieved not successfully');

//  dd('Something is wrong.');
}
}