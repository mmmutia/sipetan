<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria/kriteria',compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria/kriteria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kriteria::create([
            'name'=>$request->name,
            'bobot'=>$request->bobot,
            'description'=>$request->description,
        ]);
        return redirect('/kriteria')->withSuccess('Tambah data berhasil!');
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
    public function edit(Kriteria $kriteria, string $id)
    {
        // $this->authorize('update',$kriteria);
        $kriteria = Kriteria::findorfail($id);
        return view('kriteria/edit-kriteria', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kriteria = Kriteria::findorfail($id);
        $kriteria->update($request->all());

        return redirect('/kriteria')->withInfo('Data berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Kriteria $kriteria, string $id)
    {
        $kriteria = Kriteria::findorfail($id);
        $kriteria->delete();


        return back()->withWarning('Data Berhasil Dihapus!');
    }
}
