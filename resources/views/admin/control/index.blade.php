@extends('layouts.admin')
@section('content')


    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($viajes as $viaje)
            <tr onclick="window.location='{{ route('admin.viajes.show', [$viaje] ) }}'" style="cursor: pointer;">
                <th scope="row">{{ $viaje->id }}</th>
                <td>{{  $viaje->nombre_viaje }}</td>
                <td>{{  $viaje->operador->nombre }}</td>
                <td>{{  $viaje->unidad->codigo }}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection

