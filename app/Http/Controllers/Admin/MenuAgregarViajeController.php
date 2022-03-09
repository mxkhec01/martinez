<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMenuAgregarViajeRequest;
use App\Http\Requests\StoreMenuAgregarViajeRequest;
use App\Http\Requests\UpdateMenuAgregarViajeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuAgregarViajeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_agregar_viaje_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAgregarViajes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('menu_agregar_viaje_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAgregarViajes.create');
    }

    public function store(StoreMenuAgregarViajeRequest $request)
    {
        $menuAgregarViaje = MenuAgregarViaje::create($request->all());

        return redirect()->route('admin.menu-agregar-viajes.index');
    }

    public function edit(MenuAgregarViaje $menuAgregarViaje)
    {
        abort_if(Gate::denies('menu_agregar_viaje_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAgregarViajes.edit', compact('menuAgregarViaje'));
    }

    public function update(UpdateMenuAgregarViajeRequest $request, MenuAgregarViaje $menuAgregarViaje)
    {
        $menuAgregarViaje->update($request->all());

        return redirect()->route('admin.menu-agregar-viajes.index');
    }

    public function show(MenuAgregarViaje $menuAgregarViaje)
    {
        abort_if(Gate::denies('menu_agregar_viaje_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAgregarViajes.show', compact('menuAgregarViaje'));
    }

    public function destroy(MenuAgregarViaje $menuAgregarViaje)
    {
        abort_if(Gate::denies('menu_agregar_viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuAgregarViaje->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuAgregarViajeRequest $request)
    {
        MenuAgregarViaje::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
