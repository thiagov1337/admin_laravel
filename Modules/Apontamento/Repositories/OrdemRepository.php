<?php

namespace Modules\Apontamento\Repositories;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrdemRepository
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = DB::connection('oracle')->table('E900COP');
    }

    public function comOperacaoPorCodigoRecurso(string $codigoRecurso): self
    {
        $this->builder->join('E900OOP', function ($join) {
            $join->on('E900OOP.CODEMP', '=', 'E900COP.CODEMP')
                ->on('E900OOP.CODORI', '=', 'E900COP.CODORI')
                ->on('E900OOP.NUMORP', '=', 'E900COP.NUMORP');
        })->where([
            'E900OOP.CODCRE' => $codigoRecurso,
            'E900OOP.USU_CMPAUX' => 'L' . $codigoRecurso,
            'E900OOP.DTRFIM' => '1900-12-31',
        ])->whereIn('E900COP.SITORP', ['A', 'L']);

        return $this;
    }

    public function comProduto(): self
    {
        $this->builder->join('E075PRO', 'E075PRO.CODPRO', '=', 'E900COP.CODPRO');
        return $this;
    }

    public function ordem(string $origem, int $ordem): self
    {
        $this->builder->where(['E900COP.CODORI' => $origem, 'E900COP.NUMORP' => $ordem]);
        return $this;
    }

    public function get(array $colunas = ['*']): Collection
    {
        return $this->builder->get($colunas);
    }

    public function first(array $colunas = ['*']): object
    {
        return $this->builder->first($colunas);
    }
}
