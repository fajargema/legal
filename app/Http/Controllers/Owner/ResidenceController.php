<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Residence;

class ResidenceController extends Controller
{
    public function index()
    {
        $data = Residence::select('id', 'name', 'address')->get();

        return view('pages.owner.residence.index', compact('data'));
    }
}
