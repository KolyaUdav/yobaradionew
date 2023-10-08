<?php


namespace App\Services;

use App\Models\Sound;

class ServiceMusic
{

    public function __construct(
        private ServiceSound $serviceSound,
        private ServicePicture $servicePicture,
        private ServiceCacheSound $serviceCache,
    )
    {}

    public function getTrack(): string
    {
        $trackData = $this->serviceCache->getSoundNonCached($this->serviceSound->getSavedData(new Sound));
        $trackUrl = '';

        if (!empty($trackData)) {
            $trackUrl = $trackData['url'];
        }

        return $trackUrl;
    }

    public function getMusicData(): array
    {
        $musicData = [];

        $soundNames = $this->serviceSound->getSoundNames();
        $pictureNames = $this->servicePicture->getPictureNames();

        $savedSoundCount = $this->serviceSound->getSavedSoundCount();

        if (sizeof($soundNames) !== $savedSoundCount) {
            $this->updateMusicData($soundNames, $pictureNames);
        }

        $musicData[] = $soundNames;
        $musicData[] = $pictureNames;

        return $musicData;
    }

    private function updateMusicData(array $soundNames, array $picNames): void
    {
            $this->serviceSound->deleteSavedSound();
            $this->servicePicture->deleteSavedPic();

            $this->serviceSound->save($soundNames);
            $this->servicePicture->save($picNames);
    }
}
