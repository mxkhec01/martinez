<?php

namespace App\Http\Requests;

use App\Models\AnticiposViaje;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAnticiposViajeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('anticipos_viaje_create');
    }

    public function rules()
    {
        return [
            
            'descripcion' => [
                'string',
                'nullable',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
