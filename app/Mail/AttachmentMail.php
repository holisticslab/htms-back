<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class AttachmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data["email"] = "irsyadkamil96@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";
        $pdf = PDF::loadView('email.proforma', $data);
        return $this->markdown('email.attachment')->subject('PROFORMA INVOICE HLMS')->attachData($pdf->output(), "proforma.pdf", [
            'as' => 'ProformaInvoice.pdf',
            'mime' => 'application/pdf'
        ]);
    }
}
