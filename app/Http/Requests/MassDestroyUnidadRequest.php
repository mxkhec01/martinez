<?php

namespace App\Http\Requests;

use App\Models\Unidad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUnidadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('unidad_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:unidads,id',
        ];
    }
}
