<?php


namespace App\Services;


use Illuminate\Support\Facades\Cache;
use JetBrains\PhpStorm\ArrayShape;

class CacheSoundService
{

    private const CACHE_STORE_TTL = 7200;

    private const CACHE_STORE_KEY_PREFIX = 'yoba_url_';

    #[ArrayShape(['name' => "\array|int|string", 'url' => "mixed"])]
    public function getSoundNonCached(array $dataSaved): array
    {
        $dataSaved = $this->restructureData($dataSaved);
        $dataCached = array_filter((array)Cache::getMultiple(array_keys($dataSaved)));
        $dataCachedKeys = array_keys($dataCached);

        if (sizeof($dataCached) >= sizeof($dataSaved)) {
            Cache::deleteMultiple($dataCachedKeys);
        }

        $dataNonCached = array_diff($dataSaved, $dataCached);

        if (!empty($dataNonCached)) {
            $data = $dataNonCached;
        } else {
            $data = $dataSaved;
        }

        $result = $this->getSoundData($data);

        Cache::put(self::CACHE_STORE_KEY_PREFIX . $result['name'], $result['url'], self::CACHE_STORE_TTL);

        return $result;
    }

    public function isInCache(string $key): bool
    {
        return Cache::has($key);
    }

    private function restructureData(array $data): array
    {
        $dataRestructured = [];

        foreach ($data as ['id' => $id, 'name' => $name, 'url' => $url]) {
            $dataRestructured[self::CACHE_STORE_KEY_PREFIX . $name] = $url;
        }

        return $dataRestructured;
    }

    #[ArrayShape(['name' => "array|int|string", 'url' => "mixed"])]
    private function getSoundData(array $data): array
    {
        $key = array_rand($data);
        $resultName = $key;

        if (str_starts_with($key, self::CACHE_STORE_KEY_PREFIX)) {
            $resultName = implode(array_filter(explode(self::CACHE_STORE_KEY_PREFIX, $key)));
        }

        return ['name' => $resultName, 'url' => $data[$key]];
    }
}
