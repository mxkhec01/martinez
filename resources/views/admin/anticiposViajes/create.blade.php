<div class="card">
    <h5 class="card-header">
        <a data-toggle="collapse" href="#collapse-anticipo" aria-expanded="false" aria-controls="collapse-anticipo" id="heading-anticipo" class="d-block collapsed">
            <i class="fa fa-chevron-down pull-right"></i>
            Crear Anticipo
        </a>
    </h5>
    <div id="collapse-anticipo" class="collapse" aria-labelledby="heading-anticipo">

    <div class="card-body">
        <form method="POST" action="{{ route("admin.viajes.anticipos-viajes.store",$viaje) }}" enctype="multipart/form-data">
            @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descripcion">{{ trans('cruds.anticiposViaje.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                @if($errors->has('viaje'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viaje') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.viaje_helper') }}</span>
            </div>
            <div class="form-group  col-md-3">
                <label for="monto">{{ trans('cruds.anticiposViaje.fields.monto') }}</label>
                <input class="form-control {{ $errors->has('monto') ? 'is-invalid' : '' }} text-right" type="number" name="monto" id="monto" value="{{ old('monto', '0') }}" step="0.01">
                @if($errors->has('monto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.monto_helper') }}</span>
            </div>
            <div class="form-group col-md-3">
                <label for="fecha">{{ trans('cruds.anticiposViaje.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.anticiposViaje.fields.fecha_helper') }}</span>
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
</div>
