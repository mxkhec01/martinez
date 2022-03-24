<div class="card">
    <div class="card-header">
        Nueva Entrega para viaje {{ $viaje->nombre_viaje  }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.viajes.entregas.store", $viaje) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
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
                        <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cliente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cliente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.entrega.fields.cliente_helper') }}</span>
            </div>

            <h5>Facturas de la entrega <button id="add_row" class="btn btn-default float-right">Agregar Factura</button> </h5>
                <table class="table" id="facturas_table">
                    <tbody>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">

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

