<?php

namespace App\Services\Home;

use App\Repositories\ClientsRepository;

class ChartService
{
    public function __construct(private ClientsRepository $repository)
    {
    }

    public function getClientsToChart()
    {
        return $this->repository->getCountCountryCodes()->map(function ($client) {
            return [
                'id' => 'BR-' . $client->sigufs,
                'value' => (float) $client->qtdcli
            ];
        });
    }
}
