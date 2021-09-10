@extends('layouts.general')

@section('content')
    <h1 style="font-size: 30px; font-weight: bold; text-align: center;">Welkom</h1>
<section class="section is-medium">

    <nav class="level">
        <div class="level-item has-text-centered">
            <a href="/orders">
            <div class="box">
                <p class="heading">Bestellingen</p>
                <img src="/img/orders.png" style="height: 200px;">
              </div>
            </a>
        </div>
        <div class="level-item has-text-centered">
            <a href="/registration">
            <div class="box">
                <p class="heading">Producten</p>
                <img src="/img/product.png" style="height: 200px;">
              </div>
            </a>
        </div>
      </nav>
  </section>


@endsection
