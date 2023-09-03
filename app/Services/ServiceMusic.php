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

        $this->servicePicture->save($pictureNames);
        $this->serviceSound->save($soundNames);

        $musicData[] = $soundNames;
        $musicData[] = $pictureNames;

        return $musicData;
    }
}
