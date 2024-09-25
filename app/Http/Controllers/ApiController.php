<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];            
        $response = Http::post('http://127.0.0.1:8000/api/register', $data);

        if($response->successful()){
            return back()->with('info', 'Registro Completado');
        }else{
            return back()->with('error', 'Hubo un probrema en el registro');
        }
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([          
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        $data = [            
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $response = Http::post('http://127.0.0.1:8000/api/login', $data);
        $user = $response->object();            
        $token = $user->token;
        session(['token' => $token]);
    
        return redirect()->route('employee.index');
    }

    public function logut(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer' .session('toke')
        ])->post('http://127.0.0.1:8000/api/logout');

        Session::flush();

        return redirect('/login');
    }
}
