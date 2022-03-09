<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMenuAsignaEntregaRequest;
use App\Http\Requests\StoreMenuAsignaEntregaRequest;
use App\Http\Requests\UpdateMenuAsignaEntregaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuAsignaEntregaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_asigna_entrega_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAsignaEntregas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('menu_asigna_entrega_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAsignaEntregas.create');
    }

    public function store(StoreMenuAsignaEntregaRequest $request)
    {
        $menuAsignaEntrega = MenuAsignaEntrega::create($request->all());

        return redirect()->route('admin.menu-asigna-entregas.index');
    }

    public function edit(MenuAsignaEntrega $menuAsignaEntrega)
    {
        abort_if(Gate::denies('menu_asigna_entrega_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAsignaEntregas.edit', compact('menuAsignaEntrega'));
    }

    public function update(UpdateMenuAsignaEntregaRequest $request, MenuAsignaEntrega $menuAsignaEntrega)
    {
        $menuAsignaEntrega->update($request->all());

        return redirect()->route('admin.menu-asigna-entregas.index');
    }

    public function show(MenuAsignaEntrega $menuAsignaEntrega)
    {
        abort_if(Gate::denies('menu_asigna_entrega_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.menuAsignaEntregas.show', compact('menuAsignaEntrega'));
    }

    public function destroy(MenuAsignaEntrega $menuAsignaEntrega)
    {
        abort_if(Gate::denies('menu_asigna_entrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menuAsignaEntrega->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuAsignaEntregaRequest $request)
    {
        MenuAsignaEntrega::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
