<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Telephone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

}
