<?php
require('paypal/PaypalPro.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $payableAmount = isset($_POST['amount'])? $_POST['amount']: 10;
    $nameArray = explode(' ',$_POST['name_on_card']);

    //Buyer information
    $firstName = $nameArray[0];
    $lastName = $nameArray[1];
    $city = 'Colombo';
    $zipcode = '10400';
    $countryCode = 'US';

    //Create an instance of PaypalPro class
    $paypal = new PaypalPro;

	//Payment details
    $paypalParams = array(
        'paymentAction' => 'Sale',
        'amount' => $payableAmount,
        'currencyCode' => 'USD',
        'creditCardType' => $_POST['card_type'],
        'creditCardNumber' => trim(str_replace(" ","",$_POST['card_number'])),
        'expMonth' => $_POST['expiry_month'],
        'expYear' => $_POST['expiry_year'],
        'cvv' => $_POST['cvv'],
        'firstName' => $firstName,
        'lastName' => $lastName,
        'city' => $city,
        'zip'	=> $zipcode,
        'countryCode' => $countryCode,
    );
    $response = $paypal->paypalCall($paypalParams);
    $paymentStatus = strtoupper($response["ACK"]);

    if ($paymentStatus == "SUCCESS"){
		$data['status'] = 1;

        $transactionID = $response['TRANSACTIONID'];
        //Update order table with tansaction data & return the OrderID
        //SQL query goes here..........

        $data['orderID'] = isset($_POST['orderID'])? $_POST['orderID']: 3234;//$OrderID;

        $url = 'http://localhost:3000/sms';
        $data = array('Text' =>'Thank you Customer, You have $'.$payableAmount.' spent', 'phone' =>'+94719356519');
        $options = array(
          'http' => array(
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
          )
        );
        $contextss = stream_context_create($options);
        $result = file_get_contents($url, false, $contextss);
        if($result ===FALSE){
            $data['SMS_SENT'] = FALSE;
        }
        //var_dump($results);
		//echo $paymentStatus;
    }else{
         $data['status'] = 0;
    }

    echo json_encode($data);
}
?>
