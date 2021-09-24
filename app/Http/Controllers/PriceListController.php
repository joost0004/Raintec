<?php

namespace App\Http\Controllers;

use App\Models\PriceListWaterslag;
use DB;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pricelists.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceListWaterslag  $priceListWaterslag
     * @return \Illuminate\Http\Response
     */
    public function show(PriceListWaterslag $priceListWaterslag)
    {
        $list = PriceListWaterslag::findOrFail($priceListWaterslag);

        return view('pricelists.show', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceListWaterslag  $priceListWaterslag
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceListWaterslag $priceListWaterslag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceListWaterslag  $priceListWaterslag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceListWaterslag $priceListWaterslag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceListWaterslag  $priceListWaterslag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceListWaterslag $priceListWaterslag)
    {
        //
    }
}
