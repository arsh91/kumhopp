<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DealerSale extends Model
{
    protected $table = 'dealer_sales';
	
	use SoftDeletes;

    protected $fillable = ['sale_figure', 'dealer_id', 'sale_month', 'sale_year'];

    public static function boot()
    {
        parent::boot();

    }
	
}
