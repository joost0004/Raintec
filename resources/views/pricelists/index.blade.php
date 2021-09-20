@extends('layouts.general')

@section('content')
    <h1 style="font-size: 30px; font-weight: bold; text-align: center;">Prijzen lijsten</h1>
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
                    <tr>
                        <td>Waterslag</td>
                        <td>
                            <form action="/pricelists/waterslag">
                                <button class='button is-link' type="submit">Bekijk</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                </table>
        </div>
      </nav>
  </section>


@endsection
