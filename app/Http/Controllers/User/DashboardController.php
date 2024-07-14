<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use App\Models\Residence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_residence = Residence::count();
        $count_legal = Legal::count();
        $legal = Legal::with('user', 'residence')->limit(5)->get();

        return view('pages.user.index', compact('count_residence', 'count_legal', 'legal'));
    }
}
