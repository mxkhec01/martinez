<?php

namespace App\Http\Requests;

use App\Models\Viaje;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreViajeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('viaje_create');
    }

    public function rules()
    {
        return [
            'nombre_viaje' => [
                'string',
                'nullable',
            ],
            'estado' => [
                'required',
            ],
        ];
    }
}
