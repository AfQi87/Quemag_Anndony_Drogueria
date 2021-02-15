<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mtipo;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        $tipos = DB::table('tipo')->first();
        return view('auth.login', ['tipos' => $tipos]);
       
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|min:4',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
        ]);

        Auth::login($user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipopro'=> $request->tipopro,
            'estadoUser' => 1,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
