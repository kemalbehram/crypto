<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var JSC Email Mailable
     */
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thisMail)
    {
        $this->mail = $thisMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->mail->purpose == "subscribe") {
            return $this->subject('My Accounting Firm | Subscription')->view('mails.subscribe')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "registration") {
            return $this->subject('My Accounting Firm | Registration')->view('mails.registration')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "card") {
            return $this->subject('My Accounting Firm | Card Creation')->view('mails.card')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "transaction") {
            return $this->subject('My Accounting Firm | Transacton')->view('mails.transaction')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "request") {
            return $this->subject('My Accounting Firm | Payment Request')->view('mails.request')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "unpublish") {
            return $this->subject('My Accounting Firm | Quotation Unpublished')->view('mails.unpublish')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "update") {
            return $this->subject('My Accounting Firm | Quotation Updated')->view('mails.updated')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "initiation") {
            return $this->subject('My Accounting Firm | Quotation Initiation')->view('mails.initiation')
                ->with('maildata', $this->mail);
        }
        if ($this->mail->purpose == "verification") {
            return $this->subject('My Accounting Firm | Email Verification')->view('mails.verification')
                ->with('maildata', $this->mail);
        }
    }
}
