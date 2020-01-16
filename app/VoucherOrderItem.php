<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherOrderItem extends Model
{
    protected $table = 'voucher_order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','dealer_id', 'vocuher_id'];
   
}

?>