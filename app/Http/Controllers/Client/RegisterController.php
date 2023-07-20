<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   
    public function registerForm()
    {
        return view('sections.client-side.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'unique:clients, email,'.$request->get('id')],
            'password'=>['required', 'confirmed'],
        ]);
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('client')->login($client);

        return redirect()->route('client.dashboard');
    }

    public function loginForm()
    {
        return view('sections.client-side.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('client')->attempt(['email'=> $request->email, 'password'=> $request->password ])) {
            $request->session()->regenerate();
            return redirect()->route('client.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not  match our records !',
        ]);
        
    }

    public function logout()
    {
        auth()->guard('client')->logout();

        return redirect()->route('client.login');
    }
}
