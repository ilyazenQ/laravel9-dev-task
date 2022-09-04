<?php

namespace App\Services\TextProcessorService\Classes;

class UserSelf
{
    public function __construct(
        public int $id,
        public string $name,
        public array $files,
        public array $args=[],
    )
    {
    }
}
