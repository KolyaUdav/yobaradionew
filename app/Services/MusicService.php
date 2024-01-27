<?php


namespace App\Services;

use App\Models\Sound;
use App\Services\FilesHandle\PictureService;
use App\Services\FilesHandle\SoundService;

class MusicService
{

    public function __construct(
        private SoundService $soundService,
        private PictureService $pictureService,
        private CacheSoundService $cacheSoundService,
    )
    {}

    public function getTrack(): string
    {
        $trackData = $this->cacheSoundService->getSoundNonCached($this->soundService->getSavedData(new Sound));
        $trackUrl = '';

        if (!empty($trackData)) {
            $trackUrl = $trackData['url'];
        }

        return $trackUrl;
    }

    public function updateMusicData(): void
    {
        $names = $this->soundService->getSoundNames();

        $this->pictureService->deleteSavedPic();
        $this->soundService->deleteSavedSound();

        foreach ($names as $name) {
            $sound = $this->soundService->save($name);
            $picture = $this->pictureService->save($name);

            $sound->picture()->save($picture);
            $picture->sound()->save($sound);

        }
    }
}
