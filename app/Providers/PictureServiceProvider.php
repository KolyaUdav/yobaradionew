<?php

namespace App\Providers;

use App\Services\ServicePicture;
use Illuminate\Support\ServiceProvider;

class PictureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('picture', static fn():ServicePicture => app(ServicePicture::class));
    }

}
