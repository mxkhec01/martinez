<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>Id</th>
            <th>Número de Factura</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($facturas as $index => $factura)
            <tr>
                <td>
                    {{ $factura->id }}
                </td>
                <td>
                    @if($indiceEdicionFactura !== $index)
                        {{ $factura->numero_factura }}
                    @else
                        <input type="text" wire:model.defer="facturas.{{$index}}.numero_factura">
                    @endif

                </td>
                <td>
                    @if($indiceEdicionFactura !== $index)
                        <button wire:click.prevent="editFactura({{ $index }})" class="btn btn-primary btn-sm">Editar</button>
                    @else
                        <button wire:click.prevent="saveFactura({{ $index }})" class="btn btn-primary btn-sm">Guardar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
