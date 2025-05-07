<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
class TravelPackageController extends Controller
{
    public function index(Request $request)
    {
        $query = TravelPackage::query();
        
        if ($request->has('filter')) {
            if ($request->filter == 'eco') {
                $query->where('eco_friendly', 'eco');
            } elseif ($request->filter == 'non-eco') {
                $query->where('eco_friendly', 'non-eco');
            }
        }
       
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orwhere('eco_friendly', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $packages = $query->get();

        return view('packages.index', compact('packages'));
    }

    public function show($id)
    {
        $package = TravelPackage::findOrFail($id);
        return view('packages.show', compact('package'));
    }
}
