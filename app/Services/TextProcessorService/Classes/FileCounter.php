<?php

namespace App\Services\TextProcessorService\Classes;

class FileCounter implements FileProcessorInterface
{
    public function count(string $text): int
    {
        return $text !== '' ? substr_count($text, "\n") : 0;
    }


    public function countInFile(string $file): int
    {
        return $this->count(file_get_contents(base_path("texts/{$file}") ?? ''));
    }


    public function getResult(array $files): int
    {
        $count = 0;
        foreach ($files as $file) {
            $count += $this->countInFile($file);
        }

        return $count > 0 ? round($count / sizeof($files)) : 0;
    }
}
