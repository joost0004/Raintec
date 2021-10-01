@extends('layouts.general')

@section('content')

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
                        <h1 class="has-text-centered field is-grouped" style="font-size: 30px; font-weight: bold; text-align: center;">Orders</h1>
                    </form>
                </div>
            </div>
            </p>
        <p class=" has-text-centered">
        <div class="field is-grouped">
            <div class="control">
                <form action="/orders/create">
                    <button type="submit" class="button is-link">Order Maken</button>
                </form>
            </div>
        </div>
        </p>
    </nav>
    <section class="section">

        <table class="table" style="margin-right: auto; margin-left: auto;">
            <thead>
                <tr>
                    <td>Status</td>
                    <td>Order ID</td>
                    <td>Klant</td>
                    <td>E-mail</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)

                    <tr>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $customers[$order->customerId - 1]->name }}</td>
                        <td>{{ $customers[$order->customerId - 1]->email }}</td>
                        <td>
                            <form action="/gen/{{ $order->id }}">
                                <button class='button is-link' type="submit">Bekijk</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
