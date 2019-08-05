<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description','type','attendee','event_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

    /**
     * The person that belong to the country.
     */
    public function timeslotes()
    {
        return $this->belongsToMany('App\Timeslot','locations_timeslots','location_id','timeslot_id');
    }
}
