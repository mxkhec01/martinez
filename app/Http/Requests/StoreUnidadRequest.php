<?php

namespace App\Http\Requests;

use App\Models\Unidad;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUnidadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unidad_create');
    }

    public function rules()
    {
        return [
            'codigo' => [
                'string',
                'nullable',
            ],
            'nombre' => [
                'string',
                'nullable',
            ],
            'placas' => [
                'string',
                'nullable',
            ],
            'tipo_unidad' => [
                'string',
                'nullable',
            ],
        ];
    }
}
