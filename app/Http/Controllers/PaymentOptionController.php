<?php

namespace App\Http\Controllers;

use App\PaymentOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.payment_options.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'method' => 'required',
            'type' => 'required',
            'status' => 'required',
            'phone' => 'required'
        ]);

        $PaymentOptions = PaymentOption::create([
            'method' => $request->method,
            'type' => $request->type,
            'status' => $request->status,
            'phone' => $request->phone,
        ]);

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'New Payment Option Added Unsuccessfull!';
        if ($PaymentOptions) {
            $msg1 = 'message';
            $msg2 = 'New Payment Option Added!';
        }

        return Redirect::route('admin.paymentOption')->with($msg1, $msg2);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentOption $paymentOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentOption $paymentOption)
    {
        return view('dashboard.payment_options.edit', compact('paymentOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentOption $paymentOption)
    {
        // dd($request);
        $updatingPOption = PaymentOption::where('id', $request->id)->first();
        if ($updatingPOption) {
            $updatingPOption->update([
                'method' => $request->method,
                'type' => $request->type,
                'status' => $request->status,
                'phone' => $request->phone,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Payment Option Is Not Updated!';
        if ($updatingPOption) {
            $msg1 = 'message';
            $msg2 = 'Payment Option Is Updated!';
        }

        return Redirect::route('admin.paymentOption')->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentOption  $paymentOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentOption $paymentOption)
    {
        $deletePOption = PaymentOption::where('id', $paymentOption->id)->delete();

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Payment Option Has Not Been Deleted!';
        if ($deletePOption) {
            $msg1 = 'message';
            $msg2 = 'Payment Option Has Been Deleted!';
        }

        return Redirect::route('admin.paymentOption')->with($msg1, $msg2);
    }
}
