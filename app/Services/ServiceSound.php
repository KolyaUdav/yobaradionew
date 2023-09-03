<?php


namespace App\Services;

use App\Abstract\AbstractFile;
use App\Models\Sound;

class ServiceSound extends AbstractFile
{

    public function getSoundNames(): array
    {
        return parent::getFileNames('sounds');
    }

    public function save(array $fileNames): void
    {
        foreach ($fileNames as $name) {
            Sound::create([
                'name' => $name,
                'url' => parent::nameToUrl($name, config('dirs.sound')),
            ]);
        }
    }

    public function getUrl(int $id): string // TODO: ЗАГЛУШКА
    {
        return 'sound';
    }
}
