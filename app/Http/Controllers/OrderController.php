<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::all();

        $customers = Customer::all();

        return view('orders.index', [
            'orders' => $orders,
            'customers' => $customers
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
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
            'companyName'=>'',
            'name'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
            'street'=>'required',
            'postalCode'=>'required',
            'place'=>'required',
            'refrence'=>'',
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'afschot'=>'required',
            'length'=>'required',
            'ammount'=>'required',
            'powdercoat'=>'required',
            'RAL'=>'',
            'matte'=>'',
            'fine'=>'',
            'seasidePrep'=>'',
            'kopschotten'=>'required',
            'antiDreun'=>'required',
            'koppelstukken'=>'required',
            'ankers'=>'required',
            'hoekstukken'=>'required',
            // 'image-name'=>'',
            // 'file-path'=>'',
            'status'=>'',
            'notes'=>'',
        ]);

        if (request('powdercoat') == 'true') {
            $request->merge(['powdercoat' => true]);
        } else {
            $request->merge(['powdercoat' => false]);
        };

        if (request('matte') == 'true') {
            $request->merge(['matte' => true]);
        } else {
            $request->merge(['matte' => false]);
        };

        if (request('fine') == 'true') {
            $request->merge(['fine' => true]);
        } else {
            $request->merge(['fine' => false]);
        };

        if (request('seasidePrep') == 'true') {
            $request->merge(['seasidePrep' => true]);
        } else {
            $request->merge(['seasidePrep' => false]);
        };

        if (request('koppelstukken') == 'true') {
            $request->merge(['koppelstukken' => true]);
        } else {
            $request->merge(['koppelstukken' => false]);
        };

        if (request('ankers') == 'true') {
            $request->merge(['ankers' => true]);
        } else {
            $request->merge(['ankers' => false]);
        };

        if (request('hoekstukken') == 'true') {
            $request->merge(['hoekstukken' => true]);
        } else {
            $request->merge(['hoekstukken' => false]);
        };

        $customer = Customer::create([
            'companyName'=> request('companyName'),
            'name'=> request('name'),
            'email'=> request('email'),
            'phoneNumber'=> request('phoneNumber'),
            'street'=> request('street'),
            'postalCode'=> request('postalCode'),
            'place'=>request('place'),
            'refrence'=>request('refrence')
        ]);

        $customer_id = $customer->id;

        $request->request->add([
            'customerId' => $customer_id
        ]);



        $order =Order::create($request->validate([
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'afschot'=>'required',
            'length'=>'required',
            'ammount'=>'required',
            'powdercoat'=>'required',
            'RAL'=>'',
            'matte'=>'',
            'fine'=>'',
            'seasidePrep'=>'',
            'kopschotten'=>'required',
            'antiDreun'=>'required',
            'koppelstukken'=>'required',
            'ankers'=>'required',
            'hoekstukken'=>'required',
            // 'image-name'=>'',
            // 'file-path'=>'',
            'status'=>'',
            'notes'=>'',
            'customerId'=> 'required'
        ]));

        //app('App\Http\Controllers\PDFGenController')->createInvoice($customer, $order);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $Order)
    {
        //
    }
}
