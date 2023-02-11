<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Task;
use App\Models\AcceptedTask;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = Auth::user();
        $client_id = Client::where('user_id', $user->id)->pluck('user_id')->first();

        $payments = Payment::with('task','task.task')->where('client_id', $client_id)->get();
        // dd($payments[0]->task);
        return view('admin.clients-payment.index', [
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
        //
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
            'client_id' => 'required',
            'accepted_id' => 'required',
            'foto_bukti' => 'required|image',
        ]);

        $payment = Payment::create([
            'client_id' => $request->input('client_id'),
            'accepted_id' => $request->input('accepted_id'),
            'status' => 'waiting',
            'foto_bukti' => $request->file('foto_bukti')->store('payments/foto_bukti')
            ]);

        return redirect('/admin/clients-payment')->with('success', 'Pembayaran telah dilakukan! Tunggu verifikasi dari admin!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acceptedTask = AcceptedTask::find($id);
    
        if (!$acceptedTask) {
            return redirect()->back()->with('error', 'Accepted task not found');
        }
    
        $employee = Employee::where('user_id', $acceptedTask->employee_id)->first();
    
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found');
        }
    
        return view('admin.clients-payment.edit',[
            'acceptedTask' => $acceptedTask,
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
