<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $employee = Employee::where('user_id', $user->id)->first();
        $rekening = Rekening::where('employee_id', $employee->id)->get();

        return view('pekerja.rekening.index', [
            'rekening' => $rekening
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerja.rekening.create');
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
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
        ]);

        $user = Auth::user()->id;

        $employee_id = Employee::where('user_id', $user)->pluck('id')->first();

        $rekening = new Rekening();
        $rekening->employee_id = $employee_id;
        $rekening->nomor_rekening = $validatedData['nomor_rekening'];
        $rekening->nama_bank = $validatedData['nama_bank'];
        $rekening->nama_pemilik = $validatedData['nama_pemilik'];
        $rekening->save();

        return redirect('/pekerja/rekening')->with('success', 'Data rekening berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        //
    }
}
