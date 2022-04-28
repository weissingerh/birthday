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
        $plus_one_name = $request->has('plus_one_name') && $plus_one ? $request->plus_one_name : null;
        $savedGuest = $this->guestService->updateGuest($guest, $coming, $plus_one, $plus_one_name);

        if ($savedGuest->coming == 1) {
            return redirect()->route('guest.draw', [$guest->id]);
        }
        return redirect()->route('guest.notcoming', [$guest->id]);
    }

    public function draw(Guest $guest)
    {
        return view('guest.draw')->with('guest', $guest);
    }

    public function notComing(Guest $guest)
    {
        return view('guest.notcoming')->with('guest', $guest);
    }
    public function saveDrawing(Request $request, Guest $guest)
    {
        $drawing = $request['drawing'];
        $imgUrl = $this->guestService->setFileName($guest);
        Storage::disk('public')->put($imgUrl, $drawing);

        $guest->img = $imgUrl;
        $guest->save();

        return redirect()->route('guest.thanks', [$guest->id]);
    }

    public function thanks(Guest $guest)
    {
        return view('guest.thanks')->with('guest', $guest);
    }

}
