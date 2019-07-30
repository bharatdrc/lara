<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','name','totalattendee','totalslot','price','description'
    ];

    /**
     * The person that belong to the country.
     */
    public function productQuotes()
    {
        return $this->hasMany('App\Quote','product_id');
    }

    /**
     * The person that belong to the country.
     */
    public function addonesQuotes()
    {
        return $this->belongsToMany('App\Quote','quote_package','addon_id','quote_id')->withPivot('count');
    }
}
