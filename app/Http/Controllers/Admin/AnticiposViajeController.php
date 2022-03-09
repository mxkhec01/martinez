<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnticiposViajeRequest;
use App\Http\Requests\StoreAnticiposViajeRequest;
use App\Http\Requests\UpdateAnticiposViajeRequest;
use App\Models\AnticiposViaje;
use App\Models\Viaje;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnticiposViajeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('anticipos_viaje_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anticiposViajes = AnticiposViaje::with(['viaje'])->get();

        return view('admin.anticiposViajes.index', compact('anticiposViajes'));
    }

    public function create()
    {
        abort_if(Gate::denies('anticipos_viaje_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes = Viaje::pluck('estado', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.anticiposViajes.create', compact('viajes'));
    }

    public function store(StoreAnticiposViajeRequest $request)
    {
        $anticiposViaje = AnticiposViaje::create($request->all());

        return redirect()->route('admin.anticipos-viajes.index');
    }

    public function edit(AnticiposViaje $anticiposViaje)
    {
        abort_if(Gate::denies('anticipos_viaje_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viajes = Viaje::pluck('estado', 'id')->prepend(trans('global.pleaseSelect'), '');

        $anticiposViaje->load('viaje');

        return view('admin.anticiposViajes.edit', compact('anticiposViaje', 'viajes'));
    }

    public function update(UpdateAnticiposViajeRequest $request, AnticiposViaje $anticiposViaje)
    {
        $anticiposViaje->update($request->all());

        return redirect()->route('admin.anticipos-viajes.index');
    }

    public function show(AnticiposViaje $anticiposViaje)
    {
        abort_if(Gate::denies('anticipos_viaje_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anticiposViaje->load('viaje');

        return view('admin.anticiposViajes.show', compact('anticiposViaje'));
    }

    public function destroy(AnticiposViaje $anticiposViaje)
    {
        abort_if(Gate::denies('anticipos_viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $anticiposViaje->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnticiposViajeRequest $request)
    {
        AnticiposViaje::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
