<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eventname','shortname','subtitle','url','email','titleimage','logo','language','description','customcss','company_id','quote_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }

    /**
     * The person that belong to the country.
     */

    public function locations()
    {
        return $this->hasMany('App\Location','event_id');
    }

    /**
     * The person that belong to the country.
     */
    public function timeslots()
    {
        return $this->hasMany('App\Timeslot','event_id');
    }

    /**
     * The person that belong to the country.
     */
    public function participants()
    {
        return $this->hasMany('App\EventParticipation','event_id');
    }

    /**
     * The person that belong to the country.
     */
    public function quote()
    {
        return $this->hasOne('App\Quote','addon_id');
    }

    /**
     * The person that belong to the country.
     */
    public function customfields()
    {
        return $this->hasMany('App\Customfield','event_id');
    }
}
