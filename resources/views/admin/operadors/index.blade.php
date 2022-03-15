@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} de operadores
        @can('operador_create')
            {{-- <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12"> --}}
                    <a class="btn btn-success float-right" href="{{ route('admin.operadors.create') }}">
                        {{ trans('global.add') }} Operador
                    </a>
                {{-- </div>
            </div> --}}
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Operador">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.fecha_nacimiento') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.fecha_ingreso') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.licencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.vence') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.tipo_licencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.imss') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.rfc') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.curp') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.tarjeta_bancaria') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.usuario') }}
                        </th>
                        <th>
                            {{ trans('cruds.operador.fields.password') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($operadors as $key => $operador)
                        <tr data-entry-id="{{ $operador->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $operador->id ?? '' }}
                            </td>
                            <td>
                                {{ $operador->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $operador->fecha_nacimiento ?? '' }}
                            </td>
                            <td>
                                {{ $operador->fecha_ingreso ?? '' }}
                            </td>
                            <td>
                                {{ $operador->licencia ?? '' }}
                            </td>
                            <td>
                                {{ $operador->vence ?? '' }}
                            </td>
                            <td>
                                {{ $operador->tipo_licencia ?? '' }}
                            </td>
                            <td>
                                {{ $operador->imss ?? '' }}
                            </td>
                            <td>
                                {{ $operador->rfc ?? '' }}
                            </td>
                            <td>
                                {{ $operador->curp ?? '' }}
                            </td>
                            <td>
                                {{ $operador->tarjeta_bancaria ?? '' }}
                            </td>
                            <td>
                                {{ $operador->banco ?? '' }}
                            </td>
                            <td>
                                {{ $operador->usuario ?? '' }}
                            </td>
                            <td>
                                {{ $operador->password ?? '' }}
                            </td>
                            <td>
                                @can('operador_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.operadors.show', $operador->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('operador_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.operadors.edit', $operador->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('operador_delete')
                                    <form action="{{ route('admin.operadors.destroy', $operador->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('operador_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.operadors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    scrollY:        "60vh",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 1,
            right: 1
        },
  });
  let table = $('.datatable-Operador:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection