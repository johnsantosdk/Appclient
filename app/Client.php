<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Telephone;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function telephones()
    {
    	return $this->hasMany('App\Telephone');
    }

    public function addTelephone(Telephone $phone)
    {
    	return $this->telephones()->save($phone);
    }

    public function destroyTelephones()
    {
        foreach ($this->telephones as $telephone) {
            $telephone->delete();
        }

        return true;
    }
}
