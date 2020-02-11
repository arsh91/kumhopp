<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_name', 'contact_name', 'phone', 'address', 'website', 'title', 'description', 'status', 'budget', 'deadline', 'fund_option', 'dealer_id', 'target', 'job_created_by', 'sell_status', 'campaign_start_date', 'campaign_end_date', 'reward_per_tyre'
    ];

    public function dealers(){
        return $this->belongsTo('App\User','dealer_id','id');
    }
	
	public function dealerCompany(){
        return $this->belongsTo('App\Dealer','dealer_id','id');
    }
	
	public function getSalesPerson(){
		return $this->belongsTo('App\User','job_created_by','id');
	}
		
}

?>