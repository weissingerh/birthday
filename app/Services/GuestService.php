<?php

namespace App\Services;

use App\Models\Guest;

class GuestService
{

    public static function updateGuest(Guest $guest, $coming, $plus_one, $plus_one_name, $beer, $wish)
    {
        if ($beer === '1') {
            $beer = 1;
        } else if ($beer === '0') {
            $beer = 0;
        } else {
            $beer = null;
        }

        $guest->plus_one = $plus_one;
        $guest->plus_one_name = $coming && $plus_one ? $plus_one_name : null;
        $guest->coming = $coming;
        $guest->beer = $beer;
        $guest->wish = $wish;
        $guest->save();

        return $guest;
    }

    public static function getComingGuests()
    {
        $allGuests = Guest::isComing()->orderBy('updated_at')->get();
        $names = collect();

        $allGuests->map(function ($guest) use ($names) {
            $names = $names->push($guest->name);
            if ($guest->plus_one && $guest->plus_one_name) {
                $names->push($guest->plus_one_name);
            }
        });

        return collect(['names' => $names, 'guests' => $allGuests]);
    }

    public static function countComing(): int {
        $countGuests = Guest::isComing()->count();
        $countPlusOne = Guest::isComing()->where('plus_one', true)->count();

        return $countGuests + $countPlusOne + 1;
    }
    public static function setFileName(Guest $guest): String
    {
        $plusOne = $guest->plus_one_name ? "&" . $guest->plus_one_name : "";
        return "drawings/" . $guest->id . "/" . $guest->name . "_" . substr($guest->last_name, 0, 1) . $plusOne . ".svg";
    }
}
