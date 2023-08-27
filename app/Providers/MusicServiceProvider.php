<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MusicService;

class MusicServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        app()->singleton('music', static fn():MusicService => app(MusicService::class));
    }
}
