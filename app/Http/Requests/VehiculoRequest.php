<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehiculoRequest extends FormRequest
{
    public function authorize()
    {
        return true; // o policies si quieres
    }

    public function rules()
    {
        $vehiculoId = $this->route('vehiculo')?->id;

        return [
            'placa' => [
                'required',
                'string',
                'max:10',
                Rule::unique('vehiculos')->ignore($vehiculoId),
            ],
            'tipo'   => ['required', Rule::in(['Auto', 'Moto'])],
            'color'  => ['nullable', 'string', 'max:30'],
            'marca'  => ['nullable', 'string', 'max:50'],
            'modelo' => ['nullable', 'string', 'max:50'],
        ];
    }
}
