@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Gastos del viaje {{ $viaje->id }} - {{ $viaje->destino }} Operador: {{ $viaje->operador->nombre ?? '' }}<a class="btn btn-default float-right"
                    href="{{ URL::previous() }}">
                    Regresar
                </a></h3>
        </div>
        @php
            
            $suma_casetas_efe = $viaje->casetas->where('tag', '0')->sum('monto');
            $suma_casetas_tag = $viaje->casetas->where('tag', '1')->sum('monto');
            
            $suma_combustible_convenio = $viaje->combustibles->where('convenio', '1')->sum('monto');
            $suma_combustible_efectivo = $viaje->combustibles->where('convenio', '0')->sum('monto');
            $suma_gastos = $viaje->gastos()->sum('monto');
            $salario_operador = $viaje->monto_pagado;
            
            $suma_anticipos = $viaje->anticipos->sum('monto');
            $saldo_operador = $suma_anticipos - ($suma_casetas_efe + $suma_combustible_efectivo + $suma_gastos);
            
            $km_anterior = 0;
            
        @endphp
        <!-- <div class="card-body">
                

                    <div class="m-t-25">-->
        <div class="accordion" id="accordion-default">


            <!-- ABRO SUMATORIA-->
            <div class="card card_compacto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Total gastos</th>

                                    <th scope="col">Anticipo</th>
                                    @if ($saldo_operador > 0)
                                        <th scope="col">Por Devolver</th>
                                    @else
                                        <th scope="col">A Favor</th>
                                    @endif

                                    <th scope="col">Salario a Operador</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-primary" scope="row" style="font-weight: normal;">@money(
                                        $suma_casetas_efe +
                                        $suma_casetas_tag +
                                        $suma_combustible_convenio +
                                        $suma_combustible_efectivo +
                                        $suma_gastos
                                        )
                                    </th>

                                    <td class="text-primary">@money($suma_anticipos)</td>
                                    @if ($saldo_operador > 0)
                                        <td class="saldo_verde" style="color:#fa600d; font-weight: bolder;">
                                            @money($saldo_operador)</td>
                                    @else
                                        <td class="saldo_verde" style="color:#39990e; font-weight: bolder;">
                                            @money(abs($saldo_operador))</td>
                                    @endif
                                    <td class="text-primary">@money($salario_operador)</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- CIERRO SUMATORIA-->


            <!-- ABRO TARJETON COMBUSTIBLE-->
            <div class="card card_compacto">
                <div class="card-header">
                    <h5 class="card-title"><a class="collapsed" data-toggle="collapse" href="#menu_1">
                            Combustible <span
                                class="text-primary">@money($suma_combustible_convenio+$suma_combustible_efectivo)</span>
                            <span style="">(Por convenio=</span><!-- <span style="color:#fa600d;"> -->
                            @money($suma_combustible_convenio)<span style="" ;="" text-transform:="">|| En efectivo=</span>
                            @money($suma_combustible_efectivo)<span style="color:#949494;">)</span></a></h5>
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
                                        <th scope="col">Rendimiento</th>
                                        <th scope="col">Convenio</th>
                                        <th scope="col">Tablero Inicial</th>
                                        <th scope="col">Bomba Inicial</th>
                                        <th scope="col">Bomba Final</th>
                                        <th scope="col">Tablero Final</th>
                                        <th scope="col">Ticket</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($viaje->combustibles as $combustible)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>@money($combustible->monto)</td>
                                            <td>{{ $combustible->km }}</td>
                                            <td>{{ $combustible->litros }}</td>
                                            <td>
                                                @if (($km_anterior != 0) && ($combustible->litros !=0))
                                                    {{ round(($combustible->km - $km_anterior) / $combustible->litros, 2) }}
                                                @else
                                                    -
                                                @endif
                                                @php
                                                    $km_anterior = $combustible->km;
                                                @endphp

                                            </td>
                                            @if ($combustible->convenio)
                                                <td><span style="color:#fa600d; font-weight: bolder;"> - Por Convenio -
                                                    </span>
                                                </td>
                                            @else
                                                <td><span style="color:#39990e; font-weight: bolder;"> - Efectivo -</span>
                                                </td>
                                            @endif
                                            @for ($i = 1; $i < 6; $i++)
                                                <td>
                                                    @if ($combustible['foto' . $i . '_url'])
                                                        <a href="{{ url('storage' . $combustible['foto' . $i . '_url']) }}"
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
            <div class="card card_compacto">
                <div class="card-header">
                    <h5 class="card-title"> <a class="collapsed" data-toggle="collapse" href="#menu_2">
                            Casetas <span class="text-primary">@money($suma_casetas_tag+$suma_casetas_efe)</span>
                            <span style="">(Con tag=</span><!-- <span style="color:#fa600d;"> -->
                            @money($suma_casetas_tag)<span style="" ;="" text-transform:="">|| En efectivo=</span>
                            @money($suma_casetas_efe)<span style="color:#949494;">)</span>
                        </a> </h5>
                </div>
                <div id="menu_2" class="collapse" data-parent="#accordion-default" style="">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Convenio</th>
                                        <th scope="col">Lugar</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viaje->casetas as $caseta)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $caseta->monto }}</td>
                                            @if ($caseta->tag)
                                                <td><span style="color:#fa600d; font-weight: bolder;"> - Con Tag - </span>
                                                </td>
                                            @else
                                                <td><span style="color:#39990e; font-weight: bolder;"> - Efectivo -</span>
                                                </td>
                                            @endif
                                            <td>{{ $caseta->lugar }}</td>
                                            <td>
                                                @if ($caseta['foto_url'])
                                                    <a href="{{ url('storage' . $caseta['foto_url']) }}" target="_blank">
                                                        <i class="far fa-image"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                            <td>{{ $caseta->observaciones }} </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @foreach (App\Models\Viaje::GASTOS_OTROS as $key => $item)
                <!-- ABRO TARJETON Gastos-->
                <div class="card card_compacto">
                    <div class="card-header">
                        <h5 class="card-title"><a class="collapsed" data-toggle="collapse"
                                href="#menu_{{ $loop->iteration + 2 }}"> {{ $item }}
                                <span
                                    class="text-primary">@money($viaje->gastos()->where('tipo',$key)->sum('monto'))</span>
                            </a></h5>
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
                                        @foreach ($viaje->gastos->where('tipo', $key) as $gasto)
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
            <div class="card card_compacto">
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
                                    @foreach ($viaje->anticipos as $anticipo)
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

            <div class="card card_compacto">
                <div class="card-header">
                    <h5 class="card-title"><a class="collapsed" data-toggle="collapse" href="#menu_facturas">
                            Facturas </a></h5>
                </div>
                <div id="menu_facturas" class="collapse" data-parent="#accordion-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viaje->entregas as $entrega)
                                        <tr>
                                            
                                            <td>{{ $entrega->cliente->razon_social ?? '' }}</td>

                                        <tr>
                                            <td colspan="4">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Numero de Factura</th>
                                                            <th scope="col">Evidencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($entrega->facturas as $factura)
                                                            <tr>
                                                                <th scope="row">{{ $factura->id }}</th>
                                                                <td>{{ $factura->numero_factura }}</td>
                                                                <td>
                                                                    @if ($factura['foto_url'])
                                                                        <a href="{{ url('storage' . $factura['foto_url']) }}"
                                                                            target="_blank">
                                                                            <i class="far fa-image"></i>
                                                                        </a>
                                                                    @else
                                                                        <i class="fas fa-times"></i>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>            
                        </div>
                    </div>
                </div>
            </div>

            <!-- CIERRO TARJETON Gastos-->

        </div>
    </div>

    <div class="form-group">
        <a class="btn btn-default" href="{{ route('admin.viajes.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>

    <!-- </div>
        </div>  -->
@endsection
