<?php

namespace App\Http\Controllers;

use App\Models\Subregion;
use Illuminate\Http\Request;

class AdminSubregionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.data-sub-region.index',[
            'subregions' => Subregion::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-sub-region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kabupaten' => 'required | max:255',
        ]);

        Subregion::create($validatedData);
        return redirect('/admin/data-sub-region')->with('success', 'Data Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subregion  $subregion
     * @return \Illuminate\Http\Response
     */
    public function show(Subregion $subregion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subregion  $subregion
     * @return \Illuminate\Http\Response
     */
    public function edit(Subregion $subregion)
    {
        return view('admin.data-sub-region.edit',[
            'subregion' => $subregion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subregion  $subregion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subregion $subregion)
    {
        $rules = [
            'name' => 'required | max:255'
        ];

        $validatedData = $request->validate($rules);

        Subregion::where('id', $subregion->id)->update($validatedData);
        return redirect('/admin/data-sub-region')->with('success', 'Data Kabupaten has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subregion  $subregion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        if (!$region) {
            return redirect('/admin/data-sub-region')->with('error', 'Data Provinsi tidak ditemukan.');
        }
        $region->delete();
    
        return redirect('/admin/data-sub-region')->with('success', 'Data Provinsi dihapus!');
    }
}
