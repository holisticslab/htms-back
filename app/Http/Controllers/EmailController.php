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
        } catch (err) {
            dd($err);
        }
  
        return response()->json([
            "message" => "Successfully register"
        ]);
    }

    public function email() {
        Mail::to('irsyadkamil96@gmail.com')->send(new AttachmentMail());
    }
}
