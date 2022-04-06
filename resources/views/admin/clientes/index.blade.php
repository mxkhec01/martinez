@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Lista de Clientes
        @can('cliente_create')
    {{-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12"> --}}
            <a class="btn btn-success float-right" href="{{ route('admin.clientes.create') }}">
                {{ trans('global.add') }} Cliente
            </a>
        {{-- </div>
    </div> --}}
@endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Cliente">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.razon_social') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.calle') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.numero_exterior') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.colonia') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.codigo_postal') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.ciudad') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $key => $cliente)
                        <tr data-entry-id="{{ $cliente->id }}">
                            <td>

                            </td>
                            <td class="text-center">
                                {{ $cliente->id ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->razon_social ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->calle ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $cliente->numero_exterior ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->colonia ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $cliente->codigo_postal ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->estado ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->ciudad ?? '' }}
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                        <a class="dropdown-button" id="dropdown-menu-{{ $cliente->id }}" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-{{ $cliente->id }}">
                                    @can('cliente_show')
                                        <a class="dropdown-item float-right"
                                        href="{{ route('admin.clientes.show', $cliente->id) }}">                                            
                                            <i class="fas fa-user-tie"  style="width: 50px;"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('cliente_edit')
                                        <a class="dropdown-item" href="{{ route('admin.clientes.edit', $cliente->id) }}">
                                            <i class="fas fa-edit" style="width: 50px;"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('cliente_delete')
                                            <form id="delete-{{ $cliente->id }}" action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="#" onclick="if(confirm('{{ trans('global.areYouSure') }}')) document.getElementById('delete-{{ $cliente->id }}').submit()">
                                                <i class="fa fa-trash" style="width: 50px;"> </i>
                                                {{ trans('global.delete') }}
                                            </a>

                                    @endcan
                                    </div>
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
@can('cliente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clientes.massDestroy') }}",
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
    scrollY:        "50vh",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
            left: 1,
            right: 1
        },
  });
  let table = $('.datatable-Cliente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection