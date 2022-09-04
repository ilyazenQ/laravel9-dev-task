<?php

namespace App\Console\Commands;

use App\Services\Action\IsSeparatorAvailableAction;
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
        $sep = SeparatorsEnum::getCaseValue($this->argument('sep'));
        if(!$sep->isExistInEnum()) {
            $this->error("Не корректный разделитель");
            return ;
        }
        $userProcessor = new UserFromFile($sep->getValue());
        $users = $userProcessor->getUserList();
        foreach($users as $user) {
            $count = (new FileProcessor())->averageLineCountInFiles($user->files);
            $this->info("{$user->name} have {$count} average lines");
        }

    }
}
