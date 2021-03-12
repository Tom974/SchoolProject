<?php
$webhookurl = "https://discord.com/api/webhooks/808681788070690857/u60AIeG-CbKelf770c-eyKBI09ZTG8QxG_tp0LmD6nHWU_F6wKfQkumeaUwxwH8Eo7Z3";
$timestamp = date("c", strtotime("now"));
$json_data = json_encode([
    "content" => "<@&811928992587972639>",
    // Username
    "username" => "Wiet Activiteit",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => " **WIET IS ACTIEF** :white_check_mark:",

            // Embed Type
            "type" => "rich",

            // URL of title link
            "url" => "https://tom974.dev/kalash",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "LIGHTBLUE" ),

            // Footer
            "footer" => [
                "text" => "Kalash Drugs",
                "icon_url" => "https://i.imgur.com/2SQCSBl.png"
            ],

        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );


?>