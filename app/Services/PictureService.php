<?php


namespace App\Services;

use App\Abstract\FileAbstract;

class PictureService extends FileAbstract
{

    public function getPictureNames(): array
    {
        return parent::getFileNames('pictures');
    }

    public function getUrl(int $id): string // TODO: ЗАГЛУШКА
    {
        return 'pic';
    }
}
