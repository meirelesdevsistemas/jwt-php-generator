<?php

declare(strict_types=1);

namespace Test\Entity;

use Daniel\JwtPHPGenerator\Entity\JwtPHPGenerator;
use PHPUnit\Framework\TestCase;

class JwtPHPGeneratorTest extends TestCase
{
    public function testShouldCreateAJWTString()
    {
        $data = [
            "id" => 1,
            "name" => 'Tester',
            "email" => 'tester@testes.com.br'
        ];
        $jwtGenerator = new JwtPHPGenerator('secret_key');
        $token = $jwtGenerator->create($data);

        $this->assertIsString($token);
    }
}