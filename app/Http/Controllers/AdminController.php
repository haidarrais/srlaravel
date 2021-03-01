<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.login');
    }
    public function signin(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required'
        ]);

        $adminInfo = Admin::where('username', '=', $request->username)->first();
        $adminInfo = Admin::where('password', '=', $request->password)->first();
        
        if(!$adminInfo){
            return back()->with('fail', 'Username anda tidak terdaftar sebagai admin');
        }else {
            if($adminInfo){
                $request->session()->put('LoggedAdmin', $adminInfo->username);
                return redirect('admin');
            }else {
                return back()->with('fail', 'username or password is wrong');
            }
        }
    }
    public function signout()
    {
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('admin/login');
        }
    }
}
