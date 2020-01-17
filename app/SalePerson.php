<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SalePerson extends Model
{
    protected $table = 'sales_persons';
	
	use SoftDeletes;

    protected $fillable = ['user_id', 'dealer_id', 'account_no'];

    public static function boot()
    {
        parent::boot();

    }
	
	public function salesUsers(){
        return $this->belongsTo('App\User','user_id','id');
    }
	
	public function salesDealerUsers(){
        return $this->belongsTo('App\Dealer','dealer_id','id');
    }
	
}
