<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntregaRequest;
use App\Http\Requests\StoreEntregaRequest;
use App\Http\Requests\UpdateEntregaRequest;
use App\Models\Cliente;
use App\Models\Entrega;
use App\Models\Viaje;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntregaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entrega_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregas = Entrega::with(['viaje', 'cliente'])->get();

        return view('admin.entregas.index', compact('entregas'));
    }

    public function create()
    {
        abort_if(Gate::denies('entrega_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes = Viaje::pluck('nombre_viaje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = Cliente::pluck('razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.entregas.create', compact('clientes', 'viajes'));
    }

    public function store(StoreEntregaRequest $request)
    {
        $entrega = Entrega::create($request->all());

        return redirect()->route('admin.entregas.index');
    }

    public function edit(Entrega $entrega)
    {
        abort_if(Gate::denies('entrega_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes = Viaje::pluck('nombre_viaje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientes = Cliente::pluck('razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        $entrega->load('viaje', 'cliente');

        return view('admin.entregas.edit', compact('clientes', 'entrega', 'viajes'));
    }

    public function update(UpdateEntregaRequest $request, Entrega $entrega)
    {
        $entrega->update($request->all());

        return redirect()->route('admin.entregas.index');
    }

    public function show(Entrega $entrega)
    {
        abort_if(Gate::denies('entrega_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entrega->load('viaje', 'cliente');

        return view('admin.entregas.show', compact('entrega'));
    }

    public function destroy(Entrega $entrega)
    {
        abort_if(Gate::denies('entrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entrega->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntregaRequest $request)
    {
        Entrega::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
