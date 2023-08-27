<?php


namespace App\Services;

use App\Abstract\FileAbstract;

class SoundService extends FileAbstract
{

    public function getSoundNames(): array
    {
        return parent::getFileNames('sounds');
    }

    public function getUrl(int $id): string // TODO: ЗАГЛУШКА
    {
        return 'sound';
    }
}
