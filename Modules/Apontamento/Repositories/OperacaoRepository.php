<?php

namespace Modules\Apontamento\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

class OperacaoRepository
{
    private Connection $oracle;

    public function __construct()
    {
        $this->oracle = DB::connection('oracle');
    }

    public function operacaoPorCodigoRecurso(string $codigoRecurso, array $colunas = ['*'])
    {
        return $this->oracle->table('E725CRE')
            ->where('CODCRE', $codigoRecurso)
            ->select($colunas)
            ->first();
    }
}
