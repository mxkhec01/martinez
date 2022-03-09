<?php

namespace App\Http\Requests;

use App\Models\AnticiposViaje;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnticiposViajeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('anticipos_viaje_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:anticipos_viajes,id',
        ];
    }
}
