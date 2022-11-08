<?php

namespace Otaodev\PhpBestPractices\Tests\Unit\Presentation\Controllers;


use Error;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Otaodev\PhpBestPractices\Tests\Helpers\RequestBody;
use Otaodev\PhpBestPractices\Presentation\Controllers\SignUpController;

/**
 * @coversDefaultClass Otaodev\PhpBestPractices\Presentation\Controllers\SignUpController
 */
class SignUpControllerTest extends TestCase
{
    protected SignUpController $sut;

    public function setUp(): void
    {
        $this->sut = new SignUpController();
    }

    /**
     * @covers ::handle
     */
    public function testShouldReturn400IfNoNameIsProvided()
    {
        $body = RequestBody::makeBodyWithoutKey('name');

        $stub = $this->createMock(ServerRequestInterface::class);
        $stub->method('getBody')
            ->willReturn(json_encode($body));
        
        $response = $this->sut->handle($stub);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals(
            (new Error('Missing param: name'))->getMessage(), 
            (string) $response->getBody()
        );

    }

    /**
     * @covers ::handle
     */
    public function testShouldReturn400IfNoEmailIsProvided()
    {
        $body = RequestBody::makeBodyWithoutKey('email');

        $stub = $this->createMock(ServerRequestInterface::class);
        $stub->method('getBody')
            ->willReturn(json_encode($body));
        
        $response = $this->sut->handle($stub);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals(
            (new Error('Missing param: email'))->getMessage(), 
            (string) $response->getBody()
        );
    }
}