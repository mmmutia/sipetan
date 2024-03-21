<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin/users',compact('user'));
    }

    public function profile()
    {
        $user = User::all();
        return view('auth/profile',compact('user'));
    }

    public function userexport(){
        return Excel::download(new UsersExport, 'data_user.xlsx');
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
        //
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
        $user = User::findorfail($id);
        return view('auth/profile', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    $request->validate([
        'name'=>['string','min:3','max:191','required'],
        'email'=>['email','string','min:3','max:191','required'],
    ]);

    auth()->user()->update([
        'name'=>$request->name,
        'email'=>$request->email,
    ]);
    return redirect()->withInfo('Data berhasil di update!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string $id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return back();
    }
}
