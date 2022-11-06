<?php

declare(strict_types=1);

namespace Otaodev\PhpBestPractice\presentation\controllers;

class SignUpController
{
    public function handle(): string|false
    {
        return json_encode([
            'statusCode' => 400
        ]);
    }
}
