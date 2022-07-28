<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use App\Models\Order;
use App\Models\PriceList;
use App\Models\Customer;


class TestPDFGen extends Controller
{
    public function show() {
            $customer = new Buyer([
                'name' => 'Klant',
                'custom_fields' => [
                    'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2)->quantity(2);

        $invoice = Invoice::make()
            ->template('extra')
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item)
            ->dateFormat('d/M/Y');

        return $invoice->stream();
    }


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    public function createInvoice($orderId) {

        // Import data related to invoice
        $orderData = Order::where('id', $orderId)->firstOrFail();
        $customerData = Customer::where('id', $orderData->customerId)->firstOrFail();

        // Make customer variable, and fill it with imported data
        $customer = new Buyer([
            'name' => $customerData->name,
            'address' => "$customerData->street, $customerData->postalCode $customerData->place",
            'phone' => $customerData->phoneNumber,
            'custom_fields' => [
                'email' => $customerData->email,
                'company' => $customerData->companyName
        ],
        ]);

        $client = new Party([
            'name'          => 'Raintec BV',
            'phone'         => '0113-340436',
            'address' => "Ambachtsweg 13, 4421SK Kapelle",
            'custom_fields' => [
                'email' => "info@raintec.nl",
                'K.v.K.' => "22044377",
                'BTW nr.' => 'NL 8105 37 412 B01',
                'Bank BIC' => 'ABNANL2A',
                'IBAN' => 'NL74ABNA 0975 539 868'
        ],
        ]);

        // Calculate shipping cost
        $postalArea = (int) filter_var($customerData->postalCode, FILTER_SANITIZE_NUMBER_INT);
        if ($postalArea < 2000 || $postalArea > 5000) {
            $shippingCost = 100;
        } else {
            $shippingCost = 50;
        }

        if ($orderData->notes) {
            $notes = $orderData->notes;
        } else {
            $notes = '';
        }

        $amountItems = count($orderData->A) - 1;

        $items = [];


        for($i = 0; $i <= $amountItems; $i++)
        {
            $newItem = $this->newItem($orderData, $i);
            $items = array_merge($items, $newItem);
        }


        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->taxRate(21)
            ->addItems($items)
            ->dateFormat('d/M/Y')
            ->shipping($shippingCost)
            ->notes($notes)
            ->logo('img/logo.png')
            ->filename($customerData->name . ' offerte')
            ->template('extra')
            ->save('public');

        $orderData->update([
            'status' => 'Done'
        ]);

        return $invoice->stream();

    }


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    public function newItem($orderData, $arrayKey) {

        // Pulling in the price list
        $priceList= PriceList::all()->where('id', '=', '1')->first();


        $uitslag = $orderData->A[$arrayKey] + $orderData->B[$arrayKey] + $orderData->C[$arrayKey] + 11;
        $surfaceArea = ($uitslag * $orderData->length[$arrayKey] * $orderData->amount[$arrayKey]) / 1000000;


        // Form title string of main item
        switch ($orderData->powdercoat) {
            case 1:
                $MainItemLength = $orderData->length[$arrayKey];
                $MainItemString = "Aluminium zetwerk gepoedercoat in $orderData->RAL. Totaal $MainItemLength mm $surfaceArea";
                if ($surfaceArea < 10) {
                    $MainItemPrice = ($priceList->product * $surfaceArea) + $priceList->poedercoat;
                } else {
                    $MainItemPrice = ($priceList->product * $surfaceArea) + ($surfaceArea * $priceList->poedercoat10);
                }
                break;
            case 0:
                $MainItemLength = $orderData->length[$arrayKey];
                $MainItemString = "Aluminium zetwerk brute. Totaal $MainItemLength mm";
                $MainItemPrice =  $priceList->product * $surfaceArea;
                break;
        }

        $items = [
        // Form main item
        (new InvoiceItem())
            ->title($MainItemString)
            //->description(['Your product or service description',   'Your product or service description' ])
            ->pricePerUnit($MainItemPrice)
            ->quantity($orderData->amount[$arrayKey]),
        ];

        // Mat
        if ($orderData->matte === 1) {
            $matte = (new InvoiceItem())
            ->title("Mat behandeling")
            ->pricePerUnit(1 * $surfaceArea);
            array_push($items, $matte);
        }

        // Fijn structuur
        if ($orderData->fine === 1) {
            $fine = (new InvoiceItem())
            ->title("Fijn structuur")
            ->pricePerUnit(1 * $surfaceArea);
            array_push($items, $fine);
        }

        // Seaside voorbehandeling
        if ($orderData->seasidePrep === 1) {
            $seasidePrep = (new InvoiceItem())
            ->title("Seaside voorbehandeling")
            ->pricePerUnit(1 * $surfaceArea);
            array_push($items, $seasidePrep);
        }

        // Kopschotten item
        switch ($orderData->kopschotten) {
            case 1:
                $kopschotten = (new InvoiceItem())
                ->title("Gelaste kopschotten waterslagen")
                ->pricePerUnit($priceList->kopschotten)
                ->quantity(2);
                array_push($items, $kopschotten);
                break;
            case 2:
                $kopschotten = (new InvoiceItem())
                ->title("Kopschotten waterslagen, los geleverd")
                ->pricePerUnit($priceList->kopschotten)
                ->quantity(2);
                array_push($items, $kopschotten);
                break;
            case 3:
                $kopschotten = (new InvoiceItem())
                ->title("Kopschotten waterslagen, geschikt voor stucwerk")
                ->pricePerUnit($priceList->kopschotten)
                ->quantity(2);
                array_push($items, $kopschotten);
                break;
            default:
                break;
        }


        // AntiDreun item
        switch ($orderData->antiDreun) {
            case 1:
                $antiDreun = (new InvoiceItem())
                ->title("Anti-dreunfolie 50mm, los geleverd")
                ->pricePerUnit($priceList->antiDreun)
                ->quantity(1);
                array_push($items, $antiDreun);
                break;
            case 2:
                $antiDreun = (new InvoiceItem())
                ->title("Anti-dreunfolie 50mm, aangebracht")
                ->pricePerUnit($priceList->antiDreun)
                ->quantity(1);
                array_push($items, $antiDreun);
                break;
            default:
                break;
        }

        // Koppelstukken
        if ($orderData->length[$arrayKey] >= 3000) {
            $koppelstuk = (new InvoiceItem())
            ->title("Koppelstukken waterslag(en)")
            ->pricePerUnit($priceList->koppelstukken)
            ->quantity(1);
            array_push($items, $koppelstuk);
        }



        return $items;


    }

    public function sendMail($orderId) {

        $orderData = Order::where('id', $orderId)->firstOrFail();
        $customerData = Customer::where('id', $orderData->customerId)->firstOrFail();

        app('App\Http\Controllers\MailController')->sendInvoice($customerData);

        return back()->with('success', "Offerte verstuurd naar {$customerData->name}.");

    }

}
