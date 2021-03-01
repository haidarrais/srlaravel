<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    function fetchAPI(Request $request)
    {
        $key = '';
        if ($request->has("params")) {
            $key = $request->query("params");
        }else {
            dd('put parameter');
        }
        date_default_timezone_set('Asia/Jakarta');
        $response = Http::get('https://backoffice.syariahrooms.com/api/ct_prop', [
            'client_key' => 'qJRCK04wWxcoINai',
            'date' => date("j"),
            'night' => 1,
            'key_prop' => $key,
        ]);
        $homstayName = json_decode($response->body())->prop->namaHomestay;
        return redirect('/user')->with('homeStayName', $homstayName);
    }
}
