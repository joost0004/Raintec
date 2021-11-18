@extends('layouts.general')

@section('content')

<h1>
    Extra opties:
</h1><br>

<nav class="level is-mobile">
    <div class="level-item has-text-centered">
        <a>Kopschotten: </a>
        <div class="select">

            <select name="kopschotten" id="kopschotten" class="">
                <option value="0">Nee</option>
                <option value="1">Ja, gelaste kopschotten</option>
                <option value="2">Ja, los geleverd </option>
                <option value="3">Ja, kopschotten geschikt voor
                    stucwerk
                </option>
            </select>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <a>Anti-dreun folie: </a>
        <div class="select">

            <select name="antiDreun" id="antiDreun" class="">
                <option value="0">Nee</option>
                <option value="1">Ja, los geleverd </option>
                <option value="2">Ja, door ons aangebracht</option>
            </select>
        </div>
    </div>
</nav><br>
<nav class="level is-mobile">
    <div class="level-item has-text-centered">
        <a>Koppelstukken: </a>
        <div class="select">

            <select name="koppelstukken" id="koppelstukken" class="">
                <option value="false">Nee</option>
                <option value="true">Ja</option>
            </select>
        </div>
    </div>
    <div class="level-item has-text-centered">
        <a>Ankers: </a>
        <div class="select">
            <select name="ankers" id="ankers" class="">
                <option value="false">Nee</option>
                <option value="true">Ja</option>
            </select>
        </div>
    </div>
</nav>
<nav class="level is-mobile">
    <div class="level-item has-text-centered">
        <a>Hoekstukken: </a>
        <div class="select">
            <select name="hoekstukken" id="hoekstukken" class="">
                <option value="false">Nee</option>
                <option value="true">Ja</option>
            </select>
        </div>
    </div>
</nav>

@endsection
