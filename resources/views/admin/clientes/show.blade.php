@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cliente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <td>
                            {{ $cliente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.razon_social') }}
                        </th>
                        <td>
                            {{ $cliente->razon_social }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.calle') }}
                        </th>
                        <td>
                            {{ $cliente->calle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.numero_exterior') }}
                        </th>
                        <td>
                            {{ $cliente->numero_exterior }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.colonia') }}
                        </th>
                        <td>
                            {{ $cliente->colonia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.codigo_postal') }}
                        </th>
                        <td>
                            {{ $cliente->codigo_postal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.estado') }}
                        </th>
                        <td>
                            {{ $cliente->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.ciudad') }}
                        </th>
                        <td>
                            {{ $cliente->ciudad }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection