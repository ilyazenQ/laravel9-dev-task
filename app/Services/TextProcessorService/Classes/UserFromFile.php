<?php

namespace App\Services\TextProcessorService\Classes;

use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;


class UserFromFile
{
    private string $path;
    private array $userList = [];

    public function __construct(
        private string $sep,
    )
    {
        $this->path = base_path('people.csv');
    }


    public function getUserList()
    {
        SimpleExcelReader::create($this->path)
            ->noHeaderRow()
            ->useDelimiter($this->sep)
            ->getRows()
            ->each(function (array $rowProperties) {
                if (count($rowProperties) < 2) {
                    throw new \RuntimeException('Wrong user separator');
                }
                $files = $this->getListByUserId($rowProperties[0]);
                $userSelf = new UserSelf($rowProperties[0], $rowProperties[1], $files);
                $this->userList[] = $userSelf;
                var_dump($userSelf);
            });
        return $this->userList;
    }

    public function getListByUserId(int $id): array
    {
        $files = Storage::disk('texts')->files();
        $userFiles = [];
        foreach ($files as $fileName) {
            $idFromFile = explode('-', $fileName);
            if ((int)$idFromFile[0] == $id) {
                $userFiles[] = $fileName;
            }
        }
        return $userFiles;
    }


}
