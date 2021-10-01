<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use Illuminate\Support\Facades\DB;
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

        $lists = PriceList::all();

        return view('pricelists.index', [
            'lists' => $lists
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function show(int $priceListId)
    {
        $priceList= PriceList::all()->where('id', '=', $priceListId)->first();

        return view('pricelists.show',
        compact('priceList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function edit(int $priceListId)
    {
        $priceList= PriceList::all()->where('id', '=', $priceListId)->first();

        return view('pricelists.edit',
        compact('priceList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $priceListId)
    {
        $priceList= PriceList::all()->where('id', '=', $priceListId)->first();
        $priceList->update($request->validate([
            'product' => 'required',
            'poedercoat' => 'required',
            'poedercoat10' => 'required',
            'kopschotten' => 'required',
            'antiDreun' => 'required',
            'koppelstukken' => 'required',
            'ankers' => 'required',
            'hoekstukken' => 'required',
        ]));

        return redirect("/pricelist");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceList $priceList)
    {
        //
    }
}
