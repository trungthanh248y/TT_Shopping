<?php

namespace App\Mail;

use App\Bill;
use App\Http\Controllers\TotalBillDate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTotalAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $total;

    public function __construct(TotalBillDate $total)
    {
        $this->total = $total->totalBillDate();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newTotalSendAdmin');
    }
}
