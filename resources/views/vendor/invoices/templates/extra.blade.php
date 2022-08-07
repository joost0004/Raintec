<!doctype html>
<html lang="en">

<head>

    <?php
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

    <table width="100%">
        <thead>
            <tr>
                @if($invoice->buyer->powdercoat == 1)
                <td>Aluminium zetwerk gepoedercoat in {{ $invoice->buyer->ral }}</td>  
                @elseif($invoice->buyer->powdercoat == 0)
                <td>Aluminium zetwerk niet gepoedercoat</td>  
                @endif
                <th>Dikte: </th>
                <th>ca </th>
                <th>€</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">-  stuks met een lengte van  mm. In totaal </td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
            </tr>
            <br />
            <tr>
                <td scope="row">Toebehoren:</td>
                <td align="right">Aantal</td>
                <td align="right">Prijs</td>
                <td align="right">Totaal</td>
            </tr>
            <tr>
                @if($invoice->buyer->kopschotten == 0)  
                @elseif($invoice->buyer->kopschotten == 1)
                    <td scope="row">Gelaste kopschotten waterslagen</td>
                    <td align="right"> st</td>
                    <td align="right">€15.00 st</td>
                    <td align="right">€30.00</td>
                @elseif($invoice->buyer->kopschotten == 2)
                    <td scope="row">Los geleverde kopschotten waterslagen</td>
                    <td align="right"> st</td>
                    <td align="right">€15.00 st</td>
                    <td align="right">€30.00</td>
                @elseif($invoice->buyer->kopschotten == 3)
                    <td scope="row">Kopschotten geschikt voor stucwerk waterslagen</td>
                    <td align="right"> st</td>
                    <td align="right">€15.00 st</td>
                    <td align="right">€30.00</td>
                @endif
            </tr>
            <tr>
                @if($invoice->buyer->folie == 0) 
                @elseif($invoice->buyer->folie == 1)
                    <td scope="row">Anti-dreunfolie, los geleverd</td>
                    <td align="right"> m1</td>
                    <td align="right">€1.80 m1</td>
                    <td align="right">€7.20</td>
                @elseif($invoice->buyer->folie == 2)
                    <td scope="row">Anti-dreunfolie aanbrengen</td>
                    <td align="right"> m1</td>
                    <td align="right">€7.50 m1</td>
                    <td align="right">€30.00</td>
                @endif
            </tr>
            <tr>
                @if($invoice->buyer->koppelstukken == 0) 
                @elseif($invoice->buyer->koppelstukken == 1)
                <td scope="row">Koppelstukken waterslag(en)</td>
                    <td align="right"> st</td>
                    <td align="right">€4.00 st</td>
                    <td align="right">€30.00</td>
                @endif
            </tr>
            <br />
            <tr>
                <td scope="row">Bezorgkosten postcodegebied: {{ $invoice->buyer->postalCode }}  {{ $invoice->buyer->place }}</td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right">€125.00</td>
            </tr>
        </tbody>
        <br />
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td align="right">Totaal $</td>
                <td align="right">1635.00</td>
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
