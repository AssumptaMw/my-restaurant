<?php

namespace App\Http\Controllers;

use App\Models\Order_details;
use App\Http\Requests\StoreOrder_detailsRequest;
use App\Http\Requests\UpdateOrder_detailsRequest;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_detail= Order_details::all();
        return $order_detail;
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
    public function store(StoreOrder_detailsRequest $request)
    {
        $order_detail = new Order_details;
        $order_detail->user_id = $request->user_id;
        $order_detail->order_type = $request->order_type;
        $order_detail->order_status = $request->order_status;
        $order_detail->order_total = $request->order_total;
        
        $order_detail-> save();

        return $order_detail;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order_details $order_details)
    {
        $order_detail = Order_details::find($request->id);
        $order_detail->user_id = $request->user_id;
        $order_detail->order_type = $request->order_type;
        $order_detail->order_status = $request->order_status;
        $order_detail->order_total = $request->order_total;
        
        $order_detail-> save();

        return $order_detail;
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_details $order_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrder_detailsRequest $request, Order_details $order_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_details $order_details)
    {
        //
    }
}
