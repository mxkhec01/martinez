@extends('layouts.admin')
@section('content')
    @can('viaje_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.viajes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.viaje.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">

            {{  $valor= $valor ?? 'todo' }}
            @if($valor == 'todo')
                Viajes en cualquier estado
            @else
                Viajes en estado {{ App\Models\Viaje::ESTADO_SELECT[$valor] ?? '' }}
            @endif
            <ul class="nav nav-tabs float-right">
                @foreach(App\Models\Viaje::ESTADO_SELECT as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link  {{  $valor == $key ? App\Models\Viaje::ESTADO_BACKGROUND[$key] : '' }} {{ $valor == $key ? 'text-white' : '' }}"
                           href="{{ route('admin.viajes.mostrar',['valor' => $key]) }}">{{ $item }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link {{ $valor == 'todo' ? 'active' : '' }}"
                       href="{{ route('admin.viajes.mostrar',['valor' => 'todo']) }}">Todos</a>
                </li>

            </ul>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Viaje">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.nombre_viaje') }}
                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.cliente') }}
                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.unidad') }}
                        </th>
                        <th>
                            {{ trans('cruds.unidad.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.operador') }}
                        </th>
                        <th>
                            {{ trans('cruds.viaje.fields.estado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($clientes as $key => $item)
                                    <option value="{{ $item->razon_social }}">{{ $item->razon_social }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($unidads as $key => $item)
                                    <option value="{{ $item->codigo }}">{{ $item->codigo }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($operadors as $key => $item)
                                    <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Viaje::ESTADO_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($viajes as $key => $viaje)
                        <tr data-entry-id="{{ $viaje->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $viaje->id ?? '' }}
                            </td>
                            <td>
                                {{ $viaje->nombre_viaje ?? '' }}
                            </td>
                            <td>
                                {{ $viaje->cliente->razon_social ?? '' }}
                            </td>
                            <td>
                                {{ $viaje->unidad->codigo ?? '' }}
                            </td>
                            <td>
                                {{ $viaje->unidad->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $viaje->operador->nombre ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Viaje::ESTADO_SELECT[$viaje->estado] ?? '' }}
                            </td>
                            <td>
                                @can('viaje_show')
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.viajes.show', $viaje->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('viaje_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.viajes.edit', $viaje->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('viaje_delete')
                                    <form action="{{ route('admin.viajes.destroy', $viaje->id) }}" method="POST"
                                          onsubmit="return confirm('{{ trans('global.areYouSureDelete') }}');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ trans('global.delete') }}">
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
            @can('viaje_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.viajes.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
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
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
                scrollY: "50vh",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 1,
                    right: 1
                },
            });
            let table = $('.datatable-Viaje:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function (e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function (colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        })

    </script>
@endsection
