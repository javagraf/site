<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
    protected $table = 'jobs';

    public function scopeGetRecuiterJobById($query, $recruiter_id, $job_id)
    {
        return $query->where('id', $job_id)->where('recruiter_id', $recruiter_id);
    }
    
    public function scopeProfileMatchedJobs($query, $qualification, $location, $specilization, $role_type)
    {
        return $query->where('qualification', $qualification)
            ->orWhere('job_location', $location)
            ->orWhere('specialization', $specilization)
            ->orWhere('job_by_roles', $role_type);
        //->orWhere('job_type', $job_type);
    }

    public function scopeGetSearchedJobs($query, $value, $experience, $qualification, $locations, $job_type, $specialization, $designation, $area_of_sector)
    {
        // return $query->where('skills_required', 'like', '%' . $value . '%')
        //     ->orWhere('job_discription', 'like', '%' . $value . '%')
        //     ->orWhere('experience', 'like', '%' . $value . '%')
        //     ->orWhere(function ($query) use ($experience) {
        //         $query->whereIn('experience', $experience);
        //     })->orWhere(function ($query) use ($qualification) {
        //         $query->whereIn('qualification', $qualification);
        //     })->orWhere(function ($query) use ($locations) {
        //         $query->whereIn('job_location', $locations);
        //     })->orWhere(function ($query) use ($job_type) {
        //         $query->whereIn('job_type', $job_type);
        //     })
        //     ->orWhere(function ($query) use ($specialization) {
        //         $query->whereIn('specialization', $specialization);
        //     })
        //     ->orWhere(function ($query) use ($designation) {
        //         $query->whereIn('job_by_roles', $designation);
        //     })
        //     ->orWhere(function ($query) use ($area_of_sector) {
        //         $query->whereIn('area_of_sector', $area_of_sector);
        //     });

        $query = $this;


        if(count($job_type) > 0){

            $query = $query->where(function($query)  use ($job_type) {
                $query->whereIn('job_type', $job_type);
            });

        }

        if(count($specialization) > 0){

            $query = $query->where(function($query)  use ($specialization) {
                $query->whereIn('specialization', $specialization);
            });
        }

        if(count($area_of_sector) > 0){

            $query = $query->where(function($query)  use ($area_of_sector) {
                $query->whereIn('area_of_sector', $area_of_sector);
            });
        }

        if(count($designation) > 0){
            $query = $query->where(function($query)  use ($designation) {
                $query->whereIn('job_by_roles', $designation);
            });
        }


        if(count($experience) > 0){
            $query = $query->where(function($query)  use ($experience) {
                $query->whereIn('experience', $experience);
            });
        }

        if(count($qualification) > 0){
            $query = $query->where(function($query) use ($qualification) {
                $query->whereIn('qualification', $qualification);
            });
        }

        if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }
        $query = $query->where('skills_required', 'like', '%' . $value . '%')
            ->orWhere('job_discription', 'like', '%' . $value . '%')
            ->orWhere('experience', 'like', '%' . $value . '%');
        return $query;
    }

    public function scopeGetSearchedJobsWithRole($query, $value, $job_role_ids, $experience, $qualification, $locations, $job_type, $specialization, $designation, $area_of_sector)
    {

        $query = $this;

        if(count($job_role_ids) > 0){

            $query = $query->where(function($query)  use ($job_role_ids) {
                $query->whereIn('job_by_roles', $job_role_ids);
            });

        }
        else{

            $query = $query->where('skills_required', 'like', '%' . $value . '%')
                ->orWhere('job_discription', 'like', '%' . $value . '%')
                ->orWhere('experience', 'like', '%' . $value . '%');
        }

        if(count($job_type) > 0){

            $query = $query->where(function($query)  use ($job_type) {
                $query->whereIn('job_type', $job_type);
            });
        }

        if(count($specialization) > 0){

            $query = $query->where(function($query)  use ($specialization) {
                $query->whereIn('specialization', $specialization);
            });
        }

        if(count($area_of_sector) > 0){

            $query = $query->where(function($query)  use ($area_of_sector) {
                $query->whereIn('area_of_sector', $area_of_sector);
            });
        }

         if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }


        if(count($experience) > 0){
            $query = $query->where(function($query)  use ($experience) {
                $query->whereIn('experience', $experience);
            });
        }

        if(count($qualification) > 0){
            $query = $query->where(function($query) use ($qualification) {
                $query->whereIn('qualification', $qualification);
            });
        }

        if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }


        return $query;
    }


    public function scopeGetSearchedJobsWithLoca($query, $value, $location_ids, $experience, $qualification, $locations, $job_type, $specialization, $designation, $area_of_sector)
    {

        $query = $this;

        if(count($location_ids) > 0){

            $query = $query->where(function($query)  use ($location_ids) {
                $query->whereIn('job_location', $location_ids);
            });

        }
        else{

            $query = $query->where('skills_required', 'like', '%' . $value . '%')
                ->orWhere('job_discription', 'like', '%' . $value . '%')
                ->orWhere('experience', 'like', '%' . $value . '%');
        }

        if(count($job_type) > 0){

            $query = $query->where(function($query)  use ($job_type) {
                $query->whereIn('job_type', $job_type);
            });
        }

        if(count($specialization) > 0){

            $query = $query->where(function($query)  use ($specialization) {
                $query->whereIn('specialization', $specialization);
            });
        }

        if(count($area_of_sector) > 0){

            $query = $query->where(function($query)  use ($area_of_sector) {
                $query->whereIn('area_of_sector', $area_of_sector);
            });
        }

        if(count($designation) > 0){
            $query = $query->where(function($query)  use ($designation) {
                $query->whereIn('job_by_roles', $designation);
            });
        }


        if(count($experience) > 0){
            $query = $query->where(function($query)  use ($experience) {
                $query->whereIn('experience', $experience);
            });
        }

        if(count($qualification) > 0){
            $query = $query->where(function($query) use ($qualification) {
                $query->whereIn('qualification', $qualification);
            });
        }

        if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }


        return $query;
    }

    public function scopeGetSearchedJobsWithCom($query, $value, $comapny_ids, $experience, $qualification, $locations, $job_type, $specialization, $designation, $area_of_sector)
    {

        // return $query->where('skills_required', 'like', '%' . $value . '%')->orWhere('job_discription', 'like', '%' . $value . '%')->orWhere('experience', 'like', '%' . $value . '%')->orWhere(function ($query) use ($comapny_ids) {
        //     $query->whereIn('recruiter_id', $comapny_ids);

        // })->orWhere(function ($query) use ($experience) {
        //     $query->whereIn('experience', $experience);
        // })->orWhere(function ($query) use ($qualification) {
        //     $query->whereIn('qualification', $qualification);
        // })->orWhere(function ($query) use ($locations) {
        //     $query->whereIn('job_location', $locations);
        // })->orWhere(function ($query) use ($job_type) {
        //     $query->whereIn('job_type', $job_type);
        // })
        //     ->orWhere(function ($query) use ($specialization) {
        //         $query->whereIn('specialization', $specialization);
        //     })
        //     ->orWhere(function ($query) use ($designation) {
        //         $query->whereIn('job_by_roles', $designation);
        //     })
        //     ->orWhere(function ($query) use ($area_of_sector) {
        //         $query->whereIn('area_of_sector', $area_of_sector);
        //     });
        $query = $this;

        if(count($comapny_ids) > 0){

            $query = $query->where(function($query)  use ($comapny_ids) {
                $query->whereIn('recruiter_id', $comapny_ids);
            });

        }
        else{

            $query = $query->where('skills_required', 'like', '%' . $value . '%')
                ->orWhere('job_discription', 'like', '%' . $value . '%')
                ->orWhere('experience', 'like', '%' . $value . '%');
        }

        if(count($job_type) > 0){

            $query = $query->where(function($query)  use ($job_type) {
                $query->whereIn('job_type', $job_type);
            });
        }

        if(count($specialization) > 0){

            $query = $query->where(function($query)  use ($specialization) {
                $query->whereIn('specialization', $specialization);
            });
        }

        if(count($area_of_sector) > 0){

            $query = $query->where(function($query)  use ($area_of_sector) {
                $query->whereIn('area_of_sector', $area_of_sector);
            });
        }

        if(count($designation) > 0){
            $query = $query->where(function($query)  use ($designation) {
                $query->whereIn('job_by_roles', $designation);
            });
        }


        if(count($experience) > 0){
            $query = $query->where(function($query)  use ($experience) {
                $query->whereIn('experience', $experience);
            });
        }

        if(count($qualification) > 0){
            $query = $query->where(function($query) use ($qualification) {
                $query->whereIn('qualification', $qualification);
            });
        }

        if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }


        return $query;
    }

    public function scopeGetSearchedJobsWithOutVal($query, $experience, $qualification, $locations, $job_type, $specialization, $designation, $area_of_sector)
    {

        $query = $this;
        if(count($job_type) > 0){

            $query = $query->where(function($query)  use ($job_type) {
                $query->whereIn('job_type', $job_type);
            });
        }

        if(count($specialization) > 0){

            $query = $query->where(function($query)  use ($specialization) {
                $query->whereIn('specialization', $specialization);
            });
        }

        if(count($area_of_sector) > 0){

            $query = $query->where(function($query)  use ($area_of_sector) {
                $query->whereIn('area_of_sector', $area_of_sector);
            });
        }

        if(count($designation) > 0){
            $query = $query->where(function($query)  use ($designation) {
                $query->whereIn('job_by_roles', $designation);
            });
        }


        if(count($experience) > 0){
            $query = $query->where(function($query)  use ($experience) {
                $query->whereIn('experience', $experience);
            });
        }

        if(count($qualification) > 0){
            $query = $query->where(function($query) use ($qualification) {
                $query->whereIn('qualification', $qualification);
            });
        }

        if(count($locations) > 0){
            $query = $query->where(function($query) use ($locations) {
                $query->whereIn('job_location', $locations);
            });
        }

        return $query;
    }


    public function jobApplications()
    {
        return $this->hasMany('App\Models\ApplyOnJobModel', 'job_id');
    }

    public function jobType()
    {
        return $this->belongsTo('App\Models\JobTypesModel', 'job_type');
    }

    public function areaOfSector()
    {
        return $this->belongsTo('App\Models\AreaOfSectorsModel', 'area_of_sector');
    }

    public function jobRole()
    {
        return $this->belongsTo('App\Models\JobByRolesModel', 'job_by_roles');
    }

    public function jobQualification()
    {
        return $this->belongsTo('App\Models\QualificationModel', 'qualification');
    }

    public function jobLocation()
    {
        return $this->belongsTo('App\Models\LocationModel', 'job_location');
    }

    public function jobSpecialization()
    {
        return $this->belongsTo('App\Models\SpecializationModel', 'specialization');
    }

    public function postedRecruiter()
    {
        return $this->belongsTo('App\Models\RecruiterModel', 'recruiter_id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return ($value == null ? '' : $value);
    }
}
