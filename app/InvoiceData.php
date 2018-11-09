<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceData extends Model
{
    protected $table = 'invoice_data';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
