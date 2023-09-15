<?php

namespace Modules\Apontamento\Services;

use Modules\Apontamento\Repositories\OperacaoRepository;
use Modules\Apontamento\Repositories\OperadorRepository;
use Modules\Apontamento\Repositories\OrdemRepository;

class RetornaRepositoriesService
{
    public function __construct(
        private OrdemRepository $ordemRepository,
        private OperacaoRepository $operacaoRepository,
        private OperadorRepository $operadorRepository,
    )
    {}

    public function executar(string $codigoRecurso): array{
        $resultado = [];

        $resultado['ordens'] = $this->ordemRepository
            ->comProduto()
            ->comOperacaoPorCodigoRecurso($codigoRecurso)
            ->get([
                'E900COP.NUMORP',
                'E900COP.CODORI',
                'E900COP.NUMPRI',
                'E900OOP.QTDPRV',
                'E075PRO.CODPRO',
                'E075PRO.DESPRO',
            ]);

        $resultado['operacao'] = $this->operacaoRepository
            ->porCodigoRecurso($codigoRecurso)
            ->first([
                'CODCRE',
                'DESCRE'
            ]);

        $resultado['operadores'] = $this->operadorRepository
            ->porCodigoRecurso($codigoRecurso)
            ->get([
                'E906OPE.NUMCAD',
                'E906OPE.NOMOPE'
            ]);

        return $resultado;
    }
}
