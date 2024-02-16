<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Country\Country;
use App\Models\City\City;
use App\Models\Admin;

class AdminsController extends Controller
{
    //Auth
    public function viewLogin(){
        return view('admins.login');
    }

    public function checkLogin(Request $req){
        $remember_me = $req->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email'=> $req->input("email"), 'password' => $req->input('password')], $remember_me)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('admin.login');
    }


    //Dashboard
    public function index(){
        $cntCountry = Country::select()->count();
        $cntCity = City::select()->count();
        $cntAdmin = Admin::select()->count();
        return view('admins.dashboard', compact('cntCountry', 'cntCity', 'cntAdmin'));
    }

    //Admins Dashboard
        public function allAdmins(){
            $admins = Admin::select()->orderBy('id', 'asc')->get();
            return view('admins.dashboard.admins.index', compact('admins'));
        }

        public function createAdminsView(){
            return view('admins.dashboard.admins.create');
        }

        public function createAdmins(Request $req){
            Admin::create([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
            ]);
            return Redirect::route('admin.dashboard.admins')->with(['message'=>'Admin created successfully.']);
        }

        public function deleteAdmins(Request $req){
            Admin::where('id', $req->id)->delete();
            return Redirect::route('admin.dashboard.admins')->with(['message'=>'Admin deleted successfully.']);
        }

    //Countries Dashboard
        public function allCountries(){
            $countries = Country::select()->orderBy('id', 'asc')->get();
            return view('admins.dashboard.countries.index', compact('countries'));
        }

        public function createCountriesView(){
            return view('admins.dashboard.countries.create');
        }

        public function createCountries(Request $req){
            $imageName = $req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path('assets/images'), $imageName);

            Country::create([
                "name" => $req->name,
                "continent" => $req->continent,
                "population" => $req->population,
                "territory" => $req->territory,
                "avg_price" => $req->avg_price,
                "description" => $req->description,
                "image" => $imageName,
            ]);
            return Redirect::route('admin.dashboard.countries')->with(['message'=>'Country created successfully.']);
        }

        public function deleteCountries(Request $req){
            Country::where('id', $req->id)->delete();
            return Redirect::route('admin.dashboard.countries')->with(['message'=>'Country deleted successfully.']);
        }

    //Cities Dashboard
        public function allCities(){
            $cities = City::select()->orderBy('id', 'asc')->get();
            return view('admins.dashboard.cities.index', compact('cities'));
        }

        public function createCitiesView(){
            $countries = Country::select()->orderBy('id', 'asc')->get();
            return view('admins.dashboard.cities.create', compact('countries'));
        }

        public function createCities(Request $req){
            $imageName = $req->file('image')->getClientOriginalName();
            $req->file('image')->move(public_path('assets/images'), $imageName);

            City::create([
                "name" => $req->name,
                "country_id" => $req->selectCountry,
                "nbDays" => $req->nbDays,
                "price" => $req->price,
                "description" => $req->description,
                "image" => $imageName,
            ]);
            return Redirect::route('admin.dashboard.cities')->with(['message'=>'City created successfully.']);
        }

        public function deleteCities(Request $req){
            City::where('id', $req->id)->delete();
            return Redirect::route('admin.dashboard.cities')->with(['message'=>'City deleted successfully.']);
        }
}
