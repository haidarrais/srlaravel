<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class BotTelegramController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'phoneNumber'=> 'required|min:9',
            'message'=> 'required'
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
    
            Telegram::sendMessage([
                "chat_id" => "@bogangspeed",
                "text" => "$name - +62$phoneNumber\n\n $message"
            ]);
            return FacadesRedirect::to('/user')
            ->with('user',$name);        
    }
}


