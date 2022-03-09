<?php

namespace App\Http\Requests;

use App\Models\Factura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFacturaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('factura_create');
    }

    public function rules()
    {
        return [
            'entrega_id' => [
                'required',
                'integer',
            ],
            'numero_factura' => [
                'string',
                'required',
            ],
        ];
    }
}
