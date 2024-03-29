<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'timeslots';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'starttime','endtime','event_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

}
