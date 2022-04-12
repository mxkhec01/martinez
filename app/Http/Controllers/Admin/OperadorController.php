<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOperadorRequest;
use App\Http\Requests\StoreOperadorRequest;
use App\Http\Requests\UpdateOperadorRequest;
use App\Models\Operador;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperadorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('operador_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operadors = Operador::all();

        return view('admin.operadors.index', compact('operadors'));
    }

    public function create()
    {
        abort_if(Gate::denies('operador_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.operadors.create');
    }

    public function store(StoreOperadorRequest $request)
    {
        $operador = Operador::create($request->all());

        return redirect()->back()->with('message', 'Operador creado con éxito');

        //return redirect()->route('admin.operadors.index');
    }

    public function edit(Operador $operador)
    {
        abort_if(Gate::denies('operador_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.operadors.edit', compact('operador'));
    }

    public function update(UpdateOperadorRequest $request, Operador $operador)
    {

        $operador->update($request->all());

        return redirect()->route('admin.operadors.index');
    }

    public function show(Operador $operador)
    {
        abort_if(Gate::denies('operador_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes_semana = $operador->viajes()->where('fecha_fin','>=',Carbon::now()->subDays(21))
        ->where('estado','finalizado')
        ->select([\DB::raw("SUM(monto_pagado) as monto"), \DB::raw("count(1) as num_viajes"), \DB::raw("first_day_of_week(fecha_fin) inicia, last_day_of_week(fecha_fin) fin")])
        ->groupBy(\DB::raw("first_day_of_week(fecha_fin), last_day_of_week(fecha_fin)"))
        ->get();

        return view('admin.operadors.show', compact('operador','viajes_semana'));
    }

    public function destroy(Operador $operador)
    {
        abort_if(Gate::denies('operador_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $operador->delete();

        return back();
    }

    public function massDestroy(MassDestroyOperadorRequest $request)
    {
        Operador::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
