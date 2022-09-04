<?php

namespace App\Services\TextProcessorService\Classes;

interface FileProcessorInterface
{
    public function getResult(array $files):int;
}
