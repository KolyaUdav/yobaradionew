<?php


namespace App\Services;

use App\Abstract\AbstractFile;
use App\Models\Picture;

class ServicePicture extends AbstractFile
{

    public function getPictureNames(): array
    {
        return parent::getFileNames(config('dirs.pic'), 'jpg');
    }

    public function save(array $fileNames): void
    {
        foreach ($fileNames as $name) {
            Picture::create([
                'url' => parent::nameToUrl($name, config('dirs.pic')),
            ]);
        }
    }

    public function deleteSavedPic(): void
    {
        parent::deleteSaved(new Picture);
    }

    public function getSavedPicNames(): array
    {
        return parent::getSavedNames(new Picture);
    }

    public function getSavedPicCount(): int
    {
        return parent::getSavedCount(new Picture);
    }
}
