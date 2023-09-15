<?php

namespace Modules\Apontamento\Repositories;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class OperacaoRepository
{
    private Builder $builder;

    public function __construct()
    {
        $this->builder = DB::connection('oracle')->table('E725CRE');
    }

    public function porCodigoRecurso(string $codigoRecurso): self
    {
        $this->builder->where('CODCRE', $codigoRecurso);
        return $this;
    }

    public function first(array $colunas = ['*']): object
    {
        return $this->builder->first($colunas);
    }

}
