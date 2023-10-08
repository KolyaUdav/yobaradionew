<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceMusic;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GetTrackController extends Controller
{

    public function __construct(private ServiceMusic $musicService)
    {
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        return view('welcome', ['url' => $this->musicService->getTrack()]);
    }
}
