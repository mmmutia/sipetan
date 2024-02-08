<?php

namespace App\Http\Controllers;

use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Exports\SubdistrictExport;
use App\Exports\SubdistrictImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubdistrictTemplateExport;
use App\Imports\SubdistrictImport as ImportsSubdistrictImport;

class SubsidtrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subdistricts = Subdistrict::all();
        return view('admin/subdistrict',compact('subdistricts'));
    }

    public function subdistrictexport(){
        return Excel::download(new SubdistrictExport, 'data_kecamatan.xlsx');
    }

    public function subdistrictimport(Request $request){
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('Subdistrict', $nameFile);

        Excel::import(new ImportsSubdistrictImport, public_path("/Subdistrict/".$nameFile));
        return redirect('admin/subdistrict');
    }

    public function downloadTemplate()
    {
        return Excel::download(new SubdistrictTemplateExport, 'data_kecamatan_template.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/subdistrict');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subdistrict::create([
            'subdistrict'=>$request->subdistrict,
        ]);
        return redirect('admin/subdistrict');
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
    public function edit(Subdistrict $subdistrict, string $id)
    {
        $this->authorize('update', $subdistrict);
        $subdistrict = Subdistrict::findorfail($id);
        return view('admin/edit-subdistrict', compact('subdistrict'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subdistricts = Subdistrict::findorfail($id);
        $subdistricts->update($request->all());

        return redirect('admin/subdistrict');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subdistrict $subdistrict, string $id)
    {
        $subdistrict = Subdistrict::findorfail($id);
        $subdistrict->delete();

        return back();
    }
}
