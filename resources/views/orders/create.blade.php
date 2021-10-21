@extends('layouts.general')

@section('content')


    <div id='wrapper'>
        <div id='page' class='container'>
            <section class="section">
                <img src="/img/form-example.png" alt="voorbeeld" style="height: 350px;   display: block;
                margin-left: auto;
                margin-right: auto;">
            </section>
            <form method='POST' enctype="multipart/form-data" action="/orders">
                @csrf

                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif

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
                                                                                @enderror" type="number" name="afschot"
                                                    id="afschot" placeholder="Afschot" value='{{ old('afschot') }}'>
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
                                                                                @enderror" type="number" name="length"
                                                    id="length" placeholder="Lengte" value='{{ old('length') }}'>
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
                                                                                @enderror" type="number" name="ammount"
                                                    id="ammount" placeholder="Aantal" value='{{ old('ammount') }}'>
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

                <section class="section is-small">
                    <hr class="divider">
                </section>

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
                            <input type="checkbox" name="matte" value="true">
                            Mat<br>
                            <input type="checkbox" name="fine" value="true">
                            Fijn structuur<br>
                            <input type="checkbox" name="seasidePrep" value="true">
                            Sea-Side voorbehandeling<br>
                        </label>
                    </div>
                </nav>

                <section class="section is-small">
                    <hr class="divider">
                </section>

                <h1>
                    Extra opties:
                </h1><br>


                <nav class="level">
                    <div class="level-item">
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

                    <div class="level-item">
                        <a>Anti-dreun folie: </a>
                        <div class="select">

                            <select name="antiDreun" id="antiDreun" class="">
                                <option value="0">Nee</option>
                                <option value="1">Ja, los geleverd </option>
                                <option value="2">Ja, door ons aangebracht</option>
                            </select>
                        </div>
                    </div>


                    <div class="level-item">
                        <a>Koppelstukken: </a>
                        <div class="select">

                            <select name="koppelstukken" id="koppelstukken" class="">
                                <option value="false">Nee</option>
                                <option value="true">Ja</option>
                            </select>
                        </div>
                    </div>


                    <div class="level-item">
                        <a>Ankers: </a>
                        <div class="select">
                            <select name="ankers" id="ankers" class="">
                                <option value="false">Nee</option>
                                <option value="true">Ja</option>
                            </select>
                        </div>
                    </div>


                    <div class="level-item">
                        <a>Hoekstukken: </a>
                        <div class="select">
                            <select name="hoekstukken" id="hoekstukken" class="">
                                <option value="false">Nee</option>
                                <option value="true">Ja</option>
                            </select>
                        </div>
                    </div>

                </nav>

                <section class="section is-small">
                    <hr class="divider">
                </section>

                <h1>
                    Foto of tekening:
                </h1><br>

                {{-- <div class="file is-boxed">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a file…
                            </span>
                        </span>
                    </label>
                </div> --}}

                <div id="file-js-example" class="file has-name">
                    <label class="file-label">
                      <input class="file-input" type="file" name="image" accept="image/*">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                      <span class="file-name">
                        No file uploaded
                      </span>
                    </label>
                  </div>


                <section class="section is-small">
                    <hr class="divider">
                </section>

                <table class="table">
                    <thead>
                        <tr id="top-row">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- Contact information form --}}

                    <h1>
                        Contact informatie:
                    </h1><br>
                    <nav class="level">
                        <div class="level-left">
                            <tbody>
                                <tr>
                                    <th>Bedrijfsnaam:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('companyName')
                                                                is-danger
                                                        @enderror" type="text" name="companyName" id="companyName"
                                                    placeholder="Bedrijfsnaam" value='{{ old('companyName') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Naam:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input control is-small is-rounded
                                                        @error('name')
                                                                    is-danger
                                                        @enderror" type="text" name="name" id="name" placeholder="Naam"
                                                    value='{{ old('name') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telefoonnummer:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input control is-small is-rounded
                                                        @error('phoneNumber')
                                                                is-danger
                                                        @enderror" type="text" name="phoneNumber" id="phoneNumber"
                                                    placeholder="Telefoonnummer" value='{{ old('phoneNumber') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('email')
                                                                is-danger
                                                        @enderror" type="text" name="email" id="email" placeholder="Email"
                                                    value='{{ old('email') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Straat en nummer:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('street')
                                                                is-danger
                                                        @enderror" type="text" name="street"
                                                    id="street" placeholder="Straat en nummer"
                                                    value='{{ old('street') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Postcode</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('postalCode')
                                                                is-danger
                                                        @enderror" type="text" name="postalCode" id="postalCode"
                                                    placeholder="Postcode" value='{{ old('postalCode') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Plaats:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('place')
                                                                is-danger
                                                        @enderror" type="text" name="place" id="place" placeholder="Plaats"
                                                    value='{{ old('place') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Referentie:</th>
                                    <td>
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-small is-rounded
                                                        @error('refrence')
                                                                is-danger
                                                        @enderror" type="text" name="refrence" id="refrence"
                                                    placeholder="Referentie" value='{{ old('refrence') }}'>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </div>
                    </nav>

                </table><br>

                <textarea class="textarea" name="notes" id="notes" placeholder="Enige notities"></textarea>

                <section class="section is-small"></section>

                {{-- Submit button --}}

                <div classs='field is-grouped'>
                    <div class="control">
                        <button class='button is-link' type='submit'>Submit</button>
                    </div>
                </div>

        </div>
    </div>

    </form>
    </div>
    </div>
    <section class="section is-small"></section>

    <script>
        let fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
          if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
          }
        }

        fileInput.onchange = function() {
            let checkFileName = document.querySelector('#file-js-example input[type=file]').value.toLowerCase();

            if (!checkFileName.endsWith('.png') && !checkFileName.endsWith('.jpg') && !checkFileName.endsWith(".jpeg")) {
                alert('Please use only one of the following image types: PNG, JPG, JPEG');
            }
        }
    </script>

@endsection
