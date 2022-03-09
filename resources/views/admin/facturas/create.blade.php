@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.factura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facturas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="entrega_id">{{ trans('cruds.factura.fields.entrega') }}</label>
                <select class="form-control select2 {{ $errors->has('entrega') ? 'is-invalid' : '' }}" name="entrega_id" id="entrega_id" required>
                    @foreach($entregas as $id => $entry)
                        <option value="{{ $id }}" {{ old('entrega_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('entrega'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entrega') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factura.fields.entrega_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="numero_factura">{{ trans('cruds.factura.fields.numero_factura') }}</label>
                <input class="form-control {{ $errors->has('numero_factura') ? 'is-invalid' : '' }}" type="text" name="numero_factura" id="numero_factura" value="{{ old('numero_factura', '') }}" required>
                @if($errors->has('numero_factura'))
                    <div class="invalid-feedback">
                        {{ $errors->first('numero_factura') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factura.fields.numero_factura_helper') }}</span>
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