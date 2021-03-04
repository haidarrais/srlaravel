<?php

namespace App\Http\Controllers\User;

use App\Models\Promo;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $travel = Travel::all();
        $promo = Promo::all();
        $investment = Investment::all();
        $homestayName = Cookie::get('homestayName');
        return view('pages.user.dashboard', compact('promo', 'travel', 'investment', 'homestayName'));
    }
}
