<?php


namespace App\Services;

class ServiceMusic
{

    public function __construct(private ServiceSound $serviceSound, private ServicePicture $servicePicture)
    {
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
