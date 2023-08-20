<?php

namespace App\Providers;

use App\Services\SoundService;
use Illuminate\Support\ServiceProvider;

class SoundServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('Sound', static fn():SoundService => app(SoundService::class));
    }
}
