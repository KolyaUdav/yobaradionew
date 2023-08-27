<?php


namespace App\Abstract;

use Illuminate\Support\Facades\Storage;

abstract class FileAbstract
{

    protected function getFileNames(string $folder): array
    {
        $fileNames = [];

        $files = Storage::disk('local')->files($folder);

        foreach ($files as $file) {
            $fileNames[] = basename($file);
        }

        return $fileNames;
    }

    public abstract function getUrl(int $id): string;
}
