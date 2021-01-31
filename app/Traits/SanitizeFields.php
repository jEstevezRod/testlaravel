<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait SanitizeFields
{

    /**
     * Add some default values to the input user data, and  handle some possible errors like in database `APELLIDO2`
     * cannot be NULL, but exist people with only 1 apellido, so in that case we just add an empty string instead.
     *
     * @param $data
     * @return array
     */
    public function insertDefaultValues($data): array
    {
        $defaultValues = [
            'PASSWORD' => Hash::make($data['PASSWORD']),
            'APELLIDO2' => isset($data['APELLIDO2']) ? $data['APELLIDO2'] : '',
            'TELEFONO2' => isset($data['TELEFONO2']) ? $data['TELEFONO2'] : '',
            'ACTIVO' => 1,
            'INDEXPASSWORD' => 1,
            'FECHAMODIFICACIONPASSWORD' => now(),
            'NUMERO_INTENTOS' => 0,
            'NUEVO' => 1,
            'FECHAHORA_OPERACION' => now()->addHour()
        ];

        return array_merge($data, $defaultValues);
    }
}
