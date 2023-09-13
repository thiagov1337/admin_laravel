<?php

namespace Modules\Apontamento\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

class OrdemRepository
{
    private Connection $oracle;

    public function __construct()
    {
        $this->oracle = DB::connection('oracle');
    }

    public function ordensPorOperacao(string $codigoRecurso, array $colunas = ['*'])
    {
        return $this->oracle->table('E900COP')
            ->join('E900OOP', function ($join) {
                $join->on('E900OOP.CODEMP', '=', 'E900COP.CODEMP')
                     ->on('E900OOP.CODORI', '=', 'E900COP.CODORI')
                     ->on('E900OOP.NUMORP', '=', 'E900COP.NUMORP');
            })
            ->join('E075PRO', 'E900COP.CODPRO', '=', 'E075PRO.CODPRO')
            ->where('E900OOP.DTRFIM', '1900-12-31')
            ->whereRaw('E900OOP.QTDPRV > (E900OOP.QTDRE1 + E900OOP.QTDRFG)')
            ->whereIn('E900OOP.CODCRE', [$codigoRecurso])
            ->whereIn('E900COP.SITORP', ['A', 'L'])
            ->select($colunas)
            ->get();
    }
}
