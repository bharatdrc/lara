<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'quotes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','addon_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function event()
    {
        return $this->belongsTo('App\Event','id');
    }

    /**
     * The person that belong to the country.
     */
    public function product()
    {
        return $this->belongsTo('App\Package','product_id');
    }

    /**
     * The person that belong to the country.
     */
    public function addons()
    {
        return $this->belongsToMany('App\Package','quote_package','quote_id','addon_id')->withPivot('count');
    }
}
