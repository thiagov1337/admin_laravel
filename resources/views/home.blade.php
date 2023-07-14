@extends('layouts.home.app')

@section('content')
    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="icon-box">
                        <img height="55" src="http://interno.marispan.com/assets/img/ICONE MISSÃO.png" class="mx-auto d-block">
                        <h3>Missão</h3>
                        <p>Desenvolver soluções e produzir implementos agrícolas para aumentar a produtividade no campo.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box">
                        <img height="55" src="http://interno.marispan.com/assets/img/ICONE VISÃO.png" class="mx-auto d-block">
                        <h3>Visão</h3>
                        <p>Ser uma empresa reconhecida nacionalmente por oferecer as melhores soluções para o
                            agronegócio.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon-box">
                        <img height="55" src="http://interno.marispan.com/assets/img/ICONE VALORES.png" class="mx-auto d-block">
                        <h3>Valores</h3>
                        <ul>
                            <li>
                                <p>Etíca.</p>
                            </li>
                            <li>
                                <p>Foco no cliente.</p>
                            </li>
                            <li>
                                <p>Evolução constante com excelência e qualidade.</p>
                            </li>
                            <li>
                                <p> Segurança e desenvolvimento para as pessoas.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container ">
            <div class="row">
                <div class="col-lg-7">
                    <div id="mapdiv" style="width: 100%; height: 400px"></div>
                </div>

                <div class="col-lg-5 pt-4 pt-lg-0 content">
                    <h3>Clientes por Estado.</h3>
                    <p class="fst-italic">
                        Veja em quais estados a marispan atua.
                    </p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-6">
                    <div id="gaugediv" style="width: 100%; height: 350px"></div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>Nossa meta para 2023!</h3>
                    <p class="fst-italic">
                        Ajude a Marispan a atingir a meta anual de vendas.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i>Muito Baixo</li>
                        <li><i class="bi bi-check-circle"></i>Baixo</li>
                        <li><i class="bi bi-circle"></i>Médio</li>
                        <li><i class="bi bi-circle"></i>Bom</li>
                        <li><i class="bi bi-circle"></i>Excelente</li>
                    </ul>

                </div>
            </div>
            <hr>

            <div class="row" style="display: none;">
                <div class="col-lg-12 content">
                    <h3>Vendas de Hoje</h3>
                    <div id="chartdiv" style="width: 100%; height: 300px"></div>
                </div>
            </div>
            <!-- <hr> -->
    </section><!-- End About Section -->

    <section id="clients" class="clients">
        <div class="container">
            <div class="section-title">
                <h2>Trajetória</h2>
                <p>Você já conhece a nossa historia?</p>
                <img src="http://interno.marispan.com/assets/img/cronologia.jpg" class="img-fluid">
            </div>
        </div>
    </section>
@endsection
