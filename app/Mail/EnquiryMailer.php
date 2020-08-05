<?php

namespace App\Mail;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMailer extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Enquiry
     */
    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        //
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.enquiry')
                    ->subject('New enquiry received');
    }
}
