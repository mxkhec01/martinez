@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.entrega.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.entregas.update", [$entrega->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="viaje_id">{{ trans('cruds.entrega.fields.viaje') }}</label>
                <select class="form-control select2 {{ $errors->has('viaje') ? 'is-invalid' : '' }}" name="viaje_id" id="viaje_id">
                    @foreach($viajes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('viaje_id') ? old('viaje_id') : $entrega->viaje->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('viaje'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viaje') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entrega.fields.viaje_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cliente_id">{{ trans('cruds.entrega.fields.cliente') }}</label>
                <select class="form-control select2 {{ $errors->has('cliente') ? 'is-invalid' : '' }}" name="cliente_id" id="cliente_id">
                    @foreach($clientes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cliente_id') ? old('cliente_id') : $entrega->cliente->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cliente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entrega.fields.cliente_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_llegada">{{ trans('cruds.entrega.fields.fecha_llegada') }}</label>
                <input class="form-control date {{ $errors->has('fecha_llegada') ? 'is-invalid' : '' }}" type="text" name="fecha_llegada" id="fecha_llegada" value="{{ old('fecha_llegada', $entrega->fecha_llegada) }}">
                @if($errors->has('fecha_llegada'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_llegada') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entrega.fields.fecha_llegada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha_entrega">{{ trans('cruds.entrega.fields.fecha_entrega') }}</label>
                <input class="form-control date {{ $errors->has('fecha_entrega') ? 'is-invalid' : '' }}" type="text" name="fecha_entrega" id="fecha_entrega" value="{{ old('fecha_entrega', $entrega->fecha_entrega) }}">
                @if($errors->has('fecha_entrega'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_entrega') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entrega.fields.fecha_entrega_helper') }}</span>
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