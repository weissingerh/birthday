<?php

namespace App\Services;

use App\Models\Guest;

class GuestService
{

    public static function updateGuest(Guest $guest, $coming, $plus_one, $plus_one_name)
    {
        $guest->update([
            'coming' => $coming,
            'plus_one' => $plus_one,
            'plus_one_name' => $coming && $plus_one ? $plus_one_name : null,
        ]);
        $guest->save();
        return $guest;
    }
    public static function getComingGuests()
    {
        $allGuests = Guest::isComing()->get();
        $names = collect();

        $allGuests->map(function ($guest) use ($names) {
            $names = $names->push($guest->name);
            if ($guest->plus_one && $guest->plus_one_name) {
                $names->push($guest->plus_one_name);
            }
        });

        return $names;
    }
}
