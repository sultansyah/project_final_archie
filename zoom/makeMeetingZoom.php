<?php

use \Firebase\JWT\JWT;
use GuzzleHttp\Client;

define('ZOOM_API_KEY', 'aTGuqu11QFGX-UApBoUKOA');
define('ZOOM_SECRET_KEY', 'KHFELbDjAjkw2mKqgy3t1GeytrOKM03KKF7i');

function getZoomAccessToken()
{
    $key = ZOOM_SECRET_KEY;
    $payload = array(
        "iss" => ZOOM_API_KEY,
        'exp' => time() + 3600,
    );
    return JWT::encode($payload, $key);
}

function createZoomMeeting($topic, $date, $password, $duration)
{
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://api.zoom.us',
    ]);

    $response = $client->request('POST', '/v2/users/me/meetings', [
        "headers" => [
            "Authorization" => "Bearer " . getZoomAccessToken()
        ],
        'json' => [
            "topic" => $topic,
            "type" => 2,
            "start_time" => $date,
            "duration" => $duration, // minutes
            "password" => $password
        ],
    ]);

    $data = json_decode($response->getBody());
    return $data;
}