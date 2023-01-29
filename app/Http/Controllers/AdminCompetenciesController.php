<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use Illuminate\Http\Request;

class AdminCompetenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.competencies.index', [
            'competencies' => Competency::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.competencies.create');
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
            'name' => 'required | max:255',
            'slug'  => 'required | unique:competencies'
        ]);

        Competency::create($validatedData);
        return redirect('/admin/competencies')->with('success', 'New Competency has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function show(Competency $competency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function edit(Competency $competency)
    {
        return view('admin.competencies.edit',[
            'competency' => $competency
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency)
    {
        $rules = [
            'name' => 'required | max:255'
        ];

        //validasi slug
        if($request->slug != $competency->slug){
            $rules ['slug'] = 'required | unique:competencies';
        }

        $validatedData = $request->validate($rules);

        Competency::where('id', $competency->id)->update($validatedData);
        return redirect('/admin/competencies')->with('success', 'Competency has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competency  $competency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency)
    {
        Competency::destroy($competency->id);
        return redirect('/admin/competencies')->with('success', 'Competency has been deleted');
    }
}
