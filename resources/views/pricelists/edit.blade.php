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
                                <form action="/pricelist/{{$priceList->id}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <?php
                                        $priceListAttributes = $priceList->getAttributes();
                                        array_shift($priceListAttributes);
                                        array_pop($priceListAttributes);
                                        array_pop($priceListAttributes);
                                    ?>

                                    @foreach ($priceListAttributes as $key => $value)
                                        <td>
                                            <input type="text" class="input" id="{{$key}}" name="{{$key}}" value="{{$value}}">
                                        </td>
                                    @endforeach

                            <td>
                                    <button class='button is-link' type="submit">Submit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>

@endsection
