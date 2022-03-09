@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.operador.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.operadors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.id') }}
                        </th>
                        <td>
                            {{ $operador->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.nombre') }}
                        </th>
                        <td>
                            {{ $operador->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.fecha_nacimiento') }}
                        </th>
                        <td>
                            {{ $operador->fecha_nacimiento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.fecha_ingreso') }}
                        </th>
                        <td>
                            {{ $operador->fecha_ingreso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.licencia') }}
                        </th>
                        <td>
                            {{ $operador->licencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.vence') }}
                        </th>
                        <td>
                            {{ $operador->vence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.tipo_licencia') }}
                        </th>
                        <td>
                            {{ $operador->tipo_licencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.imss') }}
                        </th>
                        <td>
                            {{ $operador->imss }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.rfc') }}
                        </th>
                        <td>
                            {{ $operador->rfc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.curp') }}
                        </th>
                        <td>
                            {{ $operador->curp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.tarjeta_bancaria') }}
                        </th>
                        <td>
                            {{ $operador->tarjeta_bancaria }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.banco') }}
                        </th>
                        <td>
                            {{ $operador->banco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.usuario') }}
                        </th>
                        <td>
                            {{ $operador->usuario }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operador.fields.password') }}
                        </th>
                        <td>
                            {{ $operador->password }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.operadors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection