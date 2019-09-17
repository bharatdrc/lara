<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class revenue extends Model
{
        /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'revenues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dailyrevenue','store_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function store()
    {
        return $this->belongsTo('App\store','store_id');
    }
}
