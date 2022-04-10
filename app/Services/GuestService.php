<?php

namespace App\Services;

use App\Models\Guest;

class GuestService{

    public static function updateGuest(Guest $guest, $coming, $plus_one, $plus_one_name){
        $guest->update([
            'coming' => $coming,
            'plus_one' =>  $plus_one,
            'plus_one_name' => $coming && $plus_one ? $plus_one_name : null
        ]);
        $guest->save();
        return $guest;
    }
}
