<?php


namespace App\Abstract;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

abstract class AbstractFile
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

    protected function nameToUrl(string $name, string $folder): string
    {
        return URL::to('/') . '/' . $folder . '/' . str_replace(' ', '_', $name);
    }

    public abstract function getUrl(int $id): string;

    public abstract function save(array $fileNames): void;
}
