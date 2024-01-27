<?php


namespace App\Services\FilesHandle;


use Illuminate\Database\Eloquent\Model;

interface IService
{

    public function save(string $name): Model;
}
