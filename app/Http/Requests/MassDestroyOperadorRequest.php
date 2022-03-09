<?php

namespace App\Http\Requests;

use App\Models\Operador;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOperadorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('operador_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:operadors,id',
        ];
    }
}
