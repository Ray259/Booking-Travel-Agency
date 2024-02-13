<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation\Reservation;


class UsersController extends Controller
{
    public function booking(){

        $booking = Reservation::where('user_id', Auth::user()->id)->get();

        return view('user.bookings', compact('booking'));
    }
}
