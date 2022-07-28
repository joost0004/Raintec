<!doctype html>
<html lang="en">

<head>

    <?php
    $path = 'img/headerOfferte.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>

    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
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
    <figure>
        <img src="<?php echo $base64; ?>" alt="Logo" style="max-width: 700px">
    </figure>
</header>

<body>
    @foreach ($invoice->buyer->custom_fields as $key => $value)
        <?php
            $$key = $value
        ?>
    @endforeach
    <p>
        {{ $company }}
    </p>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price $</th>
                <th>Total $</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Playstation IV - Black</td>
                <td align="right">1</td>
                <td align="right">1400.00</td>
                <td align="right">1400.00</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Metal Gear Solid - Phantom</td>
                <td align="right">1</td>
                <td align="right">105.00</td>
                <td align="right">105.00</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Final Fantasy XV - Game</td>
                <td align="right">1</td>
                <td align="right">130.00</td>
                <td align="right">130.00</td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td align="right">Subtotal $</td>
                <td align="right">1635.00</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Tax $</td>
                <td align="right">294.3</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td align="right">Total $</td>
                <td align="right" class="gray">$ 1929.3</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
