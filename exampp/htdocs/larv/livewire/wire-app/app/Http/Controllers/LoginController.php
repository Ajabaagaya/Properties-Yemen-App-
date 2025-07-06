<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class LoginController extends Controller
{
    
    public function authenticate(Request $request):RedirectResponse
    {   
        $type = "";
     
        $credentials = $request->validate([
            "email"=>["required","email"],
            "password"=>["required"],
        ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        // if($request->admin){
        //     return redirect()->route("/admin");
        // }else if($request->tanant){
        //     return redirect()->route("property");
        // }
        // else if($request->owner){
        //     return redirect()->route("property/1");
        // }
      
        return redirect()->intended("dashboard");
    }
    return back()->withError([
        "email"=>"error "
    ])->onlyInput("email");
        
    }}
