<?php

namespace App\Http\Controllers\User;

use App\Models\Promo;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $travel = Travel::all();
        $promo = Promo::all();
        return view('pages.user.dashboard', compact('promo', 'travel'));
    }
}
