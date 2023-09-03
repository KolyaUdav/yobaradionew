<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ServiceMusic;

class MusicServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        app()->singleton('music', static fn():ServiceMusic => app(ServiceMusic::class));
    }
}
