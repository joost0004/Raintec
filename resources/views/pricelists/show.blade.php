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
    </nav>
    <section class="section">

            <table class="table">
                <thead>
                    <tr>
                        <td>Product:</td>
                        <td>Prijs per m2</td>
                        <td>Klant</td>
                        <td>E-mail</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>Waterslag</td>
                            <td>{{$priceList}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="#">
                                    <button class='button is-link' type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>

    @endsection
