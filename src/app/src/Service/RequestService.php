<?php

namespace App\Service;

class RequestService
{
    /**
     * @param  string $method
     * @param  string $url
     * @param \JsonSerializable|null $content
     * @param array $header
     * @return \Response
     * $headers = [ 'Accept: application/json', ];
     * @throws \RuntimeException
     */
    public static function SendRequest(string $method, string $url, \JsonSerializable $content = null, array $headers = null)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        switch ($method) {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }

        if ($content !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($content));

            $headers[] = 'Content-Type: application/json';
        } else {
            $headers[] = 'Content-Length: 0';
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response   = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $message = sprintf('cURL error[%s]: %s', curl_errno($curl), curl_error($curl));
            throw new \RuntimeException($message);
        }

        curl_close($curl);

        return new RequestResponse($statusCode, $response);
    }
}
