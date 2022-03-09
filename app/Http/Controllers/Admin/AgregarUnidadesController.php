<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgregarUnidadeRequest;
use App\Http\Requests\StoreAgregarUnidadeRequest;
use App\Http\Requests\UpdateAgregarUnidadeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgregarUnidadesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agregar_unidade_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarUnidades.index');
    }

    public function create()
    {
        abort_if(Gate::denies('agregar_unidade_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarUnidades.create');
    }

    public function store(StoreAgregarUnidadeRequest $request)
    {
        $agregarUnidade = AgregarUnidade::create($request->all());

        return redirect()->route('admin.agregar-unidades.index');
    }

    public function edit(AgregarUnidade $agregarUnidade)
    {
        abort_if(Gate::denies('agregar_unidade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarUnidades.edit', compact('agregarUnidade'));
    }

    public function update(UpdateAgregarUnidadeRequest $request, AgregarUnidade $agregarUnidade)
    {
        $agregarUnidade->update($request->all());

        return redirect()->route('admin.agregar-unidades.index');
    }

    public function show(AgregarUnidade $agregarUnidade)
    {
        abort_if(Gate::denies('agregar_unidade_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agregarUnidades.show', compact('agregarUnidade'));
    }

    public function destroy(AgregarUnidade $agregarUnidade)
    {
        abort_if(Gate::denies('agregar_unidade_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agregarUnidade->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgregarUnidadeRequest $request)
    {
        AgregarUnidade::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
