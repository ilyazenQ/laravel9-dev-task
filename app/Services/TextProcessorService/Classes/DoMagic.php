<?php

namespace App\Services\TextProcessorService\Classes;

use App\Services\TextProcessorService\SeparatorsEnum;
use Illuminate\Support\Facades\Artisan;


class DoMagic
{
    public function __construct(
        public FileProcessorInterface $processor,
        private string                $sep,
    )
    {
    }

    public function handle()
    {
        $sep = SeparatorsEnum::getCaseValue($this->sep);
        if (!$sep->isExistInEnum()) {
            throw new \RuntimeException('Wrong user separator');
            return;
        }
        $userProcessor = new UserFromFile($sep->getValue());
        $users = $userProcessor->getUserList();
        foreach ($users as $user) {
            $fileProcessor = new FileProcessor(
                $this->processor
            );
            $count = $fileProcessor->processor->getResult($user->files);
            if ($this->processor instanceof FileCounter) {
                print("{$user->name} have {$count} average lines \n");
            } elseif($this->processor instanceof FileReplacer) {
                print("{$user->name} have {$count} replaces \n");
            }
        }
    }
}
