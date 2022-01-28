<?php

declare(strict_types=1);

namespace Daniel\JwtPHPGenerator\Entity;


class JwtPHPGenerator
{
    private string $secret_key;
    public function __construct(string $secret_key)
    {
        $this->secret_key = $secret_key;
    }
    public function create(array $data)
    {
        return implode('.', $data);
    }
}