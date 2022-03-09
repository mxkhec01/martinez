<?php

namespace App\Http\Requests;

use App\Models\Factura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFacturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('factura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:facturas,id',
        ];
    }
}
