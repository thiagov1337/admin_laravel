<?php

namespace App\Repositories;

use GenericRepository;
use Illuminate\Support\Facades\DB;

class ProductionOrders extends GenericRepository
{
    protected $oracle;

    public function __construct()
    {
        $this->oracle = DB::connection('oracle');
    }

    public function OrdersByOperation($idOperation)
    {
        return DB::table('E900COP')
            ->where('CodCre', $idOperation)
            ->get();
    }
}
