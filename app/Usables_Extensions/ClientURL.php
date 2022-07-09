<?php

namespace App\Usables_Extensions;
use GuzzleHttp\Client;
trait ClientURL
{   
    public final function getGuzzleRequest(string $url, &$issucsess = true)
    {
        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'http_errors' => false
        ]);
        return $response->getBody();
    }
    public function RequestURL(string $url = '', bool $requesttype, array $headers = [], $jsonencodefields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $requesttype);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonencodefields);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
