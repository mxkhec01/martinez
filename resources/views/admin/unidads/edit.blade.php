@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.unidad.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.unidads.update", [$unidad->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="codigo">{{ trans('cruds.unidad.fields.codigo') }}</label>
                    <input class="form-control {{ $errors->has('codigo') ? 'is-invalid' : '' }}" type="text" name="codigo" id="codigo" value="{{ old('codigo', $unidad->codigo) }}">
                    @if($errors->has('codigo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('codigo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.unidad.fields.codigo_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="nombre">{{ trans('cruds.unidad.fields.nombre') }}</label>
                    <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $unidad->nombre) }}">
                    @if($errors->has('nombre'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nombre') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.unidad.fields.nombre_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="placas">{{ trans('cruds.unidad.fields.placas') }}</label>
                    <input class="form-control {{ $errors->has('placas') ? 'is-invalid' : '' }}" type="text" name="placas" id="placas" value="{{ old('placas', $unidad->placas) }}">
                    @if($errors->has('placas'))
                        <div class="invalid-feedback">
                            {{ $errors->first('placas') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.unidad.fields.placas_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipo_unidad">{{ trans('cruds.unidad.fields.tipo_unidad') }}</label>
                    <input class="form-control {{ $errors->has('tipo_unidad') ? 'is-invalid' : '' }}" type="text" name="tipo_unidad" id="tipo_unidad" value="{{ old('tipo_unidad', $unidad->tipo_unidad) }}">
                    @if($errors->has('tipo_unidad'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tipo_unidad') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.unidad.fields.tipo_unidad_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection