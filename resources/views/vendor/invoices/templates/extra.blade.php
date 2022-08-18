<!doctype html>
<html lang="en">

<head>

    <?php
    use App\Models\Order;
    $orderData = Order::where('id', $invoice->series)->firstOrFail();


    $path = 'img/bg.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>

    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        body {
            font-family: Verdana, Arial, sans-serif;
            font-size: small;
            background-image: url("<?php echo $base64; ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        table {
            font-size: xx-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<header>
    <!-- <figure>
        <img src="<?php echo $base64; ?>" alt="Logo" style="max-width: 100%">
    </figure> -->
</header>

<body>
    @foreach ($invoice->buyer->custom_fields as $key => $value)
        <?php
            $$key = $value
        ?>
    @endforeach
    <p>{{ $company }}</p>
    <p>T.a.v. {{ $invoice->buyer->firstName }} {{ $invoice->buyer->lastName }} ({{ $invoice->buyer->phone }} / {{ $email }})</p>
    <p>{{ $invoice->buyer->address }}</p>
    <p>{{ $invoice->buyer->postalCode }} {{ $invoice->buyer->place }}</p>

    <br/>

    <p>Datum:
    <?php
            echo strtok($invoice->buyer->updated_at, " ");
        ?>
    </p>

    <br />

    <p>Geachte heer/mevrouw {{ $invoice->buyer->lastName }},</p>
    <p>Bedankt voor uw aanvraag, wij bieden dit zetwerk, geheel vrijblijvend, voor de volgende prijzen aan:</p>

    @php
        $mainItems = [];
        $extraItems = [];

        foreach($invoice->items as $item) {
            if($item->description == 'mainItem') {
                array_push($mainItems, $item);
            } else {
                array_push($extraItems, $item);
            }
        }
    @endphp


<table width="100%">
    <thead>
        {{-- @foreach ($mainItems as $item)
            <tr>
                <td>{{$item->title}}</td>
                <th>Dikte: </th>
                <th>ca </th>
                <th>€</th>
            </tr>
        @endforeach --}}
        {{-- @dd($mainItems) --}}
        @for ($i = 0; $i < count($mainItems) ; $i++)
            <tr>
                <td>{{$mainItems[$i]->title}}</td>
                <th>Dikte: </th>
                <th>ca </th>
                <th>€   {{$mainItems[$i]->sub_total_price}}</th>
            </tr>
            <tr>
                <td scope="row">- {{$orderData->amount[$i]}} stuks met een lengte van {{$orderData->length[$i]}} mm. In totaal {{
                    ($orderData->length[$i] * $orderData->amount[$i]) / 1000
                }} meter</td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
            </tr>
        @endfor
    </thead>
    <tbody>
        <br>
        <tr>
            <td scope="row">Toebehoren:</td>
            <td align="right">Aantal</td>
            <td align="right">Prijs</td>
            <td align="right">Totaal</td>
        </tr>
        @foreach ($extraItems as $item)
            <tr>
                    <td scope="row">{{$item->title}}</td>
                    <td align="right">{{$item->quantity}}</td>
                    <td align="right">{{$invoice->formatCurrency($item->price_per_unit)}}</td>
                    <td align="right">{{$invoice->formatCurrency($item->sub_total_price)}}</td>
            </tr>
        @endforeach
        <br />
        <tr>
            <td scope="row">Bezorgkosten postcodegebied: {{ $invoice->buyer->postalCode }}  {{ $invoice->buyer->place }}</td>
            <td align="right"></td>
            <td align="right"></td>
            <td align="right">{{$invoice->formatCurrency($invoice->shipping_amount)}}</td>
        </tr>
    </tbody>
    <br />
    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="right">Totaal $</td>
            <td align="right">{{$invoice->formatCurrency($invoice->total_amount)}}</td>
        </tr>
    </tfoot>
</table>

    <br />

    <p>Deze prijzen zijn exclusief 21% BTW. Bij opdracht maken wij eerst een werktekening. Betaling vooraf na goedkeuring werktekening.</p>
    <p>Hopende u hierbij voldoende te hebben geïnformeerd.</p>
    <p>Mocht u verdere vragen of informatie nodig hebben, dan kunt u altijd contact met ons opnemen.</p>
    <p>Met vriendelijke groet, </p>
    <p>Jan Paul van de Kimmenade</p>

    <br />

    <p>Raintec BV<br />
    Ambachtsweg 13<br />
    4421 SK  Kapelle<br />
    0113-340436<br />
    www.raintec.nl</p>


</body>

</html>
