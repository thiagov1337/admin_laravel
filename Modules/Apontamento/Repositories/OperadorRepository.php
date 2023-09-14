<?php

namespace Modules\Apontamento\Repositories;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

class OperadorRepository
{
    private Connection $oracle;
    private Builder $builder;

    public function __construct()
    {
        $this->builder = DB::connection('oracle')->table('E906OPE');
    }


    public function get(array $colunas = ['*']): Collection
    {
        return $this->builder->get($colunas);
    }

    public function porCodigoRecurso(string $codigoRecurso): self
    {
        $this->builder->join('USU_T900OCR', 'USU_T900OCR.USU_NUMCAD', '=', 'E906OPE.NUMCAD')
            ->where([
                'USU_T900OCR.USU_CODCRE' => $codigoRecurso,
                'USU_T900OCR.USU_SITOPR' => 'A'
            ]);

        return $this;
    }
}
