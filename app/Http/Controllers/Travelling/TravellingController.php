<?php

namespace App\Http\Controllers\Travelling;
use App\Models\City\City;
use App\Models\Country\Country;

use App\Http\Controllers\Controller;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TravellingController extends Controller
{
    //
    public function about($id)
    {
        $cities = City::select()->orderBy('id', 'asc')->take(5)->where('country_id', $id)->get();
        $country = Country::find($id);
        $citiesCount = City::select()->where('country_id', $id)->count();
        return view('travelling.about', compact('cities', 'country', 'citiesCount'));
    }

    public function makeReservation($id)
    {
        $city = City::find($id);
        return view('travelling.reservation', compact('city'));
    }

    public function storeReservation(Request $req, $id)
    {
        $city = City::find($id);
        $totalPrice = (int) $city->price * (int) $req->nbGuests;
        if ($req->checkin_date > date('Y-m-d')) {
            $storeRes = Reservation::create([
                'name' => $req->name,
                'phone' => $req->phone,
                'nbGuests' => $req->nbGuests,
                'checkin_date' => $req->checkin_date,
                'destination' => $req->destination,
                'price' => $totalPrice,
                'user_id' => Auth::user()->id,
            ]);
            if ($storeRes) {
                Session::flash('price', $totalPrice);
                Session::flash('cityname', $city->name);
                Session::flash('cityimg', $city->image);
                return Redirect::route('travelling.reservation.success');
            }
        } else {
            echo 'Invalid date';
        }
    }

    public function success()
    {
        if (Session::get('cityname')) {
            return view('travelling.reservation.success');
        } else {
            return response('Page not found', 400);
        }
    }

    public function deals()
    {
        $cities = City::select()->orderBy('id', 'asc')->take(4)->get();
        return view('travelling.deals', compact('cities'));
    }
}
