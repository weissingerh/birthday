<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateGuestRequest;
use App\Http\Requests\ShowGuestInvitationRequest;

class GuestController extends Controller
{
    public function show(ShowGuestInvitationRequest $request, Guest $guest){
        return view('guest.show')->with('guest', $guest);
    }

    public function update(UpdateGuestRequest $request, Guest $guest){
        $coming = $request->has('coming') ? 1 : 0;
        $plus_one = $request->has('plus_one') && $coming;
        $plus_one_name = $request->has('plus_one_name') && $plus_one;
        $guest->update([
            'coming' => $coming,
            'plus_one' =>  $plus_one,
            'plus_one_name' => $plus_one_name ? $request->plus_one_name : null
        ]);
        $guest->save();
        dd($guest);
    }
}
