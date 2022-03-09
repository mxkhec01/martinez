<?php

namespace App\Http\Requests;

use App\Models\Entrega;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEntregaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('entrega_edit');
    }

    public function rules()
    {
        return [
            'fecha_llegada' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_entrega' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
