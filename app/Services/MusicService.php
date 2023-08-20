<?php

namespace App\Services;

use JetBrains\PhpStorm\Pure;

class MusicService
{

    public function __construct(private SoundService $soundService, private PictureService $pictureService)
    {
    }

    #[Pure] public function getMusicData(): array
    {
        $musicData = [];

        $musicData['soundUrl'] = $this->soundService->getSoundUrl(0);
        $musicData['pictureUrl'] = $this->pictureService->getPictureUrl(0);

        return $musicData;
    }
}
