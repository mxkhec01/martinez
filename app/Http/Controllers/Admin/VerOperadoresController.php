<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVerOperadoreRequest;
use App\Http\Requests\StoreVerOperadoreRequest;
use App\Http\Requests\UpdateVerOperadoreRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerOperadoresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ver_operadore_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verOperadores.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ver_operadore_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verOperadores.create');
    }

    public function store(StoreVerOperadoreRequest $request)
    {
        $verOperadore = VerOperadore::create($request->all());

        return redirect()->route('admin.ver-operadores.index');
    }

    public function edit(VerOperadore $verOperadore)
    {
        abort_if(Gate::denies('ver_operadore_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verOperadores.edit', compact('verOperadore'));
    }

    public function update(UpdateVerOperadoreRequest $request, VerOperadore $verOperadore)
    {
        $verOperadore->update($request->all());

        return redirect()->route('admin.ver-operadores.index');
    }

    public function show(VerOperadore $verOperadore)
    {
        abort_if(Gate::denies('ver_operadore_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.verOperadores.show', compact('verOperadore'));
    }

    public function destroy(VerOperadore $verOperadore)
    {
        abort_if(Gate::denies('ver_operadore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $verOperadore->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerOperadoreRequest $request)
    {
        VerOperadore::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
