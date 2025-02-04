<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function currentCart() {
        return $this->belongsTo('App\Cart', 'active_cart_id');
    }

    public function carts() {
        return $this->hasMany('App\Cart');
    }

    public function quotations() {
        return $this->hasMany('App\Quotation');
    }

    public function identity() {
        return $this->hasMany('App\UsersIdentity');
    }

    public function invoiceData() {
        return $this->hasOne('App\InvoiceData');
    }
}
