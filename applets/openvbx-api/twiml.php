<?php
 
// The response object constructs the TwiML for our applet
$response = new TwimlResponse;
 
//make an API call to the URL specified

$url = AppletInstance::getValue('promp-text');

$calldata = array(
  "callfrom" => normalize_phone_to_E164($_REQUEST['From']),
  "callto" => normalize_phone_to_E164($_REQUEST['To']),
  "direction" => ($_REQUEST['Direction'])
);

$calldata = json_encode($calldata);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://ec2-54-245-55-217.us-west-2.compute.amazonaws.com/calls');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $calldata);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_exec($curl);
curl_close($curl);

// $primary is getting the url created by what ever applet was put 
// into the primary dropzone
$primary = AppletInstance::getDropZoneUrl('primary');
 
// As long as the primary dropzone is not empty add the redirect 
// twiml to $response
if(!empty($primary)) {
    $response->redirect($primary);
}
 
// This will create the twiml for hellomonkey
$response->respond();
