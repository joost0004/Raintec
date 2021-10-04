<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;

class MailController extends Controller
{

    public function sendInvoice($customerData)

    {

        $data["email"] = $customerData->email;

        $data["title"] = "Offerte Raintec";

        $data["body"] = "Hierbij uw offerte.";



        $files = [

            storage_path("app/public/" . $customerData->name . ' offerte.pdf'),

        ];



        Mail::send('emails.offerte', $data, function($message)use($data, $files) {

            $message->to($data["email"], $data["email"])

                    ->subject($data["title"]);



            foreach ($files as $file){

                $message->attach($file);

            }



        });
    }






}




