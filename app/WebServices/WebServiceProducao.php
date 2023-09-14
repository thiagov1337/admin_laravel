<?php

namespace App\WebServices;

class WebServiceProducao extends WebServiceTemplate
{
    public function __construct()
    {
        $this->setService('sapiens_Synccom_senior_g5_co_mrsp_ws');
    }
}
