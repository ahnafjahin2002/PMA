<?php

namespace App\Http\Controllers;

use App\Models\DestinationAttraction;
use Illuminate\Http\Request;

class DestinationAttractionController extends Controller
{
    public function index()
    {

        $destinationsAttractions = DestinationAttraction::all();

        return view('destinations.index', compact('destinationsAttractions'));
    }
    public function show($id)
    {
        $destinationAttraction = DestinationAttraction::findOrFail($id);

        return view('destinations.show', compact('destinationAttraction'));
    }

}
