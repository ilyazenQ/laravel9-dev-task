<?php

namespace App\Services\TextProcessorService\Classes;

class Separator
{
    public function __construct(
        private string $value,
        private bool $isExistInEnum,
    )
    {
    }

    /**
     * @return bool
     */
    public function isExistInEnum(): bool
    {
        return $this->isExistInEnum;
    }

    /**
     * @param bool $isExistInEnum
     */
    public function setIsExistInEnum(bool $isExistInEnum): void
    {
        $this->isExistInEnum = $isExistInEnum;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
