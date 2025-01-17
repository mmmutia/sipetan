<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function postlogin(Request $request)
     {
         // Validasi input
         $request->validate([
             'email' => ['required', 'email', 'string', 'min:3', 'max:191'],
             'password' => ['required'],
         ]);

         // Lakukan proses otentikasi
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             // Jika berhasil login
             return redirect('home')->with('success', 'Login berhasil!');
         } else {
             // Jika username atau password salah
             return redirect()->back()->withInput()->with('error', 'Username atau password salah! Silahkan coba lagi.');
         }
     }




    public function logout(Request $request)
    {
       Auth::logout();
       return redirect('/')->withSuccess('Anda berhasil logout!');
    }

    public function index()
    {
        // $auth = Subdistrict::all();
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function simpanregistrasi(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_toker'=>Str::random(60),
        ]);
        return redirect('/login')->with('success', 'Berhasil Register!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
