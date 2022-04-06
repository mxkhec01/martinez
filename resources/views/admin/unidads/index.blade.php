@extends('layouts.admin')
@section('content')
{{-- @can('unidad_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.unidads.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.unidad.title_singular') }}
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    <div class="card-header">
        Lista de Unidades
        @can('unidad_create')
            {{-- <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12"> --}}
                    <a class="btn btn-success float-right" href="{{ route('admin.unidads.create') }}">
                        Agregar unidad
                    </a>
                {{-- </div>
            </div> --}}
        @endcan
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
                            <td class="text-center">
                                {{ $unidad->id ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $unidad->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $unidad->nombre ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $unidad->placas ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $unidad->tipo_unidad ?? '' }}
                            </td>
                            <!-- <td>
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

                            </td> -->
                            <td>
                            <div class="dropdown text-center">
                                        <a class="dropdown-button" id="dropdown-menu-{{ $unidad->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $unidad->id }}">
                                    @can('cliente_show')
                                        <a class="dropdown-item float-right"
                                        href="{{ route('admin.unidads.show', $unidad->id) }}">                                            
                                            <i class="fas fa-user-tie"  style="width: 50px;"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('cliente_edit')
                                        <a class="dropdown-item" href="{{ route('admin.unidads.edit', $unidad->id) }}">
                                            <i class="fas fa-edit" style="width: 50px;"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('cliente_delete')
                                            <form id="delete-{{ $unidad->id }}" action="{{ route('admin.unidads.destroy', $unidad->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $unidad->id }}').submit()">
                                                <i class="fa fa-trash" style="width: 50px;"> </i>
                                                {{ trans('global.delete') }}
                                            </a>

                                    @endcan
                                </div>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('styles')
    <style>
        .dataTables_scrollBody, .dataTables_wrapper {
            position: static !important;
        }
        .dropdown-button {
            cursor: pointer;
            font-size: 2em;
            display:block
        }
        .dropdown-menu i {
            font-size: 1.33333333em;
            line-height: 0.75em;
            vertical-align: -15%;
            color: #000;
        }
    </style>
@endsection


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
    scrollY:        "60vh",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 1,
            right: 1
        },
  });
  let table = $('.datatable-Unidad:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection