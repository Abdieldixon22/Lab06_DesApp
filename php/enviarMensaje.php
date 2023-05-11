<?php
    $token = "63d5c7a8cb0b49998ab3f3a7e2ccead6e241292452a040049e";
    $instance = "1101818596";
    $url = 'https://api.green-api.com/waInstance'.$instance.'/SendMessage/'.$token;
    $data = [
        "chatId" => "51".$telefono."@c.us",
        "message" => $mensaje
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
?> 
