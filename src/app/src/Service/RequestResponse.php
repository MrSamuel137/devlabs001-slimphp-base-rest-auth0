<?php

namespace App\Service;

class RequestResponse
{
    private $httpStatusCode;
    private $responseBody;

    public function __construct($httpStatusCode, $responseBody)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->responseBody = $responseBody;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
