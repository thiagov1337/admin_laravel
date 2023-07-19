<?php

namespace App\Repositories;

use GenericRepository;
use Illuminate\Support\Facades\DB;

class ProductionOrders extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('E900COP');
    }

    public function OrdersByOperation($status)
    {
        return DB::table('pedidos')
            ->where('status', $status)
            ->get();
    }
}
