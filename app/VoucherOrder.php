<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherOrder extends Model
{
    protected $table = 'voucher_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dealer_id', 'point_amount','shipping_street', 'shipping_city', 'shipping_state', 'shipping_country', 'shipping_zipcode', 'shipping_phoneno'
    ];
   
}

?>