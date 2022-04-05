@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                        @can('viaje_create')
                    {{-- <div style="margin-bottom: 10px;" class="row">
                            <div class="col-lg-12"> --}}
                                <a class="btn btn-success float-right" href="{{ route('admin.viajes.create') }}">
                                    {{ trans('global.add') }} Viaje
                                </a>
                            {{-- </div>
                        </div> --}}
                        @endcan
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @forelse ($viajesEstatus as $y)
                                <div class="col-sm-6 col-lg-3">
                                    <div @class([
                                        'card',
                                        'text-white',                                        
                                        App\Models\Viaje::ESTADO_BACKGROUND[$y->estado] ?? '',
                                        'mb-3',
                                    ]) style="max-width: 18rem;">
                                        <div @class(['card-header', App\Models\Viaje::ESTADO_BACKGROUND[$y->estado] ?? '', ])>
                                            <h2 class="card-text text-left">{{ $y->numero ?? '' }}
                                                <a href="{{ route('admin.viajes.mostrar',['valor' => $y->estado]) }}" class="btn float-right text-white">Lista</a>
                                            </h2>
                                        </div>
                                        <div class="card-body align-items-center d-flex justify-content-center">
                                            <h1 class="text-center">
                                                {{ App\Models\Viaje::ESTADO_SELECT[$y->estado] ?? '' }}</h1>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p> No hay viajes definidos en el sistema </p>
                            @endforelse

                            <!-- /.col-->
                        </div>
                        <!-- /.row-->

                        <div class="row pb-4 mt-2">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="table-title mb-4">
                                    <h3>{{ $settings1['chart_title'] }}</h3>
                                </div>
                                {{-- Widget - latest entries --}}
                                <div class="col-12"  style="overflow-x: auto; height: 20rem; overflow-y: auto" >
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @foreach ($settings1['fields'] as $key => $value)
                                                    <th>
                                                        {{ trans(sprintf('cruds.%s.fields.%s', $settings1['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($settings1['data'] as $entry)
                                                <tr>
                                                    @foreach ($settings1['fields'] as $key => $value)
                                                        <td>
                                                            @if ($value === '')
                                                                {{ $entry->{$key} }}
                                                            @elseif(is_iterable($entry->{$key}))
                                                                @foreach ($entry->{$key} as $subEentry)
                                                                    <span
                                                                        class="label label-info">{{ $subEentry->{$value} }}</span>
                                                                @endforeach
                                                            @else
                                                                {{ data_get($entry, $key . '.' . $value) }}
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ count($settings1['fields']) }}">
                                                        {{ __('No entries found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="table-title mb-4">
                                    <h3>{{ $settings2['chart_title'] }}</h3>
                                </div>
                                <div class="col-12" style="overflow-x: auto; height: 20rem; overflow-y: auto">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @foreach ($settings2['fields'] as $key => $value)
                                                    <th>
                                                        {{ trans(sprintf('cruds.%s.fields.%s', $settings2['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($settings2['data'] as $entry)
                                                <tr>
                                                    @foreach ($settings2['fields'] as $key => $value)
                                                        <td>
                                                            @if ($value === '')
                                                                {{ $entry->{$key} }}
                                                            @elseif(is_iterable($entry->{$key}))
                                                                @foreach ($entry->{$key} as $subEentry)
                                                                    <span
                                                                        class="label label-info">{{ $subEentry->{$value} }}</span>
                                                                @endforeach
                                                            @else
                                                                {{ data_get($entry, $key . '.' . $value) }}
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ count($settings2['fields']) }}">
                                                        {{ __('No entries found') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>{{-- fin del row --}}
                        <div class="row pb-4" >
                            <div class="col-md-6" >
                                <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand"></div>
                                <div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="canvas-1" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- <div class="col-md-6" style="padding-right: 10px;">
                                <div class="card">
                                    <div class="card-header">Pagos últimos 21 días
                                    <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                                        <small class="text-muted">docs</small></a></div>
                                    </div>
                                    <div class="card-body">
                                    
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="c-chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="canvas-2" class="chartjs-render-monitor"></canvas>
                                </div>
                            <!-- <div class="card">
                                <div class="card-header">Uso unidades últimas 3 semanas
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
                                </div>
                                <div class="card-body">
                                
                                </div>
                                </div>
                            </div> -->
                        </div>{{-- fin del row --}}
                    </div>  
                    <div class="row mt-2">
                        <div class="col-12">
                                <div class="c-chart-wrapper" style="height: 30rem;">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="canvas-3" class=""></canvas>
                                </div>
                                <!-- <div class="card col-md-6">
                                    <div class="card-header">Pagos últimos 21 días
                                    <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
                                    </div>
                                    <div class="card-body">
                                    
                                    </div>
                                </div> -->
                                <div>
                            </div>{{-- fin del row --}}
                        </div>
                    </div>
                                  
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@parent
{{-- <script src="{{ asset('js/Chart.min.js') }}"></script> --}}
<script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
{{-- <script src="{{ asset('js/charts.js') }}"></script> --}}
<script type="text/javascript">
//    setTimeout(function(){
//        location.reload();
//    },15000);
</script>
<script>
    Chart.defaults.global.legend.display = false;
    const lineChart = new Chart(document.getElementById('canvas-1'), {
    type: 'line',
    data: {
      labels : <?php echo $operadores; ?>,
      datasets : [
        {          
          backgroundColor : 'rgba(220, 220, 220, 0.2)',
          borderColor : 'rgba(220, 220, 220, 1)',
          pointBackgroundColor : 'rgba(220, 220, 220, 1)',
          pointBorderColor : '#fff',
          data :<?php echo $monto_operadores; ?>
        }
      ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'PAGOS POR DIA'
        },
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
            }]
        }
    }
  })

  const lineChart2 = new Chart(document.getElementById('canvas-2'), {
    type: 'line',
    data: {
      labels : <?php echo $unidades; ?>,
      datasets : [
        {
          label: 'Viajes por unidad',
          backgroundColor : 'rgba(220, 220, 220, 0.2)',
          borderColor : 'rgba(220, 220, 220, 1)',
          pointBackgroundColor : 'rgba(220, 220, 220, 1)',
          pointBorderColor : '#fff',
          data :<?php echo $viajesUnidad; ?>
        }
      ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        title: {
                display: true,
                text: 'VIAJES POR UNIDAD'
            }
    }
  })
  const lineChart3 = new Chart(document.getElementById('canvas-3'), {
    type: 'line',
    data: {
      labels : <?php echo $dias; ?>,
      datasets : [
        {
          label: 'Anticipos por día',
          backgroundColor : 'rgba(220, 220, 220, 0.2)',
          borderColor : 'rgba(220, 220, 220, 1)',
          pointBackgroundColor : 'rgba(220, 220, 220, 1)',
          pointBorderColor : '#fff',
          data :<?php echo $anticipos; ?>
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      title: {
                display: true,
                text: 'ANTICIPOS POR DIA'
            }
    }
  })
</script>
@endsection
