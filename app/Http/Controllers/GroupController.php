<?php
namespace App\Http\Controllers;

use App\Models\TravelGroup;

class GroupController extends Controller
{
    public function index()
    {
        $groups = TravelGroup::all();

        return view('groups.index', compact('groups'));
    }
}
