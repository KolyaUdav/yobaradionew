<?php


namespace App\Services;

class MusicService
{

    public function __construct(private SoundService $soundService, private PictureService $pictureService)
    {
    }

    public function getMusicData(): array
    {
        $musicData = [];

        $musicData[] = $this->soundService->getSoundNames();
        $musicData[] = $this->pictureService->getPictureNames();

        return $musicData;
    }
}
