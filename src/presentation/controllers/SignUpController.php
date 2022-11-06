<?php

declare(strict_types=1);

namespace Otaodev\PhpBestPractice\presentation\controllers;

use Error;

class SignUpController
{
    public function handle(): string|false
    {
        $error = new Error('Missing param: name');
        return json_encode([
            'statusCode' => 400,
            'body' => $error
        ]);
    }
}
