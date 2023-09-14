<?php

namespace App\WebServices;

use App\WebServices\Interfaces\WebServiceInterface;

class WebService
{
    public function __construct(private WebServiceInterface $webService)
    {
        $this->webService->connect();
    }

    public function send($method, $paramns)
    {
        $this->webService->callMethod($method, ['user', 'pass', 0, $paramns]);
    }

}
