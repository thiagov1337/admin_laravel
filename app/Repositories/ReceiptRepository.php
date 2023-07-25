<?php

namespace App\Repositories;

use GenericRepository;
use Illuminate\Support\Facades\DB;

class ReceiptRepository //extends GenericRepository
{
    protected $oracle;

    public function __construct()
    {
        $this->oracle = DB::connection('oracle');
    }

    public function getSumSales()
    {
        return $this->oracle->table('E140NFV')
            ->join('E001TNS', 'E140NFV.TNSPRO', '=', 'E001TNS.CodTns')
            ->select(DB::raw("To_Char(E140NFV.DATEMI,'YYYY') as DATEMI, round(Sum(E140NFV.VLRLIQ)) as VLRLIQ"))
            ->where('E001TNS.VENFAT', '=', 'S')
            ->where(DB::raw("to_char(E140NFV.DATEMI,'YYYY')"), '=', date('Y'))
            ->groupBy(DB::raw("To_Char(E140NFV.DATEMI,'YYYY')"))
            ->orderByRaw("DATEMI")
            ->first();
    }
}
