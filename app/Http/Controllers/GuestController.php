<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowGuestInvitationRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->guestService = new GuestService();
    }
    public function show(ShowGuestInvitationRequest $request, Guest $guest)
    {
        return view('guest.show')->with('guest', $guest);
    }

    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        $coming = $request->has('coming') ? 1 : 0;
        $plus_one = $request->has('plus_one') && $coming;
        $plus_one_name = $request->has('plus_one_name') && $plus_one;
        $savedGuest = $this->guestService->updateGuest($guest, $coming, $plus_one, $plus_one_name);

        return redirect()->route('guest.draw', [$guest->id]);
    }

    public function draw(Guest $guest)
    {
        return view('guest.draw')->with('guest', $guest);
    }

    public function saveDrawing(Request $request, Guest $guest)
    {
        $drawing = $request['drawing'];

        Storage::disk('local')->put($guest->id . "/test.svg", $drawing);

        return redirect('/');
    }

}
