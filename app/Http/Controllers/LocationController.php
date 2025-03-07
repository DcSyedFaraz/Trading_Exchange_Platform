<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCitiesByState($stateCode)
    {
        // Get cities where state_code matches
        $cities = City::where('state_code', $stateCode)
            ->select('name')
            ->get();

        return response()->json($cities);
    }
}
