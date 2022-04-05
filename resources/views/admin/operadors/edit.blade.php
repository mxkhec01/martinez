@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.operador.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.operadors.update", [$operador->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label class="required" for="nombre">{{ trans('cruds.operador.fields.nombre') }}</label>
                    <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $operador->nombre) }}" required>
                    @if($errors->has('nombre'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nombre') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.nombre_helper') }}</span>
                </div>
                <div class="form-group col-md-1">
                    <label for="fecha_nacimiento">{{ trans('cruds.operador.fields.fecha_nacimiento') }}</label>
                    <input class="form-control date {{ $errors->has('fecha_nacimiento') ? 'is-invalid' : '' }}" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $operador->fecha_nacimiento) }}">
                    @if($errors->has('fecha_nacimiento'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fecha_nacimiento') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.fecha_nacimiento_helper') }}</span>
                </div>
                <div class="form-group col-md-1">
                    <label for="fecha_ingreso">{{ trans('cruds.operador.fields.fecha_ingreso') }}</label>
                    <input class="form-control date {{ $errors->has('fecha_ingreso') ? 'is-invalid' : '' }}" type="text" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', $operador->fecha_ingreso) }}">
                    @if($errors->has('fecha_ingreso'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fecha_ingreso') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.fecha_ingreso_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="licencia">{{ trans('cruds.operador.fields.licencia') }}</label>
                    <input class="form-control {{ $errors->has('licencia') ? 'is-invalid' : '' }}" type="text" name="licencia" id="licencia" value="{{ old('licencia', $operador->licencia) }}">
                    @if($errors->has('licencia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('licencia') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.licencia_helper') }}</span>
                </div>
                <div class="form-group col-md-1">
                    <label for="vence">{{ trans('cruds.operador.fields.vence') }}</label>
                    <input class="form-control date {{ $errors->has('vence') ? 'is-invalid' : '' }}" type="text" name="vence" id="vence" value="{{ old('vence', $operador->vence) }}">
                    @if($errors->has('vence'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vence') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.vence_helper') }}</span>
                </div>
                <div class="form-group col-md-1">
                    <label for="tipo_licencia">{{ trans('cruds.operador.fields.tipo_licencia') }}</label>
                    <input class="form-control {{ $errors->has('tipo_licencia') ? 'is-invalid' : '' }}" type="text" name="tipo_licencia" id="tipo_licencia" value="{{ old('tipo_licencia', $operador->tipo_licencia) }}">
                    @if($errors->has('tipo_licencia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tipo_licencia') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.tipo_licencia_helper') }}</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="imss">{{ trans('cruds.operador.fields.imss') }}</label>
                    <input class="form-control {{ $errors->has('imss') ? 'is-invalid' : '' }}" type="text" name="imss" id="imss" value="{{ old('imss', $operador->imss) }}">
                    @if($errors->has('imss'))
                        <div class="invalid-feedback">
                            {{ $errors->first('imss') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.imss_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="rfc">{{ trans('cruds.operador.fields.rfc') }}</label>
                    <input class="form-control {{ $errors->has('rfc') ? 'is-invalid' : '' }}" type="text" name="rfc" id="rfc" value="{{ old('rfc', $operador->rfc) }}">
                    @if($errors->has('rfc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rfc') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.rfc_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="curp">{{ trans('cruds.operador.fields.curp') }}</label>
                    <input class="form-control {{ $errors->has('curp') ? 'is-invalid' : '' }}" type="text" name="curp" id="curp" value="{{ old('curp', $operador->curp) }}">
                    @if($errors->has('curp'))
                        <div class="invalid-feedback">
                            {{ $errors->first('curp') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.curp_helper') }}</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tarjeta_bancaria">{{ trans('cruds.operador.fields.tarjeta_bancaria') }}</label>
                    <input class="form-control {{ $errors->has('tarjeta_bancaria') ? 'is-invalid' : '' }}" type="text" name="tarjeta_bancaria" id="tarjeta_bancaria" value="{{ old('tarjeta_bancaria', $operador->tarjeta_bancaria) }}">
                    @if($errors->has('tarjeta_bancaria'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tarjeta_bancaria') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.tarjeta_bancaria_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="banco">{{ trans('cruds.operador.fields.banco') }}</label>
                    <input class="form-control {{ $errors->has('banco') ? 'is-invalid' : '' }}" type="text" name="banco" id="banco" value="{{ old('banco', $operador->banco) }}">
                    @if($errors->has('banco'))
                        <div class="invalid-feedback">
                            {{ $errors->first('banco') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.banco_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="usuario">{{ trans('cruds.operador.fields.usuario') }}</label>
                    <input class="form-control {{ $errors->has('usuario') ? 'is-invalid' : '' }}" type="text" name="usuario" id="usuario" value="{{ old('usuario', $operador->usuario) }}">
                    @if($errors->has('usuario'))
                        <div class="invalid-feedback">
                            {{ $errors->first('usuario') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.usuario_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label for="password">{{ trans('cruds.operador.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', $operador->password) }}">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.operador.fields.password_helper') }}</span>
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