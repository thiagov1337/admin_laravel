<?php

namespace App\WebServices\Interfaces;

interface WebServiceInterface
{
    public function callMethod($method, $params);
    public function connect();
}
