@extends('layouts.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">
            {{ trans('global.edit') }} Viaje {{ $viaje->id }} {{ $viaje->destino }}
        </h5>

        <div class="card-body">

            <form method="POST" action="{{ route("admin.viajes.update", [$viaje->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-row">
                <div class="form-group col">
                    <label for="destino">{{ trans('cruds.viaje.fields.nombre_viaje') }}</label>
                    <input class="form-control {{ $errors->has('nombre_viaje') ? 'is-invalid' : '' }}" type="text"
                           name="destino" id="destino"
                           value="{{ old('destino', $viaje->destino) }}">
                    @if($errors->has('destino'))
                        <div class="invalid-feedback">
                            {{ $errors->first('destino') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viaje.fields.nombre_viaje_helper') }}</span>
                </div>
                    <div class="form-group col">
                        <label class="required">{{ trans('cruds.viaje.fields.estado') }}</label>
                        <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado"
                                id="estado" required>
                            <option value
                                    disabled {{ old('estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\Viaje::ESTADO_SELECT as $key => $label)
                                <option
                                    value="{{ $key }}" {{ old('estado', $viaje->estado) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('estado'))
                            <div class="invalid-feedback">
                                {{ $errors->first('estado') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.viaje.fields.estado_helper') }}</span>
                    </div>
                </div>
                <div class="form-row">


                <div class="form-group col">
                    <label for="unidad_id">{{ trans('cruds.viaje.fields.unidad') }}</label>
                    <select class="form-control select2 {{ $errors->has('unidad') ? 'is-invalid' : '' }}"
                            name="unidad_id" id="unidad_id">
                        @foreach($unidads as $id => $entry)
                            <option
                                value="{{ $id }}" {{ (old('unidad_id') ? old('unidad_id') : $viaje->unidad->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('unidad'))
                        <div class="invalid-feedback">
                            {{ $errors->first('unidad') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viaje.fields.unidad_helper') }}</span>
                </div>
                <div class="form-group col">
                    <label for="operador_id">{{ trans('cruds.viaje.fields.operador') }}</label>
                    <select class="form-control select2 {{ $errors->has('operador') ? 'is-invalid' : '' }}"
                            name="operador_id" id="operador_id">
                        @foreach($operadors as $id => $entry)
                            <option
                                value="{{ $id }}" {{ (old('operador_id') ? old('operador_id') : $viaje->operador->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('operador'))
                        <div class="invalid-feedback">
                            {{ $errors->first('operador') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viaje.fields.operador_helper') }}</span>
                </div>

                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @can('entrega_create')
        @include('admin.entregas.create')

    @endcan

        <div class="card">
            <h5 class="card-header">
                <a data-toggle="collapse" href="#lista-entregas" aria-expanded="true" aria-controls="lista-entregas"
                   id="heading-entregas" class="d-block">
                    <i class="fa fa-chevron-down pull-right"></i>
                    Lista de entregas {{ $viaje->entregas->count(); }}
                </a>
            </h5>

            <div id="lista-entregas" class="collapse show" aria-labelledby="lista-entregas">
                <div class="card-body">
                    <div class="docs-example">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Facturas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($viaje->entregas as $entrega)
                            <tr>
                                <th scope="row">{{ $entrega->id }}</th>
                                <td>{{ $entrega->cliente->razon_social }}</td>
                                <td>
                                    <ul>
                                        @foreach($entrega->facturas as $factura)
                                        <li>{{ $factura->numero_factura }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>Editar/borrar</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>






@endsection
@section('scripts')
    <script src="{{ asset('js/entregas.js') }}"></script>
@endsection



