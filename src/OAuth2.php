<?php

namespace Ekopras18\Satusehat;

class  OAuth2
{
    public function generateToken(): string
    {
        return rand(100000, 999999);
    }
}