<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
         $payments = Payment::all();
        return view ('payments.index')->with('payments', $payments);
    }

    public function create(){
         $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.create', compact('enrollments'));
    }

    public function store(request $request){
        $input = $request->all();
        Payment::create($input);
        return redirect('payments')->with('flash_message', 'Payment Addedd!');
    }

     public function show(string $id){
         $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
     }

      public function edit(string $id)
    {
         $payments = Payment::find($id);
         $enrollments = Enrollment::pluck('enroll_no', 'id');
         return view('enrollments.create', compact('payments','enrollments'));
    }

    public function update(Request $request, string $id)
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'Payment Updated!');
    }

     public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment deleted!');
    }
}


