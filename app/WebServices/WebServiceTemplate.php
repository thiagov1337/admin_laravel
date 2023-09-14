<?php

namespace App\WebServices;

use App\WebServices\Interfaces\WebServiceInterface;
use SoapClient;
use SoapFault;

class WebServiceTemplate implements WebServiceInterface
{
    private string $ip = '10.0.0.195:8080';
    private string $service;
    private SoapClient $client;

    public function callMethod($method, $params)
    {
        return $this->client->__soapCall($method, $params);
    }

    public function connect()
    {
        try {
            $this->client = new SoapClient('http://' . $this->ip . '/g5-senior-services/' . $this->service . '?wsdl', ['cache_wsdl' => WSDL_CACHE_NONE, 'trace' => 1]);
        } catch (SoapFault $e) {
            echo $e->getMessage();
        }
    }

    public function setService(string $service): void{
        $this->service = $service;
    }
}
