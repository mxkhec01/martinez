@extends('layouts.admin')
@section('styles')


<link href="{{ asset('css/table-fixed-header.css') }}" rel="stylesheet">



@endsection

@section('content')


    <table class="table table-hover table-striped table-fixed-header">
        <thead class="header" >
        <tr>
            <th scope="col">#</th>
            <th scope="col">Destino</th>
            <th scope="col">Operador</th>
            <th scope="col">Unidad</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Asignadas</th>
            <th scope="col">Pendientes</th>
            <th scope="col">Completadas</th>
            @can('viaje_edit')
                <th scope="col">Acción</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($viajes as $viaje)
            @php


                $entregas_activas = $viaje->entregas->whereNull('fecha_entrega');
                $num_entregas_activas = $entregas_activas->count();
                $num_total_entregas = $viaje->entregas->count();

            @endphp
            <tr onclick="window.location='{{ route('admin.viajes.show', [$viaje] ) }}'" style="cursor: pointer;">
                <th scope="row">{{ $viaje->id }}</th>
                <td>{{  $viaje->destino }}</td>
                <td>{{  $viaje->operador->nombre ?? '' }}  </td>
                <td>{{  $viaje->unidad->codigo }}</td>
                <td>{{  $viaje->updated_at }}</td>

                <td class="{{ ($num_entregas_activas == 0 && $num_total_entregas >0 ) ? "bg-success" : "bg-danger" }}">{{  $num_total_entregas }}</td>
                <td class="bg-success">{{  $num_entregas_activas }}</td>
                <td class="{{ ($num_entregas_activas == 0 && $num_total_entregas >0 ) ? "bg-success" : "bg-warning" }}" >{{  $num_total_entregas - $num_entregas_activas }}</td>
                @can('viaje_edit')
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.viajes.edit', $viaje->id) }}">
                            {{ trans('global.edit') }}
                        </a>
                    </td>
                @endcan
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection

@section('scripts')
<script src="//code.jquery.com/jquery.min.js"></script>

<script src="{{ asset('js/table-fixed-header.js') }}"></script>
<script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },15000);
</script>

<script language='javascript' type='text/javascript'>
      $(document).ready(function(){
      $('.table-fixed-header').fixedHeader();
      topOffset: 500

      });
    </script>

@endsection

