<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $name = "";
        if($request->hasfile('profile_pic'))
        {
           $path = "upload/profile/";
           $name = $request->file('profile_pic')->getClientOriginalName();
           $request->file('profile_pic')->move($path, $name); 
        } 
        $request->profile_pic =  $name;
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('send-mail')->with('success', "Account successfully registered.");
    }
}
?>