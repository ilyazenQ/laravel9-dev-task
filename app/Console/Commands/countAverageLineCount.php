<?php

namespace App\Console\Commands;

use App\Services\Action\IsSeparatorAvailableAction;
use App\Services\TextProcessorService\Classes\DoMagic;
use App\Services\TextProcessorService\Classes\FileCounter;
use App\Services\TextProcessorService\Classes\FileProcessor;
use App\Services\TextProcessorService\Classes\UserFromFile;
use App\Services\TextProcessorService\SeparatorsEnum;
use Illuminate\Console\Command;

class countAverageLineCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'textProcessor:count {sep}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Для каждого пользователя посчитать среднее количество строк в его текстовых файлах
     и вывести на экран вместе с именем пользователя';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        $this->info('Average counter start');
        $sep = $this->argument('sep');
        $magic = new DoMagic(
            (new FileCounter()),
            $sep
        );
        $magic->handle();
        $this->info('Average counter done');
    }
}
