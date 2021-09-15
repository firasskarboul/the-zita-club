<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;
use App\Models\Order;
use Carbon\Carbon;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $reservation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Reservation $reservation)
    {
        $this->order = $order;
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qrPath = '../public/assets/QR' . Carbon::now()->timestamp . '.png';
        return $this->markdown('emails.reservation', ['order' => $this->order, 'reservation' => $this->reservation, 'QRpath' => $qrPath]);
    }
}
