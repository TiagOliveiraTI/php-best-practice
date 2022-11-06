<?php

use Otaodev\PhpBestPractice\presentation\controllers\SignUpController;
use PHPUnit\Framework\TestCase;

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
        $body = [
            "email" => "any@email.com",
            "password" => "any_password",
            "passwordConfirmation" => "any_password"
        ];

        $response = json_decode($this->sut->handle(json_encode($body)));

        $this->assertEquals(400, $response->statusCode);
    }
}