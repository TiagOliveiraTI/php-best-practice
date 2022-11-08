<?php

namespace Otaodev\PhpBestPractices\Tests\Helpers;

class RequestBody
{
    public static function makeBodyWithoutKey(string $name)
    {
        $data = [
            'name' => 'any_name',
            'email' => 'any@email.com',
            'password' => 'any_password',
            'passwordConfirmation' => 'any_password'
        ];

        unset($data[$name]);

        return $data;
    }
}
