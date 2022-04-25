<?php

namespace App\Http\Requests;

use App\Rules\NameHash;
use Illuminate\Foundation\Http\FormRequest;

class ShowGuestInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->guest->exists(); //&& $this->guest->coming != 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hash' => [new NameHash($this->guest)],
        ];
    }
}
