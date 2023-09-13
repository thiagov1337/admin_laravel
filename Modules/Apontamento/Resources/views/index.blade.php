@extends('apontamento::layouts.master', ['title' => $operacao->codcre . ' - '. $operacao->descre])

@section('content')
    <h1>{{$operacao->codcre}} - {{$operacao->descre}}</h1>
    <div class="card">
        <div class="card-header">
            Apontamento
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 pt-1 ">
                    <div class="row">
                        <div class="col-md-2">
                            <label for=""><strong>ORIGEM</strong></label>
                            <input type="text" class="form-control" id="CodOri" name="CodOri" required="" readonly="">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for=""><strong>OP</strong></label>
                            <input type="text" class="form-control" id="NumOrp" name="NumOrp" required="" readonly=""
                                   style="font-weight: bold;">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for=""><strong>APONTAR</strong></label>
                            <input type="number" min="0" class="form-control" id="QtdApo" name="QtdApo" value="0"
                                   required="" readonly="">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label for=""><strong>REFUGAR</strong></label>
                            <input type="number" min="0" class="form-control" id="QtdRfo" name="QtdRfo" value="0"
                                   required="" readonly="">
                        </div>
                        <div class="col-md-4 mb-1">
                            <label for=""><strong>MOTIVO REFUGO</strong></label>
                            <select class="form-control" name="MtvRfo" id="selectMtvRfo" onchange="selectRefugo()"
                                    disabled="">
                                <option selected="" value="0">NÃO REFUGAR</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for=""><strong>REALIZADOS</strong></label>
                            <input type="text" class="form-control" id="QtdRea" required="" readonly="">
                        </div>

                        <div class="col-md-3 mb-1">
                            <label for=""><strong>REFUGADOS</strong></label>
                            <input type="text" class="form-control" id="QtdRfg" readonly="">
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for=""><strong>PREVISTA</strong></label>
                            <input class="form-control" id="QtdPrv" value="0" readonly="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 border rounded-2 bg-opacity-10 bg-secondary">
                    <div class="row">
                        <select class="form-select" style="font-weight: bold;">
                            <option value="0" selected="true" disabled="">SELECIONE O OPERADOR</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card my-2">
                                <button type="button" class="btn btn-warning">
                                    APONTAR OP
                                </button>
                            </div>
                            <div class="card my-2">
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#modal">
                                    TROCA OPER.
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card my-2">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal">
                                    PAUSAR OP
                                </button>
                            </div>
                            <div class="card my-2">
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#modalFinalTurno">
                                    FINALIZAR TURNO
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <small id="totalTime" style="font-family: Consolas; font-weight: bold;">
                                Tempo Total: 27:12 (HH:MM)
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <tr class="text-center">
                    <th>Pri.</th>
                    <th>OP</th>
                    <th>Produto</th>
                    <th>Qtd. Prevista</th>
                </tr>
                </tbody>
                <tbody>
                @foreach($ordens as $ordem)
                    <tr class="text-center">
                        <th>{{$ordem->numpri}}</th>
                        <th><a class="text-decoration-none" href="#">{{$ordem->codori}} {{$ordem->numorp}}</a></th>
                        <td class="text-start"><strong>{{$ordem->codpro}}</strong> - {{$ordem->despro}}</td>
                        <td>{{$ordem->qtdprv}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
