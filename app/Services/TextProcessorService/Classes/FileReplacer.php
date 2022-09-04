<?php

namespace App\Services\TextProcessorService\Classes;

class FileReplacer implements FileProcessorInterface
{
    public function replaceDates(string &$text): int
    {
        $count = 0;

        $text = preg_replace_callback('#\d{1,2}/\d{1,2}/\d{1,2}#', function ($matches) use (&$count) {
            $date = \DateTime::createFromFormat('d/m/y', $matches[0]);
            if ($date) {
                $count++;
                return $date->format('m-d-Y');
            }

            return $matches[0];
        }, $text);

        return $count;
    }

    public function replaceInFile(string $file): int
    {
        $text = file_get_contents(base_path("texts/{$file}") ?? '');
        $count = $this->replaceDates($text);
        $filename = basename($file);
        file_put_contents(base_path("output_texts/{$filename}"), $text);

        return $count;
    }

    public function getResult(array $files): int
    {
        $count = 0;
        foreach ($files as $file) {
            $count += $this->replaceInFile($file);
        }

        return $count;
    }
}
