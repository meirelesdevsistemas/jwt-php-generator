<?php

declare(strict_types=1);

namespace Test\Entity;

use Daniel\JwtPHPGenerator\Entity\JwtPHPGenerator;
use PHPUnit\Framework\TestCase;

class JwtPHPGeneratorTest extends TestCase
{
    protected $instance;
    protected $data;

    protected function setUp(): void
    {
        $this->instance = new JwtPHPGenerator('secret_key');
        $this->data = [
            "id" => 1,
            "name" => 'Tester',
            "email" => 'tester@testes.com.br'
        ];
    }
    public function testShouldCreateAJWTString()
    {
        $data = $this->data;
        $jwtGenerator = $this->instance;
        $token = $jwtGenerator->create($data);

        $this->assertIsString($token);
    }
    public function testValidateToken()
    {
        $data = $this->data;
        $jwtGenerator = $this->instance;
        $token = $jwtGenerator->create($data);
        $response = $jwtGenerator->validate($token);
        $this->assertEquals($this->data, $response);
    }
    public function testIsAnInvalidToken()
    {
        $data = [
            "id"=>2,
            "name"=>"Tester",
            "email" =>"tester@testes.com.br"
        ];
        $jwtGenerator = $this->instance;
        $token = $jwtGenerator->create($this->data);
        $response = $jwtGenerator->validate($token);
        $this->assertNotEquals($data, $response);
    }
}