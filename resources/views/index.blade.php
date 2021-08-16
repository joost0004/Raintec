@extends('layouts.layout')

@section('content')
    <h1 style="font-size: 30px; font-weight: bold; text-align: center;">Welkom</h1>
<section class="section is-medium">

    <nav class="level">
        <div class="level-item has-text-centered">
            <a href="/events">
            <div class="box">
                <p class="heading">Bestellingen</p>
                <img src="/img/checklist.png">
              </div>
            </a>
        </div>
        <div class="level-item has-text-centered">
            <a href="/registration">
            <div class="box">
                <p class="heading">Klant</p>
                <img src="/img/user-icon.png">
              </div>
            </a>
        </div>
      </nav>
  </section>


@endsection
