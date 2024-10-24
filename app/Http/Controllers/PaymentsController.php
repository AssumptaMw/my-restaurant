<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\User;
use App\Notifications\SendPaymentEmail;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payments::all();
        return $payment;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentsRequest $request)
    {
        $payment = new Payments;
        $payment->user_id = $request->user_id;
        $payment->order_id = $request->order_id;
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;
        $payment->payment_status = $request->payment_status;
        
        $payment-> save();

        //send email
        $user = User::find($request->user_id);
        $user->notify(new SendPaymentEmail($user, $payment));

        return $payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentsRequest $request, Payments $payments)
    {
        $order = Payments::find($request->id);
        $payment->user_id = $request->user_id;
        $payment->order_id = $request->order_id;
        $payment->payment_type = $request->payment_type;
        $payment->amount = $request->amount;
        $payment->payment_status = $request->payment_status;
        
        $payment-> save();

        return $payment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
