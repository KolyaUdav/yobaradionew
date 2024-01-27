<?php


namespace App\Services\FilesHandle;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function getSavedData(Model $model, array|string $columns = []): array
    {
        if (empty($columns)) {
            return $model::all()->toArray();
        } else {
            return $model::all($columns)->toArray();
        }
    }

    protected function getFileNames(string $folder, string|array $allowedExt = ''): array
    {
        $fileNames = [];

        $files = Storage::disk('local')->files($folder);

        foreach ($files as $file) {
            $ext = pathinfo($file, PATHINFO_EXTENSION);

            if ($this->isMatchExt($ext, $allowedExt)) {
                $fileNames[] = basename($file);
            }
        }

        return $fileNames;
    }

    protected function nameToUrl(string $name, string $folder): string
    {
        return asset($folder . '/' . $name);
    }

    protected function getSavedNames(Model $model): array
    {
        $names = [];
        $results = $this->getSavedData($model, 'name');

        foreach ($results as $result) {
            $names[] = $result['name'];
        }

        return $names;
    }

    protected function getSavedCount(Model $model): int
    {
        return $model::count();
    }

    protected function deleteSaved(Model $model): void
    {
        $model::truncate();
    }

    private function isMatchExt(string $ext, string|array $allowedExt): bool
    {
        $isMatch = true;

        if (is_array($allowedExt) && !empty($allowedExt)) {
            foreach ($allowedExt as $value) {
                $isMatch = $ext == $value;

                if ($isMatch) {
                    break;
                }
            }
        } else {
            $isMatch = !empty($allowedExt) && $ext == $allowedExt;
        }

        return $isMatch;
    }
}
