<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'NOMBRE' => 'required|string|max:190',
            'EMAIL' => 'required|string|email|max:190|unique:USUARIO,EMAIL',
            'PASSWORD' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'NOMBRE.required' => 'El nombre es un campo obligatorio.',
            'NOMBRE.max' => 'Has superado el maximo de longitud de caracteres, el nombre debe ser menor a 190.',
            'EMAIL.required' => 'El correo electronico es un campo obligatorio.',
            'EMAIL.email' => 'El correo electronico no corresponde con un formato de email.',
            'EMAIL.max' => 'Has superado el maximo de longitud de caracteres, el email debe ser menor a 190.',
            'EMAIL.unique' => 'Este correo electronico ya esta registrado en nuestro sistema',
            'PASSWORD.required' => 'La contraseña es un campo obligatorio',
            'PASSWORD.min' => 'La longitud minima para la contraseña es de 6 caracteres',
            'PASSWORD.confirmed' => 'La contraseña de confirmacion no corresponde con la contraseña',
        ];
    }
}
