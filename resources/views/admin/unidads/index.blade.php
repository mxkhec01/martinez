@extends('layouts.admin')
@section('content')
@can('unidad_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.unidads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.unidad.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.unidad.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Unidad">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.placas') }}
                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.tipo_unidad') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unidads as $key => $unidad)
                        <tr data-entry-id="{{ $unidad->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $unidad->id ?? '' }}
                            </td>
                            <td>
                                {{ $unidad->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $unidad->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $unidad->placas ?? '' }}
                            </td>
                            <td>
                                {{ $unidad->tipo_unidad ?? '' }}
                            </td>
                            <td>
                                @can('unidad_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.unidads.show', $unidad->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('unidad_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.unidads.edit', $unidad->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('unidad_delete')
                                    <form action="{{ route('admin.unidads.destroy', $unidad->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('unidad_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.unidads.massDestroy') }}",
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
  let table = $('.datatable-Unidad:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection