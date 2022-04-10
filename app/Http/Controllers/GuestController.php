<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Services\GuestService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateGuestRequest;
use App\Http\Requests\ShowGuestInvitationRequest;

class GuestController extends Controller
{
    public function __construct(){
        $this->guestService = new GuestService();
    }
    public function show(ShowGuestInvitationRequest $request, Guest $guest){
        return view('guest.show')->with('guest', $guest);
    }

    public function update(UpdateGuestRequest $request, Guest $guest){
        $coming = $request->has('coming') ? 1 : 0;
        $plus_one = $request->has('plus_one') && $coming;
        $plus_one_name = $request->has('plus_one_name') && $plus_one;
        $savedGuest = $this->guestService->updateGuest($guest, $coming, $plus_one, $plus_one_name);

        return redirect()->route('guest.draw', [$guest->id]);
    }

    public function draw(Guest $guest){
        return view('guest.draw')->with('guest', $guest);
    }

    public function saveDrawing(Request $request, Guest $guest){
        $drawing = $request['drawing'];
        $data = substr($drawing, strpos($drawing, ',') + 1);

        $data = base64_decode($data);
        Storage::disk('local')->put("1/test.png", $data);

        return redirect('/');
    }

}
