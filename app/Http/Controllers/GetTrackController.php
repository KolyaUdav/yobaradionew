<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MusicService;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GetTrackController extends Controller
{

    public function __construct(private MusicService $musicService)
    {
    }

    public function show(): string //BinaryFileResponse
    {
        $musicData = $this->musicService->getMusicData();

        return implode(' ', $musicData[0]) . "\n" . implode(' ', $musicData[1]);
    }
}
