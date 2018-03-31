<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CartService;

class CartBadgeComposer
{

    private $cs;

    /**
     * Create a new cart badge composer.
     *
     * @param  CartService  $cs
     * @return void
     */
    public function __construct(CartService $cs)
    {
        $this->cs = $cs;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cart_count', $this->cs->getBadgeCount());
    }
}