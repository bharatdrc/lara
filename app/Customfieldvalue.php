<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customfieldvalue extends Model
{
    /**
     * table name fot model
     *
     * @var string
     */
    protected $table = 'customfieldvalue';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value_string','value_boolean','value_integer','value_double','value_serialize','customfield_id'
    ];

    /**
     * The person that belong to the country.
     */
    public function getValue(\App\Customfield $customfield)
    {

        switch ($customfield->type) {
            case 1:

                $value = $customfield->customfieldvalues->first()->value_string;

                break;
            case 2:
                $value = unserialize($customfield->customfieldvalues->first()->value_string);
                break;
            case 3:
                $value = $customfield->customfieldvalues->first()->value_string;
                break;
            case 4:
                $value = $customfield->customfieldvalues->first()->value_string;
                break;
            default:
                $value = $customfield->customfieldvalues->first()->value_string;
        }
        return $value;
    }

    /**
     * The person that belong to the country.
     */
    public function customfield()
    {
        return $this->belongsTo('App\Customfield','customfield_id');
    }

}
