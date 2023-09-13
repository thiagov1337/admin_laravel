<?php

namespace Modules\Apontamento\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Apontamento\Services\RetornaRepositoriesService;

class ApontamentoController extends Controller
{
    public function __construct(
        private RetornaRepositoriesService $retornaRepositories,
    )
    {}

    /**
     * @return Renderable
     */
    public function index(Request $request)
    {
        $resultadoRepositories = $this->retornaRepositories->executar($request->codigoRecurso);
        return view('apontamento::index', $resultadoRepositories);
    }


}
