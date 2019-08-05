<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipation extends Model
{
    const EVENT_PARTICIPATION_STATUS_INACTIVE = 0;
	const EVENT_PARTICIPATION_STATUS_PENDING = 1;
	const EVENT_PARTICIPATION_STATUS_ACTIVE = 2;
	const EVENT_PARTICIPATION_STATUS_CANCELLED = 3;


     /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'event_participations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id','user_id','status'
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
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
