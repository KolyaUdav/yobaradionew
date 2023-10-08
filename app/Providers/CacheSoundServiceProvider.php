<?php

namespace App\Providers;

use App\Services\ServiceCacheSound;
use Illuminate\Support\ServiceProvider;

class CacheSoundServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('picture', static fn():ServiceCacheSound => app(ServiceCacheSound::class));
    }
}
