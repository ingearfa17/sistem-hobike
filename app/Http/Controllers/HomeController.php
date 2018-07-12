<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use App\Member;
use App\Hotel;
use App\Sewa;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Mapper::map(-6.966667, 110.416664, ['symbol' => 'circle', 'scale' => 1000]);
        $mapArrays = Hotel::all();

    // Change the lat and long to your default location.
        Mapper::map(-6.966667, 110.416664);    

        foreach($mapArrays as $location)
        {
            Mapper::marker($location->lat, $location->long);
        }


        $bike = Bike::all();
        $member = Member::all();
        $hotel = Hotel::all();
        $sewa = Sewa::all();
        // $operator = Operator::all();

        return view('home', compact('bike', 'member', 'hotel', 'map', 'sewa'));
    }

    // public function maps()
    // {
    //     $response = \GoogleMaps::load('geocoding')
    //     ->setParam (['address' =>'santa cruz'])
    //     ->get();
    //     # code...
    // }
}
