<?php


namespace App\Services;

use App\Abstract\AbstractFile;
use App\Models\Sound;

class ServiceSound extends AbstractFile
{

    public function getSoundNames(): array
    {
        return parent::getFileNames(config('dirs.sound'), 'mp3');
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

    public function deleteSavedSound(): void
    {
        parent::deleteSaved(new Sound);
    }

    public function getSavedSoundNames(): array
    {
        return parent::getSavedNames(new Sound);
    }

    public function getSavedSoundCount(): int
    {
        return parent::getSavedCount(new Sound);
    }
}
