<?php

namespace App\Services\TextProcessorService;


use App\Services\TextProcessorService\Classes\Separator;

enum SeparatorsEnum: string
{
    case comma = ",";
    case semicolon = ";";

    static function getCaseValue(string $sep): Separator
    {

        foreach (self::cases() as $case) {
            if ($case->name === $sep) {
                return new Separator($case->value,true);
            }
        }
         return new Separator('',false);
    }
}
