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
        return view('admin/kriteria',compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/kriteria');
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
        return redirect('admin/kriteria');
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
        $this->authorize('update',$kriteria);
        $kriteria = Kriteria::findorfail($id);
        return view('admin/edit-kriteria', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kriteria = Kriteria::findorfail($id);
        $kriteria->update($request->all());

        return redirect('admin/kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria, string $id)
    {
        $kriteria = Kriteria::findorfail($id);
        $kriteria->delete();

        return back();
    }
}
