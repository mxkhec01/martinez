@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.unidad.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unidads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.unidad.fields.id') }}
                        </th>
                        <td>
                            {{ $unidad->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unidad.fields.codigo') }}
                        </th>
                        <td>
                            {{ $unidad->codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unidad.fields.nombre') }}
                        </th>
                        <td>
                            {{ $unidad->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unidad.fields.placas') }}
                        </th>
                        <td>
                            {{ $unidad->placas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unidad.fields.tipo_unidad') }}
                        </th>
                        <td>
                            {{ $unidad->tipo_unidad }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unidads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection