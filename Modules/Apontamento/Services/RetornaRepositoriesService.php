<?php

namespace Modules\Apontamento\Services;

use Modules\Apontamento\Repositories\OperacaoRepository;
use Modules\Apontamento\Repositories\OrdemRepository;

class RetornaRepositoriesService
{
    public function __construct(
        private OrdemRepository $ordemRepository,
        private OperacaoRepository $operacaoRepository
    )
    {}

    public function executar(string $codigoRecurso): array{
        $resultado = [];

        $resultado['ordens'] = $this->ordemRepository->ordensPorOperacao($codigoRecurso,[
            'E900COP.NUMORP',
            'E900COP.CODORI',
            'E900COP.NUMPRI',
            'E900OOP.QTDPRV',
            'E075PRO.CODPRO',
            'E075PRO.DESPRO',
        ]);

        $resultado['operacao'] = $this->operacaoRepository->operacaoPorCodigoRecurso($codigoRecurso, [
            'CODCRE',
            'DESCRE'
        ]);

        return $resultado;
    }
}
