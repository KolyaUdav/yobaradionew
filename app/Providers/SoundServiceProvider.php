<?php

namespace App\Providers;

use App\Services\ServiceSound;
use Illuminate\Support\ServiceProvider;

class SoundServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('sound', static fn():ServiceSound => app(ServiceSound::class));
    }
}
