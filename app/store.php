<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','target','user_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * The person that belong to the country.
     */
    public function revenues()
    {
        return $this->hasMany('App\revenue','store_id');
    }
}
