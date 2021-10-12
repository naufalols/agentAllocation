<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function curl_qiscus_auth()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://multichannel.qiscus.com/api/v1/auth',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => 'muh.naufal@hotmail.com','password' => 'inipassword'),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}
