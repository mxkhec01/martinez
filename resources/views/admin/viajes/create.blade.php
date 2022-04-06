@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Crear Viaje
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.viajes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="destino">{{ trans('cruds.viaje.fields.nombre_viaje') }}</label>
                    <input class="form-control {{ $errors->has('destino') ? 'is-invalid' : '' }}" type="text"
                           name="destino" id="destino" value="{{ old('destino', '') }}">
                    @if($errors->has('nombre_viaje'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre_viaje') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viaje.fields.nombre_viaje_helper') }}</span>
                </div>
            <div class="form-group col-md-4">
                <label for="operador_id">{{ trans('cruds.viaje.fields.operador') }}</label>
                <select class="form-control select2 {{ $errors->has('operador') ? 'is-invalid' : '' }}"
                        name="operador_id" id="operador_id">
                    @foreach($operadors as $id => $entry)
                    <option value="{{ $id }}" {{ old(
                    'operador_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('operador'))
                <div class="invalid-feedback">
                    {{ $errors->first('operador') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.viaje.fields.operador_helper') }}</span>
            </div>
                <div class="form-group col-md-3">
                    <label class="required">{{ trans('cruds.viaje.fields.estado') }}</label>
                    <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado"
                            id="estado" required>
                        <option value disabled {{ old(
                        'estado', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Viaje::ESTADO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old(
                        'estado', 'asignar') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
 <!--           <div class="form-group col-md-6">
                <label for="cliente_id">{{ trans('cruds.viaje.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id"
                        id="cliente_id">
                    @foreach($clientes as $id => $entry)
                    <option value="{{ $id }}" {{ old(
                    'cliente_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                <div class="invalid-feedback">
                    {{ $errors->first('cliente') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.viaje.fields.cliente_helper') }}</span>
            </div>-->
            <div class="form-group col-md-3">
                <label for="unidad_id">{{ trans('cruds.viaje.fields.unidad') }}</label>
                <select class="form-control select2 {{ $errors->has('unidad') ? 'is-invalid' : '' }}" name="unidad_id"
                        id="unidad_id">
                    @foreach($unidads as $id => $entry)
                    <option value="{{ $id }}" {{ old(
                    'unidad_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unidad'))
                <div class="invalid-feedback">
                    {{ $errors->first('unidad') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.viaje.fields.unidad_helper') }}</span>
            </div>

            <div class="form-group col-md-3">
                <label for="fecha_inicio">Inicio de viaje</label>
                <input class="form-control date {{ $errors->has('fecha_inicio') ? 'is-invalid' : '' }}" type="text"
                       name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}">
                @if($errors->has('fecha_inicio'))
                <div class="invalid-feedback">
                    {{ $errors->first('fecha_inicio') }}
                </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-3">
                <label for="fecha_fin">Fin de viaje</label>
                <input class="form-control date {{ $errors->has('fecha_fin') ? 'is-invalid' : '' }}" type="text"
                       name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
                @if($errors->has('fecha_fin'))
                <div class="invalid-feedback">
                    {{ $errors->first('fecha_fin') }}
                </div>
                @endif
                <span class="help-block"></span>
            </div>


                <div class="form-group col-md-3 ">
                    <label for="monto_pagado">Pago Operador</label>
                    <input class="form-control text-right {{ $errors->has('monto_pagado') ? 'is-invalid' : '' }}" type="text"
                           name="monto_pagado" id="monto_pagado"
                           value="{{ old('monto_pagado') }}">
                    @if($errors->has('monto_pagado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monto_pagado') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viaje.fields.nombre_viaje_helper') }}</span>
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


@endsection
