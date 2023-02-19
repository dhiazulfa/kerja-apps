<?php

namespace App\Http\Controllers;

use App\Models\EmployeePayment;
use App\Models\Rekening;
use App\Models\Employee;
use App\Models\AcceptedTask;
use Illuminate\Http\Request;

class EmployeePaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = EmployeePayment::all();
        return view('admin.data-pembayaran.index',[
            'payments' => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-pembayaran.create', [
            'rekenings' => Rekening::where('jenis_rekening','=','rekening_bank')->get(),
            'tasks' => AcceptedTask::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rekening_id' => 'required',
            'accepted_id' => 'required',
            'jumlah' => 'required',
            'bukti_pembayaran' => 'required|image',
        ]);

        $employee = EmployeePayment::create([
            'rekening_id' => $request->input('rekening_id'),
            'accepted_id' => $request->input('accepted_id'),
            'jumlah' => $request->input('jumlah'),
            'bukti_pembayaran' => $request->file('bukti_pembayaran')->store('pembayaran/bukti_pembayaran'),
            ]);

        return redirect('/admin/data-pembayaran')->with('success', 'Data Pembayaran berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePayment $employeePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeePayment  $employeePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePayment $employeePayment)
    {
        //
    }
}
