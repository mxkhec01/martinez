<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgregarClienteRequest;
use App\Http\Requests\StoreAgregarClienteRequest;
use App\Http\Requests\UpdateAgregarClienteRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgregarClientesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agregar_cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarClientes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agregar_cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarClientes.create');
    }

    public function store(StoreAgregarClienteRequest $request)
    {
        $agregarCliente = AgregarCliente::create($request->all());

        return redirect()->route('admin.agregar-clientes.index');
    }

    public function edit(AgregarCliente $agregarCliente)
    {
        abort_if(Gate::denies('agregar_cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarClientes.edit', compact('agregarCliente'));
    }

    public function update(UpdateAgregarClienteRequest $request, AgregarCliente $agregarCliente)
    {
        $agregarCliente->update($request->all());

        return redirect()->route('admin.agregar-clientes.index');
    }

    public function show(AgregarCliente $agregarCliente)
    {
        abort_if(Gate::denies('agregar_cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarClientes.show', compact('agregarCliente'));
    }

    public function destroy(AgregarCliente $agregarCliente)
    {
        abort_if(Gate::denies('agregar_cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarCliente->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgregarClienteRequest $request)
    {
        AgregarCliente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
