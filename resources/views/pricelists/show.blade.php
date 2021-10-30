@extends('layouts.general')

@section('content')

<nav class="level">
    <p class=" has-text-centered">
    <div class="field is-grouped">
        <div class="control">
            <form action="/pricelist">
                <button type="submit" class='button is-link'>Ga terug</button>
            </form>
        </div>
    </div>
    </p>
    <p class=" has-text-centered">
        <div class="field is-grouped">
            <div class="control">
                <form action="/dashboard">
                    <h1 class="has-text-centered field is-grouped" style="font-size: 30px; font-weight: bold; text-align: center; visibility: hidden">Producten</h1>
                </form>
            </div>
        </div>
        </p>
    <p class="has-text-centered">
    <div class="field is-grouped">
        <div class="control">
            <form action="/orders/create">
                <button type="submit" class="button is-link" style="visibility: hidden">Order Maken</button>
            </form>
        </div>
    </div>
    </p>
</nav>
    <section class="section">
            <table class="table" style="margin-right: auto; margin-left: auto;">
                <thead>
                    <tr>
                        <td>Product:</td>
                        <td>Prijs per m2</td>
                        <td>Poedercoat onder 10m2</td>
                        <td>Poedercoat boven 10m2</td>
                        <td>Kopschotten</td>
                        <td>Anti dreun per m2</td>
                        <td>Koppelstukken</td>
                        <td>Ankers</td>
                        <td>Hoekstukken</td>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>Waterslag</td>
                            <td>{{$priceList->product}}</td>
                            <td>{{$priceList->poedercoat}}</td>
                            <td>{{$priceList->poedercoat10}}</td>
                            <td>{{$priceList->kopschotten}}</td>
                            <td>{{$priceList->antiDreun}}</td>
                            <td>{{$priceList->koppelstukken}}</td>
                            <td>{{$priceList->ankers}}</td>
                            <td>{{$priceList->hoekstukken}}</td>
                            <td>
                                <form action="/pricelist/{{$priceList->id}}/edit">
                                    <button class='button is-link' type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
    @endsection
