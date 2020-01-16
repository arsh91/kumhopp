<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $table = 'dealers';
	
	use SoftDeletes;

    protected $fillable = ['dealer_id','account_no','contact','address1', 'town', 'county', 'post_code', 'region', 'website'];

    public static function boot()
    {
        parent::boot();

        //Dealer::observe(new \App\Observers\UserActionsObserver);
    }

    public function dealerUsers(){
        return $this->belongsTo('App\User','dealer_id','id');
    }
	
	
	
}
