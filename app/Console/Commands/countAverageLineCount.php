<?php

namespace App\Console\Commands;

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
        $this->info("works2");
        return "its works";
    }
}
