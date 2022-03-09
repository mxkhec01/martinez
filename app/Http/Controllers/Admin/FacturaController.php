<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFacturaRequest;
use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Models\Entrega;
use App\Models\Factura;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacturaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('factura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facturas = Factura::with(['entrega'])->get();

        return view('admin.facturas.index', compact('facturas'));
    }

    public function create()
    {
        abort_if(Gate::denies('factura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregas = Entrega::pluck('fecha_llegada', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.facturas.create', compact('entregas'));
    }

    public function store(StoreFacturaRequest $request)
    {
        $factura = Factura::create($request->all());

        return redirect()->route('admin.facturas.index');
    }

    public function edit(Factura $factura)
    {
        abort_if(Gate::denies('factura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregas = Entrega::pluck('fecha_llegada', 'id')->prepend(trans('global.pleaseSelect'), '');

        $factura->load('entrega');

        return view('admin.facturas.edit', compact('entregas', 'factura'));
    }

    public function update(UpdateFacturaRequest $request, Factura $factura)
    {
        $factura->update($request->all());

        return redirect()->route('admin.facturas.index');
    }

    public function show(Factura $factura)
    {
        abort_if(Gate::denies('factura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $factura->load('entrega');

        return view('admin.facturas.show', compact('factura'));
    }

    public function destroy(Factura $factura)
    {
        abort_if(Gate::denies('factura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $factura->delete();

        return back();
    }

    public function massDestroy(MassDestroyFacturaRequest $request)
    {
        Factura::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
