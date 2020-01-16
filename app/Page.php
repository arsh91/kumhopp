<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    // Tell laravel to retrieve the model by the $slug instead of the default $id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

?>