<?php

namespace App\Http\Requests;

use App\Models\Entrega;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEntregaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('entrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:entregas,id',
        ];
    }
}
