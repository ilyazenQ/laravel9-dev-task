<?php

namespace App\Console\Commands;

use App\Services\TextProcessorService\Classes\DoMagic;
use App\Services\TextProcessorService\Classes\FileCounter;
use App\Services\TextProcessorService\Classes\FileProcessor;
use App\Services\TextProcessorService\Classes\FileReplacer;
use App\Services\TextProcessorService\Classes\UserFromFile;
use App\Services\TextProcessorService\SeparatorsEnum;
use Illuminate\Console\Command;

class replaceDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'textProcessor:replace {sep}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Поместить тексты пользователей в папку ./output_texts,
    заменив в каждом тексте даты в формате dd/mm/yy на даты в формате mm-dd-yyyy.
    Вывести на экран количество совершенных для каждого пользователя замен вместе с именем пользователя.';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        $this->info('Replace dates start');
        $sep = $this->argument('sep');
        $magic = new DoMagic(
            (new FileReplacer()),
            $sep
        );
        $magic->handle();
        $this->info('Replace dates done');
    }
}
