<?php


namespace App\Services\FilesHandle;


use App\Models\Picture;

class PictureService extends Service implements IService
{

    public function getPictureNames(): array
    {
        return parent::getFileNames(config('dirs.pic'), 'jpg');
    }

    public function save(string $name): Picture
    {
        $picture = new Picture;
        $picture->url = parent::nameToUrl($name, config('dirs.pic'));
        $picture->save();

        return $picture;
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
