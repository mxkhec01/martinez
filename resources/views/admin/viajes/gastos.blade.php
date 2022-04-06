@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Gastos de viaje
    </div>
    @php

    $suma_casetas = $viaje->casetas->sum('monto');
    $suma_combustible_convenio = $viaje->combustibles->where('convenio','1')->sum('monto');
    $suma_combustible_efectivo = $viaje->combustibles->where('convenio','0')->sum('monto');
    $salario_operador = $viaje->monto_pagado;

    $suma_anticipos = $viaje->anticipos->sum('monto');


    @endphp
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ URL::previous() }}">
                    Regresar
                </a>
            </div>

            <div class="m-t-25">
                <div class="accordion" id="accordion-default">


                    <!-- ABRO SUMATORIA-->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Total gastos</th>
                                        <th scope="col">Combustible por convenio</th>
                                        <th scope="col">Anticipo</th>
                                        <th scope="col">A Favor</th>
                                        <th scope="col">Salario a Operador</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="text-primary" scope="row" style="font-weight: normal;">$ 13,179.13
                                        </th>
                                        <td class="text-primary">@money($suma_combustible_convenio)</td>
                                        <td class="text-primary">@money($suma_anticipos)</td>
                                        <td class="saldo_verde">$ 3,393.48</td>
                                        <td class="text-primary">@money($salario_operador)</td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- CIERRO SUMATORIA-->


                    <!-- ABRO TARJETON COMBUSTIBLE-->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><a class="collapsed" data-toggle="collapse" href="#menu_1">
                                    Combustible <span class="text-primary">@money($suma_combustible_convenio+$suma_combustible_efectivo)</span>
                                    <span style="">(Por convenio=</span><!-- <span style="color:#fa600d;"> -->
                                    @money($suma_combustible_convenio)<span style="" ;="" text-transform:="">|| En efectivo=</span>
                                    <!-- <span style="color:#39990e;"> -->@money($suma_combustible_efectivo)<span
                                        style="color:#949494;">)</span></a></h5>
                        </div>
                        <!-- <div id="menu_1" class="collapse show" data-parent="#accordion-default"> -->
                        <div id="menu_1" class="collapse" data-parent="#accordion-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Km</th>
                                            <th scope="col">Litros</th>
                                            <th scope="col">Convenio</th>
                                            <th scope="col">Tablero Inicial</th>
                                            <th scope="col">Bomba Inicial</th>
                                            <th scope="col">Bomba Final</th>
                                            <th scope="col">Tablero Final</th>
                                            <th scope="col">Ticket</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($viaje->combustibles as $combustible)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>@money($combustible->monto)</td>
                                            <td>{{ $combustible->km }}</td>
                                            <td>{{ $combustible->litros }}</td>
                                            @if($combustible->convenio)
                                            <td><span
                                                    style="color:#fa600d; font-weight: bolder;"> - Por Convenio - </span>
                                            </td>
                                            @else
                                            <td><span style="color:#39990e; font-weight: bolder;"> - Efectivo -</span>
                                            </td>
                                            @endif
                                            @for ($i = 1; $i <6 ; $i++)
                                            <td>
                                                @if($combustible['foto'.$i.'_url'])
                                                <a href="{{ url('storage'.$combustible['foto'.$i.'_url']) }}"
                                                   target="_blank">
                                                    <i class="far fa-image"></i>
                                                </a>
                                                @else
                                                <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            @endfor

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CIERRO TARJETON COMBUSTIBLE-->
                    <!-- ABRO TARJETON CASETAS-->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"> <a class="collapsed" data-toggle="collapse" href="#menu_2" > Casetas <span class="text-primary">@money($suma_casetas)</span> </a> </h5>
                        </div>
                        <div id="menu_2" class="collapse" data-parent="#accordion-default" style="">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Lugar</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Observaciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($viaje->casetas as $caseta)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $caseta->monto }}</td>
                                            <td>{{ $caseta->lugar }}</td>
                                            <td> @if($caseta['foto_url'])
                                                <a href="{{ url('storage'.$caseta['foto_url']) }}"
                                                   target="_blank">
                                                    <i class="far fa-image"></i>
                                                </a>
                                                @else
                                                <i class="fas fa-times"></i>
                                                @endif</td>
                                            <td>{{ $caseta->observaciones }} </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach(App\Models\Viaje::GASTOS_OTROS as $key => $item)
                    <!-- ABRO TARJETON Gastos-->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><a class="collapsed" data-toggle="collapse" href="#menu_{{ $loop->iteration +2 }}"> {{ $item }}
                                    <span class="text-primary">@money($viaje->gastos()->where('tipo',$key)->sum('monto'))</span> </a></h5>
                        </div>
                        <div id="menu_{{ $loop->iteration + 2 }}" class="collapse" data-parent="#accordion-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Observaciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($viaje->gastos->where('tipo',$key) as $gasto)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>@money($gasto->monto)</td>
                                            <td>{{ $gasto->observaciones }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- CIERRO TARJETON Gastos-->



                    <!-- ABRO TARJETON ANTICIPOS-->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><a class="collapsed" data-toggle="collapse" href="#menu_8"> Anticipos
                                   <span class="text-primary">@money($suma_anticipos)</span> </a></h5>
                        </div>
                        <div id="menu_8" class="collapse" data-parent="#accordion-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Fecha</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($viaje->anticipos as $anticipo)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>@money($anticipo->monto)</td>
                                            <td>{{ $anticipo->descripcion }} </td>
                                            <td>{{ $anticipo->fecha }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CIERRO TARJETON ANTICIPOS-->

                </div>
            </div>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.viajes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
