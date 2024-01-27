<?php

namespace App\Http\Controllers;


use App\Services\MusicService;
use Illuminate\View\View;

class TracksController extends Controller
{

    public function __construct(private MusicService $musicService)
    {
    }

    public function getTrack(): View
    {
        return view('welcome', ['url' => $this->musicService->getTrack()]);
    }

    public function updateData(): View
    {
        $this->musicService->updateMusicData();

        return view('welcome');
    }
}
