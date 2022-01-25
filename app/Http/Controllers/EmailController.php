<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AttachmentMail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function index() {
        $data["email"] = "irsyadkamil96@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        try {
            Mail::to('irsyadkamil96@gmail.com')->send(new AttachmentMail());

            // Mail::send('email.attachment', $data, function($message)use($data, $pdf) {
            //     $message->to($data["email"], $data["email"])
            //             ->subject($data["title"])
            //             ->attachData($pdf->output(), "proforma.pdf");
            // });
        } catch (err) {
            dd($err);
        }
  
        dd('Mail sent successfully');
    }

    public function email() {
        Mail::to('irsyadkamil96@gmail.com')->send(new AttachmentMail());
    }
}
