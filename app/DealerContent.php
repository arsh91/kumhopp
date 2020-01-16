<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DealerContent extends Model
{
    protected $table = 'dealer_contents';
	
	use SoftDeletes;

    protected $fillable = ['content_name','content_description'];

    public static function boot()
    {
        parent::boot();

        //Dealer::observe(new \App\Observers\UserActionsObserver);
    }
	
}
