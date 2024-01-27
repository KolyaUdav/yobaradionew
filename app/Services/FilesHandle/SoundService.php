<?php


namespace App\Services\FilesHandle;


use App\Models\Sound;

class SoundService extends Service implements IService
{

    public function getSoundNames(): array
    {
        return parent::getFileNames(config('dirs.sound'), 'mp3');
    }

    public function save(string $name): Sound
    {
        $sound = new Sound;
        $sound->name = $name;
        $sound->url = parent::nameToUrl($name, config('dirs.sound'));
        $sound->save();

        return $sound;
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
