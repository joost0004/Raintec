@extends('layouts.general')

@section('content')


    <div id='wrapper'>
        <div id='page' class='container'>
            <section class="section">
                <img src="/img/form-example.png" alt="voorbeeld" style="height: 350px">
            </section>
            <form method='POST' action="/orders">
                @csrf

                {{-- Mesurement section --}}

                <h1>
                    Afmetingen:
                </h1>

                <table class="table">
                    <thead>
                        <tr id="top-row">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- Main table container --}}
                    <nav class="level">
                        <div class="level-left">
                            <tbody>
                                <tr>
                                    <th>Maat A:</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                                @error('A')
                                                                                            is-danger
                                                                @enderror" type="number" name="A" id="A"
                                                    placeholder="Maat A" value='{{ old('A') }}'>
                                            </div>
                                            <div class="control">
                                                <a class="button is-static is-small is-rounded">mm</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Maat B:</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input control is-small is-rounded
                                                                    @error('B')
                                                                                                is-danger
                                                                    @enderror" type="number" name="B" id="B"
                                                    placeholder="Maat B" value='{{ old('B') }}'>
                                            </div>
                                            <div class="control">
                                                <a class="button is-static is-small is-rounded">mm</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Maat C:</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input control is-small is-rounded
                                                                    @error('C')
                                                                                                is-danger
                                                                    @enderror" type="number" name="C" id="C"
                                                    placeholder="Maat C" value='{{ old('C') }}'>
                                            </div>
                                            <div class="control">
                                                <a class="button is-static is-small is-rounded">mm</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Afschot:</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                                    @error('afschot')
                                                                                                is-danger
                                                                    @enderror" type="number" name="afschot" id="afschot"
                                                    placeholder="Afschot" value='{{ old('afschot') }}'>
                                            </div>
                                            <div class="control">
                                                <a class="button is-static is-small is-rounded">graden</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lengte:</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                                    @error('length')
                                                                                                is-danger
                                                                    @enderror" type="number" name="length" id="length"
                                                    placeholder="Lengte" value='{{ old('length') }}'>
                                            </div>
                                            <div class="control">
                                                <a class="button is-static is-small is-rounded">mm</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Aantal</th>
                                    <td>
                                        <div class="field has-addons">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                                    @error('ammount')
                                                                                                is-danger
                                                                    @enderror" type="number" name="ammount" id="ammount"
                                                    placeholder="Aantal" value='{{ old('ammount') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </div>
                        <div class="level-right">
                            <a class="button level-item">+</a>
                        </div>
                    </nav>

                </table>

                {{-- Finish section --}}

                <section class="section is-small"></section>

                <h1>
                    Afwerking:
                </h1>

                <nav class="level">
                    <div class="level-item has-text">
                        <div class="mt-4">
                            <input type="radio" id="false" name="powdercoat" value="false">
                            <label for="false">Aluminium brute</label><br>
                            <input type="radio" id="true" name="powdercoat" value="true">
                            <label for="true">Gepoedercoat</label><br>
                        </div>
                    </div>
                    <div class="level-item has-text-centered powdercoat">
                        <div class="field has-addons">
                            <div class="control">
                                <a class="button is-small is-rounded" href="https://www.ralcolorchart.com/">RAL kleur:</a>
                            </div>
                            <div class="control">
                                <input class="input is-small is-rounded
                                    @error('RAL')
                                        is-danger
                                    @enderror" type="text" name="RAL" id="RAL" placeholder="RAL 0000"
                                    value='{{ old('RAL') }}'>
                            </div>
                        </div>
                    </div>
                    <div class="level-item has-text powdercoat">
                        <label class="checkbox">
                            <input type="checkbox">
                            Mat<br>
                            <input type="checkbox">
                            Fijn structuur<br>
                            <input type="checkbox">
                            Sea-Side voorbehandeling<br>
                        </label>
                    </div>
                </nav>
                <section class="section is-small"></section>
        </div>
    </div>

    </form>
    </div>
    </div>

@endsection
