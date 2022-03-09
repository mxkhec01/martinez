<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cliente_edit');
    }

    public function rules()
    {
        return [
            'razon_social' => [
                'string',
                'required',
            ],
            'calle' => [
                'string',
                'nullable',
            ],
            'numero_exterior' => [
                'string',
                'nullable',
            ],
            'colonia' => [
                'string',
                'nullable',
            ],
            'codigo_postal' => [
                'string',
                'nullable',
            ],
            'estado' => [
                'string',
                'nullable',
            ],
            'ciudad' => [
                'string',
                'nullable',
            ],
        ];
    }
}
