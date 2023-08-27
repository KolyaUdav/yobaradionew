<?php

namespace App\Providers;

use App\Services\PictureService;
use Illuminate\Support\ServiceProvider;

class PictureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('picture', static fn():PictureService => app(PictureService::class));
    }

}
