<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use App\Models\Order;
use App\Models\Customer;

class PDFGenController extends Controller
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
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item)
            ->dateFormat('d/M/Y');

        return $invoice->stream();
    }

    public function createInvoice($orderId) {

        // Import data related to invoice
        $orderData = Order::where('id', $orderId)->firstOrFail();
        $customerData = Customer::where('id', $orderData->customerId)->firstOrFail();

        // Make customer variable, and fill it with imported data
        $customer = new Buyer([
            'name' => $customerData->name,
            // 'address' => $customerData->street + ', ' + $customerData->postalCode + ' ' + $customerData->place,
            'address' => "$customerData->street, $customerData->postalCode $customerData->place",
            'phone' => $customerData->phoneNumber,
            'custom_fields' => [
                'email' => $customerData->email,
        ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2)->quantity(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->taxRate(21)
            ->shipping(1.99)
            ->addItem($item)
            ->dateFormat('d/M/Y');

        return $invoice->stream();

    }

}
