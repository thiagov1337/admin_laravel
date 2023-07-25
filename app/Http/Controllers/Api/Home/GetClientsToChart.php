<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\ChartService;
use Illuminate\Http\Request;

class GetClientsToChart extends Controller
{
    public function __construct(private ChartService $service)
    {
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json($this->service->getClientsToChart());
    }
}
