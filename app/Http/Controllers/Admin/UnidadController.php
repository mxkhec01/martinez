<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUnidadRequest;
use App\Http\Requests\StoreUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;
use App\Models\Unidad;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnidadController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unidad_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unidads = Unidad::all();

        return view('admin.unidads.index', compact('unidads'));
    }

    public function create()
    {
        abort_if(Gate::denies('unidad_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unidads.create');
    }

    public function store(StoreUnidadRequest $request)
    {
        $unidad = Unidad::create($request->all());
        return redirect()->back()->with('message', 'Unidad creada con éxito');
        //return redirect()->route('admin.unidads.index');
    }

    public function edit(Unidad $unidad)
    {
        abort_if(Gate::denies('unidad_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unidads.edit', compact('unidad'));
    }

    public function update(UpdateUnidadRequest $request, Unidad $unidad)
    {
        $unidad->update($request->all());

        return redirect()->route('admin.unidads.index');
    }

    public function show(Unidad $unidad)
    {
        abort_if(Gate::denies('unidad_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unidads.show', compact('unidad'));
    }

    public function destroy(Unidad $unidad)
    {
        abort_if(Gate::denies('unidad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unidad->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnidadRequest $request)
    {
        Unidad::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
