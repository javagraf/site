<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    protected $table = 'location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_name'
    ];

    public function jobsByLocation(){
        return $this->hasMany('App\Models\JobsModel','job_location');
    }
}
