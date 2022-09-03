<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class replaceDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'textProcessor:replace';

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
        $this->info("works");

        return "works too";
    }
}
