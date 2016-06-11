<?php

    // include the twilio php help library
    require("twilio/Services/Twilio.php");

    // Setup your credentials
    $account_sid = "AC7524f7b4ca6c9a50925a0d1a5f3a341b";
    $auth_token = "9b208a12c61f68b8e03c1bf8814207b5";

    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($account_sid, $auth_token);

    // the number that the sms will come from 
    $from_number = "+15125629111";

    // the number that will receive the sms
    $to_number = "+919738361083";

    // this is the sms that will be sent
    $sms_body = "Hey there :) here is an SMS from Santosh D !!";

    // boom, send the sms message
    $client->account->sms_messages->create(

        // who is the sms coming from
        $from_number, 

        // the number that is receiving the sms
        $to_number,

        // the sms body
        $sms_body
    );

?>