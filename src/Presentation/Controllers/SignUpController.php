<?php

declare(strict_types=1);

namespace Otaodev\PhpBestPractices\Presentation\Controllers;

use Error;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SignUpController implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $httpRequest): ResponseInterface
    {
        $body = json_decode((string)$httpRequest->getBody());

        if (!property_exists($body, 'name')) {
            return new Response(
                400,
                ['Content-Type' => 'application/json'],
                (new Error('Missing param: name'))->getMessage()
            );
        }

        if (!property_exists($body, 'email')) {
            return new Response(
                400,
                ['Content-Type' => 'application/json'],
                (new Error('Missing param: email'))->getMessage()
            );
        }

        return new Response();
    }
}
