<?php

namespace App\Services\Home;

use App\Repositories\ClientsRepository;
use App\Repositories\ReceiptRepository;

class ChartService
{
    public function __construct(
        private ClientsRepository $clientsRepository,
        private ReceiptRepository $receiptRepository
    ) {
    }

    public function getClientsFromCountryCodes()
    {
        return $this->clientsRepository->getCountCountryCodes()->map(function ($client) {
            return [
                'id' => 'BR-' . $client->sigufs,
                'value' => (float) $client->qtdcli
            ];
        });
    }

    public function getSalesTarget()
    {
        $salesTarget = 150000000;
        $sales = $this->receiptRepository->getSumSales();
        $percentageTarget = min(($sales->vlrliq / $salesTarget) * 100, 100.00);
        $percentageTarget = number_format($percentageTarget, 2, '.', '');
        
        return ['value' => $percentageTarget];
    }
}
