@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clientes.update", [$cliente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="razon_social">{{ trans('cruds.cliente.fields.razon_social') }}</label>
                <input class="form-control {{ $errors->has('razon_social') ? 'is-invalid' : '' }}" type="text" name="razon_social" id="razon_social" value="{{ old('razon_social', $cliente->razon_social) }}" required>
                @if($errors->has('razon_social'))
                    <div class="invalid-feedback">
                        {{ $errors->first('razon_social') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.razon_social_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="calle">{{ trans('cruds.cliente.fields.calle') }}</label>
                <input class="form-control {{ $errors->has('calle') ? 'is-invalid' : '' }}" type="text" name="calle" id="calle" value="{{ old('calle', $cliente->calle) }}">
                @if($errors->has('calle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('calle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.calle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="numero_exterior">{{ trans('cruds.cliente.fields.numero_exterior') }}</label>
                <input class="form-control {{ $errors->has('numero_exterior') ? 'is-invalid' : '' }}" type="text" name="numero_exterior" id="numero_exterior" value="{{ old('numero_exterior', $cliente->numero_exterior) }}">
                @if($errors->has('numero_exterior'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_exterior') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.numero_exterior_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="colonia">{{ trans('cruds.cliente.fields.colonia') }}</label>
                <input class="form-control {{ $errors->has('colonia') ? 'is-invalid' : '' }}" type="text" name="colonia" id="colonia" value="{{ old('colonia', $cliente->colonia) }}">
                @if($errors->has('colonia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('colonia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.colonia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="codigo_postal">{{ trans('cruds.cliente.fields.codigo_postal') }}</label>
                <input class="form-control {{ $errors->has('codigo_postal') ? 'is-invalid' : '' }}" type="text" name="codigo_postal" id="codigo_postal" value="{{ old('codigo_postal', $cliente->codigo_postal) }}">
                @if($errors->has('codigo_postal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codigo_postal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.codigo_postal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.cliente.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $cliente->estado) }}">
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ciudad">{{ trans('cruds.cliente.fields.ciudad') }}</label>
                <input class="form-control {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $cliente->ciudad) }}">
                @if($errors->has('ciudad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ciudad') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.ciudad_helper') }}</span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="latitud">{{ trans('cruds.cliente.fields.latitud') }}</label>
                    <input class="form-control {{ $errors->has('latitud') ? 'is-invalid' : '' }}" type="text"name="latitud" id="latitud" value="{{ old('latitud', $cliente->latitud) }}">
                    @if ($errors->has('latitud'))
                        <div class="invalid-feedback">
                            {{ $errors->first('latitud') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.latitud_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="longitud">{{ trans('cruds.cliente.fields.longitud') }}</label>
                    <input class="form-control {{ $errors->has('longitud') ? 'is-invalid' : '' }}" type="text" name="longitud" id="longitud" value="{{ old('longitud', $cliente->longitud) }}">
                    @if ($errors->has('longitud'))
                        <div class="invalid-feedback">
                            {{ $errors->first('longitud') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.longitud_helper') }}</span>
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