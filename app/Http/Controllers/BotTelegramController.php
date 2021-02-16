<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Spatie\Emoji\Emoji;

class BotTelegramController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'phoneNumber'=> 'required|min:9',
            'message'=> 'required',
            'kebersihan' =>"required",
            'pelayanan' =>"required",
            'lokasi' =>"required",
            'fasilitas' =>"required",
        ];
        $validated = Validator::make($request->all(), $rules);
    
        if($validated->fails())
        {
            return FacadesRedirect::to('/user')
        ->with('errorMessage','Please fill out with the valid input');
        }
        
            $name = $request->input("name");
            $phoneNumber = $request->input("phoneNumber");
            $message = $request->input("message");
            $kebersihan = $request->input("kebersihan");
            $pelayanan = $request->input("pelayanan");
            $lokasi = $request->input("lokasi");
            $fasilitas = $request->input("fasilitas");

            function StarCounter($value){
                $stars = '';
                for ($i=0; $i < $value; $i++) { 
                    $stars = $stars.Emoji::CHARACTER_STAR;
                }
                return $stars;
            };
            $hasilKebersihan = StarCounter($kebersihan);
            $hasilPelayanan = StarCounter($pelayanan);
            $hasilLokasi = StarCounter($lokasi);
            $hasilFasilitas = StarCounter($fasilitas);
            Telegram::sendMessage([
                "chat_id" => "@bogangspeed",
                "text" => "$name - +62$phoneNumber\n\n".
                    "Kebersihan : $hasilKebersihan\n".
                    "Pelayanan : $hasilPelayanan\n".
                    "Lokasi : $hasilLokasi\n".
                    "Fasilitas : $hasilFasilitas\n\n".
                    "Pesan : $message"
            ]);
            return FacadesRedirect::to('/user')
            ->with('user',$name);        
    }
}


