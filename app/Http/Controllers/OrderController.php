<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        // dd(
        //     serialize($request->A)
        // );

        $request->validate([
            'companyName'=>'',
            'name'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
            'street'=>'required',
            'postalCode'=>'required',
            'place'=>'required',
            'refrence'=>'',
            'A'=>'required|array|between:1,10',
            'B'=>'required|array|between:1,10',
            'C'=>'required|array|between:1,10',
            'afschot'=>'required|array|between:1,10',
            'length'=>'required|array|between:1,10',
            'amount'=>'required|array|between:1,10',
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
            'image' => 'image|mimes:jpeg,png,jpg|max:4096',
            'status'=>'',
            'notes'=>'',
        ]);

        $booleanFields = [
            'powdercoat',
            'matte',
            'fine',
            'seasidePrep',
            'koppelstukken',
            'ankers',
            'hoekstukken'
        ];

        foreach ($booleanFields as $boolean) {
            if (request($boolean) == 'true') {
                $request->merge([$boolean => true]);
            } else {
                $request->merge([$boolean => false]);
            };
        }

        // if (request('powdercoat') == 'true') {
        //     $request->merge(['powdercoat' => true]);
        // } else {
        //     $request->merge(['powdercoat' => false]);
        // };

        // if (request('matte') == 'true') {
        //     $request->merge(['matte' => true]);
        // } else {
        //     $request->merge(['matte' => false]);
        // };

        // if (request('fine') == 'true') {
        //     $request->merge(['fine' => true]);
        // } else {
        //     $request->merge(['fine' => false]);
        // };

        // if (request('seasidePrep') == 'true') {
        //     $request->merge(['seasidePrep' => true]);
        // } else {
        //     $request->merge(['seasidePrep' => false]);
        // };

        // if (request('koppelstukken') == 'true') {
        //     $request->merge(['koppelstukken' => true]);
        // } else {
        //     $request->merge(['koppelstukken' => false]);
        // };

        // if (request('ankers') == 'true') {
        //     $request->merge(['ankers' => true]);
        // } else {
        //     $request->merge(['ankers' => false]);
        // };

        // if (request('hoekstukken') == 'true') {
        //     $request->merge(['hoekstukken' => true]);
        // } else {
        //     $request->merge(['hoekstukken' => false]);
        // };

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

        //$seriA = $request->

        if ($request->image) {
            $fileExtension = $request->image->extension();

            $imageName = $customer->name . " Aditional Image." . $fileExtension;

            $request->image->storeAs('images', $imageName);

            $request->request->add([
                'imageName' => $imageName
            ]);
        }

        $request->request->add([
            'customerId' => $customer_id,
        ]);

        $order = Order::create(
            $request->validate([
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'afschot'=>'required',
            'length'=>'required',
            'amount'=>'required',
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
            'imageName' => '',
            'status'=>'',
            'notes'=>'',
            'customerId'=> 'required'
        ]));


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

    public function getImage(int $orderId) {

        $order = Order::all()->where('id', '=', $orderId)->first();

        $image = Storage::get('images/'. $order->imageName);

        $imageInfo = getimagesizefromstring($image);

        // send to the browser
        return response($image, 200)->header('Content-Type', $imageInfo['mime']);

    }


}
