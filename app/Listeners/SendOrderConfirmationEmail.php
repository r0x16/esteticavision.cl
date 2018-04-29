<?php

namespace App\Listeners;

use App\Events\OrderConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;
use App\Mail\OrderConfirmed as OrderConfirmedMail;

class SendOrderConfirmationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderConfirmation  $event
     * @return void
     */
    public function handle(OrderConfirmation $event)
    {
        // El usuario registrado en la orden, para extraer el email.
        $user = $event->order->user;

        // El cuerpo del mensaje
        $mail = new OrderConfirmedMail($event->order);

        Mail::to($user->email)
                ->bcc(config('shop.checkouts_email'))
                ->send($mail);
    }
}
