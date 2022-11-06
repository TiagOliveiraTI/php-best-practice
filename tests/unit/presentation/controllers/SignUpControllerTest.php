<?php

use PHPUnit\Framework\TestCase;
use Otaodev\PhpBestPractice\presentation\controllers\SignUpController;

/**
 * @coversDefaultClass Otaodev\PhpBestPractice\presentation\controllers\SignUpController
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
        $this->expectError();
        
        $body = [
            "email" => "any@email.com",
            "password" => "any_password",
            "passwordConfirmation" => "any_password"
        ];

        $response = json_decode($this->sut->handle(json_encode($body)));

        $this->assertEquals(400, $response->statusCode);

        $this->expectErrorMessage('Missing param: name');

        \trigger_error('Missing param: name', \E_USER_ERROR);
    }
}