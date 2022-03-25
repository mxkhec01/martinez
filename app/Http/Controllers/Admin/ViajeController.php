<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyViajeRequest;
use App\Http\Requests\StoreViajeRequest;
use App\Http\Requests\UpdateViajeRequest;
use App\Models\Cliente;
use App\Models\Operador;
use App\Models\Unidad;
use App\Models\Viaje;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViajeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('viaje_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes = Viaje::with(['cliente', 'unidad', 'operador'])->get();

        $clientes = Cliente::get();

        $unidads = Unidad::get();

        $operadors = Operador::get();

        return view('admin.viajes.index', compact('clientes', 'operadors', 'unidads', 'viajes'));
    }

    public function mostrar($valor)
    {
        abort_if(Gate::denies('viaje_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!$valor || $valor=='todo') {
            $viajes = Viaje::with(['cliente', 'unidad', 'operador'])->get();
        }else {
            $viajes = Viaje::with(['cliente', 'unidad', 'operador'])->where('estado', '=', $valor)->get();
        }
        $clientes = Cliente::get();

        $unidads = Unidad::get();

        $operadors = Operador::get();

        return view('admin.viajes.index', compact('clientes', 'operadors', 'unidads', 'viajes', 'valor'));
    }

    public function create()
    {
        abort_if(Gate::denies('viaje_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::pluck('razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unidads = Unidad::pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operadors = Operador::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.viajes.create', compact('clientes', 'operadors', 'unidads'))->with(['valor'=>'todo',]);
    }

    public function store(StoreViajeRequest $request)
    {
        $viaje = Viaje::create($request->all());

        return redirect()->route('admin.viajes.index')->with(['valor'=>'todo',]);
    }

    public function edit(Viaje $viaje)
    {
        abort_if(Gate::denies('viaje_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::pluck('razon_social', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unidads = Unidad::pluck('codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $operadors = Operador::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $viaje->load('cliente', 'unidad', 'operador');


        return view('admin.viajes.edit', compact('clientes', 'operadors', 'unidads', 'viaje'));
    }

    public function update(UpdateViajeRequest $request, Viaje $viaje)
    {
        $viaje->update($request->all());

        return redirect()->back()->with('message', 'Viaje actualizado con éxito');

    }

    public function show(Viaje $viaje)
    {
        abort_if(Gate::denies('viaje_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viaje->load('cliente', 'unidad', 'operador','entregas');



        return view('admin.viajes.show', compact('viaje'));
    }

    public function gastos(Viaje $viaje)
    {
        abort_if(Gate::denies('viaje_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viaje->with('casetas');

        return view('admin.viajes.gastos', compact('viaje'));
    }

    public function destroy(Viaje $viaje)
    {
        abort_if(Gate::denies('viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viaje->delete();

        return back();
    }

    public function massDestroy(MassDestroyViajeRequest $request)
    {
        Viaje::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
