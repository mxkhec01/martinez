<?php

namespace App\Http\Requests;

use App\Models\AnticiposViaje;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnticiposViajeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('anticipos_viaje_edit');
    }

    public function rules()
    {
        return [
            'viaje_id' => [
                'required',
                'integer',
            ],
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
