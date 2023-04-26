<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->guestService = new GuestService();
    }
    public function index()
    {
        $guests = $this->guestService->getComingGuests();
        $guestCount = $this->guestService->countComing();
        $drawings = Storage::disk('public')->allFiles('drawings');
        return view('index', [
            'guestCount' => $guestCount,
            'guestNames' => $guests['names'],
            'guests' => $guests['guests'],
            'drawings' => $drawings]);
    }

    public function admin()
    {
        $guests = Guest::all();
        $guests->map(function ($guest) {
            $guest->url = config('app.url') . "/guest/" . $guest->id . '?hash=' . Hash::make($guest->last_name);
        });
        return view('admin.index', ['guests' => $guests]);
    }
}
