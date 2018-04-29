<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Quotation;
use Intervention\Image\ImageManager;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;
    public $products;
    public $thumbnails;
    public $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quotation $order)
    {
        $this->order = $order;
        $this->user = $order->user;
        $this->products = $order->cart->products;
        $this->thumbnails = $this->buildThumbnails($this->products);
        $this->logo = public_path() . '/images/logo_color.png';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject('Orden Confirmada')
                ->view('mail.order_confirmed');
    }

    /**
     * Construye la imagen en minuatura que será mostrada bajo cada producto
     *
     * @return void
     */
    private function buildThumbnails($products) {
        $data = [];
        $manager = new ImageManager;
        foreach($products as $product){
            $thumb = $product->thumbnail_path;
            $data[$product->id]= $manager
                                    ->make($thumb)
                                    ->fit(40, 40)
                                    ->encode('jpg');
        }
        return $data;
    }
}
