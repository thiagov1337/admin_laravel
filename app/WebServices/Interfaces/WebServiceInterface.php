<?php

namespace App\WebServices\Interfaces;

interface WebServiceInterface
{
    public function callMethod(string $method, array $params);
    public function connect();
    public function setService(string $service): void;

}
