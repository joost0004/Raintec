@extends('layouts.general')

@section('content')

{{-- <nav class="level">
    <p class=" has-text-centered">
    <div class="field is-grouped">
        <div class="control">
            <form action="/dashboard">
                <button type="submit" class='button is-link'>Ga terug</button>
            </form>
        </div>
    </div>
    </p>
    <h1 class="has-text-centered field is-grouped" style="font-size: 30px; font-weight: bold; text-align: center;">Prijzen lijsten</h1>
</nav> --}}

<nav class="level">
    <p class=" has-text-centered">
    <div class="field is-grouped">
        <div class="control">
            <form action="/dashboard">
                <button type="submit" class='button is-link'>Ga terug</button>
            </form>
        </div>
    </div>
    </p>
    <p class=" has-text-centered">
        <div class="field is-grouped">
            <div class="control">
                <form action="/dashboard">
                    <h1 class="has-text-centered field is-grouped" style="font-size: 30px; font-weight: bold; text-align: center;">Producten</h1>
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


<section class="section is-medium">

    <nav class="level">
        <div class="level-item has-text-centered">
            <table class="table">
                <thead>
                <tr>
                    <td>Product:</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                    @foreach ($lists as $list)
                        <tr>
                            <td>Waterslag</td>
                            <td>
                                <form action="/pricelist/{{$list->id}}">
                                    <button class='button is-link' type="submit">Bekijk</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    {{-- <tr>
                        <td>Waterslag</td>
                        <td>
                            <form action="/pricelists/1">
                                <button class='button is-link' type="submit">Bekijk</button>
                            </form>
                        </td>
                    </tr> --}}
                </tbody>
                </table>
        </div>
      </nav>
  </section>


@endsection
