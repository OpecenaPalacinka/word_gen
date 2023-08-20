<?php

namespace App\Service;

class GeneratorService
{

    public function __construct()
    {
    }

    public function generateWord(string $file): string
    {
        $file .= '15';
        return $file;
    }

}