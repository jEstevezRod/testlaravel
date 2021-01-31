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
            'APELLIDO1' => 'required|string|max:190',
            'APELLIDO2' => 'nullable|string|max:190',
            'EMAIL' => 'required|string|email|max:190|unique:USUARIO,EMAIL',
            'TELEFONO1' => 'required|numeric',
            'TELEFONO2' => 'nullable|numeric',
            'PASSWORD' => 'required|string|min:6|confirmed',
            'IDCENTRO' => 'required|numeric|exists:CENTRO,ID'
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
            'APELLIDO1.required' => 'El nombre es un campo obligatorio.',
            'APELLIDO1.max' => 'Has superado el maximo de longitud de caracteres, el apellido debe ser menor a 190.',
            'APELLIDO2.max' => 'Has superado el maximo de longitud de caracteres, el apellido debe ser menor a 190.',
            'EMAIL.required' => 'El correo electronico es un campo obligatorio.',
            'EMAIL.email' => 'El correo electronico no corresponde con un formato de email.',
            'EMAIL.max' => 'Has superado el maximo de longitud de caracteres, el email debe ser menor a 190.',
            'EMAIL.unique' => 'Este correo electronico ya esta registrado en nuestro sistema',
            'TELEFONO1.required' => 'El número de teléfono móvil es un campo obligatorio.',
            'TELEFONO1.numeric' => 'El número de teléfono móvil es un campo que solo debe de contener carácteres numéricos.',
            'TELEFONO2.numeric' => 'El número de teléfono móvil es un campo que solo debe de contener carácteres numéricos.',
            'PASSWORD.required' => 'La contraseña es un campo obligatorio',
            'PASSWORD.min' => 'La longitud minima para la contraseña es de 6 caracteres',
            'PASSWORD.confirmed' => 'La contraseña de confirmacion no corresponde con la contraseña',
            'IDCENTRO.required' => 'Selecionar un centro es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'NOMBRE' => 'nombre',
            'APELLIDO1' => 'primer apellido',
            'APELLIDO2' => 'segundo apelido',
            'EMAIL' => 'correo electrónico',
            'TELEFONO1' => 'teléfono móvil',
            'TELEFONO2' => 'teléfono móvil',
            'PASSWORD' => 'contraseña',
            'IDCENTRO' => 'centro'
        ];
    }
}
