<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function show(Flight $flight)
    {
        return view('flights.show', compact('flight'));
    }
}