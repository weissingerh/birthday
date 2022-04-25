<?php

namespace App\Rules;

use App\Models\Guest;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class NameHash implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($this->guest->last_name, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Hash stimmt nicht.';
    }
}
