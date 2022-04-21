<?php

namespace App\Http\Controllers;

use App\Services\GuestService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        return view('index')->with('guests', $guests);
    }
}
