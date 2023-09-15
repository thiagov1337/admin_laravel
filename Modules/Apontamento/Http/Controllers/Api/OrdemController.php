<?php

namespace Modules\Apontamento\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apontamento\Repositories\OrdemRepository;

class OrdemController extends Controller
{
    public function __construct(private OrdemRepository $repository)
    {
    }

    public function getOrdemComOperacao(Request $request): JsonResponse
    {
        $ordem = $this->repository->ordem($request->origem, $request->ordem)
            ->comOperacaoPorCodigoRecurso($request->codigoRecurso)
            ->first([
                'E900COP.CODORI',
                'E900COP.NUMORP',
                'E900OOP.SEQROT',
                'E900OOP.QTDPRV',
                'E900OOP.QTDRE1',
                'E900OOP.QTDRFG'
            ]);

        return response()->json($ordem);
    }
}
