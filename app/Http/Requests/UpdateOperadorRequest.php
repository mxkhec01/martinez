<?php

namespace App\Http\Requests;

use App\Models\Operador;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOperadorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('operador_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'fecha_nacimiento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_ingreso' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'licencia' => [
                'string',
                'nullable',
            ],
            'vence' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'tipo_licencia' => [
                'string',
                'nullable',
            ],
            'imss' => [
                'string',
                'nullable',
            ],
            'rfc' => [
                'string',
                'nullable',
            ],
            'curp' => [
                'string',
                'nullable',
            ],
            'tarjeta_bancaria' => [
                'string',
                'nullable',
            ],
            'banco' => [
                'string',
                'nullable',
            ],
            'usuario' => [
                'string',
                'nullable',
            ],
            'password' => [
                'string',
                'nullable',
            ],
        ];
    }
}
