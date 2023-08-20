<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MusicService;

class MusicServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        app()->singleton('Music', static fn():MusicService => app(MusicService::class));
    }
}
