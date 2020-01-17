<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'points', 'status', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role'] = $input ? $input : null;
    }

   /* public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withTrashed();
    }
*/

    public function isAdmin()
    {
       $role =  $this->attributes['role']; 
        if ($role == 1) {
            return true;
        }
        
        return false;
    }

    public function dealers(){
        //return $this->belongsTo('App\Dealer','dealer_id','id');
        return $this->hasOne('App\Dealer', 'dealer_id');
    }

	public function salespersons(){
        return $this->hasMany('App\SalePerson', 'user_id');
    }
}
