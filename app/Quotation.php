<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{

    public static $statusMessages = [
        0 => [
            'color' => 'info',
            'message' => 'Activa'
        ],
        1 => [
            'color' => 'success',
            'message' => 'Lista'
        ],
        2 => [
            'color' => 'warning',
            'message' => 'En Espera'
        ],
        3 => [
            'color' => 'danger',
            'message' => 'Cancelada'
        ]
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function cart() {
        return $this->belongsTo('App\Cart');
    }

    public function getStatusMessageAttribute() {
        return Quotation::$statusMessages[$this->status];
    }
}
