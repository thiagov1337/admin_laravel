<?php

namespace App\Repositories;

use GenericRepository;
use Illuminate\Support\Facades\DB;

class ClientsRepository //extends GenericRepository
{
    protected $oracle;

    public function __construct()
    {
        $this->oracle = DB::connection('oracle');
    }

    public function getCountCountryCodes()
    {
        return $this->oracle->table('E085CLI')
            ->select(DB::raw('COUNT(CodCli) as QTDCLI, SIGUFS'))
            ->where('SITCLI', '=', 'A')
            ->where('SIGUFS', '<>', 'EX')
            ->groupBy('SIGUFS')
            ->orderByDesc('QTDCLI')
            ->get();
    }
}
