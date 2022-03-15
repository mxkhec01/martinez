@extends('layouts.admin')
@section('content')
@can('entrega_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.entregas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.entrega.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.entrega.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Entrega">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.entrega.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.entrega.fields.viaje') }}
                        </th>
                        <th>
                            {{ trans('cruds.entrega.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.entrega.fields.fecha_llegada') }}
                        </th>
                        <th>
                            {{ trans('cruds.entrega.fields.fecha_entrega') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($entregas as $key => $entrega)
                        <tr data-entry-id="{{ $entrega->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $entrega->id ?? '' }}
                            </td>
                            <td>
                                {{ $entrega->viaje->nombre_viaje ?? '' }}
                            </td>
                            <td>
                                {{ $entrega->cliente->razon_social ?? '' }}
                            </td>
                            <td>
                                {{ $entrega->fecha_llegada ?? '' }}
                            </td>
                            <td>
                                {{ $entrega->fecha_entrega ?? '' }}
                            </td>
                            <td>
                                @can('entrega_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.entregas.show', $entrega->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('entrega_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.entregas.edit', $entrega->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('entrega_delete')
                                    <form action="{{ route('admin.entregas.destroy', $entrega->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @empty
                    sin factura
                    @endforelse
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
@can('entrega_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.entregas.massDestroy') }}",
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
  });
  let table = $('.datatable-Entrega:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection