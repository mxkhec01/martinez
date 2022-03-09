@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.anticiposViaje.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.anticipos-viajes.update", [$anticiposViaje->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="viaje_id">{{ trans('cruds.anticiposViaje.fields.viaje') }}</label>
                <select class="form-control select2 {{ $errors->has('viaje') ? 'is-invalid' : '' }}" name="viaje_id" id="viaje_id" required>
                    @foreach($viajes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('viaje_id') ? old('viaje_id') : $anticiposViaje->viaje->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('viaje'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viaje') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.viaje_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monto">{{ trans('cruds.anticiposViaje.fields.monto') }}</label>
                <input class="form-control {{ $errors->has('monto') ? 'is-invalid' : '' }}" type="number" name="monto" id="monto" value="{{ old('monto', $anticiposViaje->monto) }}" step="0.01">
                @if($errors->has('monto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.monto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.anticiposViaje.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $anticiposViaje->descripcion) }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha">{{ trans('cruds.anticiposViaje.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $anticiposViaje->fecha) }}">
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.fecha_helper') }}</span>
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