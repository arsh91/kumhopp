<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    protected $table = 'point_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dealer_id', 'amount', 'type', 'created_by', 'voucher_id'];
   
}

?>