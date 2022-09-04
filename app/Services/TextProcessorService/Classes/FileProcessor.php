<?php

namespace App\Services\TextProcessorService\Classes;

class FileProcessor
{
    /**
     * @param string $text
     * @return int
     */
    public function count(string $text): int
    {
        return $text !== '' ? substr_count($text, "\n") : 0;
    }

    /**
     * @param string $file full path name
     * @return int
     */
    public function countInFile(string $file): int
    {
        return $this->count(file_get_contents(base_path("texts/{$file}") ?? ''));
    }

    /**
     * @param array $files
     * @return int
     */
    public function averageLineCountInFiles(array $files): int
    {
        $count = 0;
        foreach ($files as $file) {
            $count += $this->countInFile($file);
        }

        return $count > 0 ? round($count / sizeof($files)) : 0;
    }
}
