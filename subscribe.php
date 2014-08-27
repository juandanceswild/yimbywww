<?php

    $apiKey = '562ec7d9e0d4631b6435f07dd59517ca-us7';
    $listId = 'd76c6a6290';
    $double_optin=false;
    $send_welcome=false;
    $email_type = 'html';
    $email = $_POST['email'];
    $submit_url = "http://us7.api.mailchimp.com/1.3/?method=listSubscribe";
    $data = array(
        'email_address'=>$email,
        'apikey'=>$apiKey,
        'id' => $listId,
        'double_optin' => $double_optin,
        'send_welcome' => $send_welcome,
        'email_type' => $email_type
    );
    $payload = json_encode($data);
     
    $ch = curl_init();
    # curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $submit_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

     
    $result = curl_exec($ch);
    curl_close ($ch);
    $data = json_decode($result);

    if ($data->error){
        echo $data->error;
    } else {
        echo "Got it, you've been added to our email list.";
    }
