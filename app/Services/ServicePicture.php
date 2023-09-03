<?php


namespace App\Services;

use App\Abstract\AbstractFile;
use App\Models\Picture;

class ServicePicture extends AbstractFile
{

    public function getPictureNames(): array
    {
        return parent::getFileNames('pictures');
    }

    public function getUrl(int $id): string // TODO: ЗАГЛУШКА
    {
        return 'pic';
    }

    public function save(array $fileNames): void
    {
        foreach ($fileNames as $name) {
            Picture::create([
                'url' => parent::nameToUrl($name, config('dirs.pic')),
            ]);
        }
    }
}
