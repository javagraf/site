<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualificationModel extends Model
{
    protected $table = 'qualifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qualification'
    ];

    public function jobsByQualification(){
        return $this->hasMany('App\Models\JobsModel','qualification');
    }
}
