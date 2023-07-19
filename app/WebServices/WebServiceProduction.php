<?php

namespace App\WebServices;

use App\WebServices\Interfaces\WebServiceInterface;

use SoapClient;
use SoapFault;

class WebServiceProduction implements WebServiceInterface
{
    private $ip = '10.0.0.195:8080';
    private $service = 'sapiens_Synccom_senior_g5_co_mrsp_ws';
    private $client;

    public function callMethod($method, $params)
    {
        return $this->client->__soapCall($method, $params);
    }

    public function connect()
    {
        try {
            $this->client = new SoapClient('http://' . $this->ip . '/g5-senior-services/' . $this->service . '?wsdl', ['cache_wsdl' => WSDL_CACHE_NONE, 'trace' => 1]);
        } catch (SoapFault $e) {
            echo 'Falha ao conectar: $' . $e->getMessage();
        }
    }
}
