<?php

namespace App\Http\Repository;


use App\Models\ApplyOnJobModel;
use App\Models\JobsModel;
use App\Models\SeekerModel;
use App\Models\SeekerProfile;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use App\Models\LocationModel;

class SeekerRepository
{

    public function fillSeekerProfile($data = []){
        try{


            $temp_data = $data->all();

//       dd($temp_data);
//            if(isset($data->gender))
//                $temp_data['gender']= $data->gender;
//            else
//                return ['code' => 400, 'message' => trim(Lang::get('seeker.seeker-profile-gender')),'data'=>[]];
            $check = SeekerProfile::where('seeker_id',$data->seeker_id)->first();

            if($data->hasFile('avtar')) {
                $ext = $data->avtar->getClientOriginalExtension();

                $path = Storage::putFileAs('seeker_pic', $data->avtar,time().$data->seeker_id .".".$ext);
                $temp_data['avtar'] = $path;
            }
            else{
                if($check ==null){
                    $temp_data['avtar'] = 'seeker_pic/dummy_user.png';
                }
                else{
                    $temp_data['avtar'] = $check->avtar;
                }

            }

            if($data->hasFile('resume')) {
                $ext = $data->resume->getClientOriginalExtension();

                $path = Storage::putFileAs('resumes', $data->resume,time().$data->seeker_id .".".$ext);
                $temp_data['resume'] = $path;
            }
            else
            {
                if($check ==null){
                    $temp_data['resume'] = '';
                }
                else{
                    $temp_data['resume'] = $check->resume;
                }
            }




            if($check ==null){
                $temp_data['created_at'] = Carbon::now();
                SeekerProfile::insert($temp_data);
            }
            else{
                $temp_data['updated_at'] = Carbon::now();
                SeekerProfile::where('seeker_id',$data->seeker_id)->update($temp_data);
            }
            $seeker = SeekerModel::find($data->seeker_id);
            $seeker->profile_update = 1;
            $seeker->save();
            $permnnt_seeker = $seeker->toArray();
            $profile = $seeker->seekerProfile;
            $temp_profile = $profile->toArray();
            $avtar = $profile->avtar;
            $resume = $profile->resume;
            $temp_profile['avtar'] =  asset('public/storage/'.$avtar);
            $temp_profile['resume'] =  asset('public/storage/'.$resume);

            $location_id = $profile->preferred_location;
            $location = LocationModel::find($location_id);
            if($location != null){
                $temp_profile['preferred_location'] = $location_id;
                $temp_profile['preferred_location_name'] = $location->location_name;
            }
            else{
                $temp_profile['preferred_location'] = $location_id;
                $temp_profile['preferred_location_name'] = '';
            }


            $job_type_id = $profile->job_type;
            $jobType = $profile->jobType;
            if($jobType != null){
                $temp_profile['job_type'] = $job_type_id;
                $temp_profile['job_type_name'] = $jobType->job_type;
            }
            else{
                $temp_profile['job_type'] = $job_type_id;
                $temp_profile['job_type_name'] = '';
            }


            $seeker_qualification_id = $profile->seeker_qualification;
            $seekerQualification = $profile->seekerQualification;
            if($seekerQualification != null){
                $temp_profile['seeker_qualification'] = $seeker_qualification_id;
                $temp_profile['seeker_qualification_name'] = $seekerQualification->qualification;
            }
            else{
                $temp_profile['seeker_qualification'] = $seeker_qualification_id;
                $temp_profile['seeker_qualification_name'] = '';
            }


            $area_of_sector_id = $profile->area_of_sector;
            $area_of_sector = $profile->seekerAreaOfSector;
            if($area_of_sector != null){
                $temp_profile['area_of_sector'] = $area_of_sector_id;
                $temp_profile['area_of_sector_name'] = $area_of_sector->area_of_sector;
            }
            else{
                $temp_profile['area_of_sector'] = $area_of_sector_id;
                $temp_profile['area_of_sector_name'] = '';
            }


            if($profile->work_experience == 'freasher'){
                $temp_profile['specialization'] = '';
                $temp_profile['specialization_name'] = '';
                $temp_profile['role_type_name'] = '';
                $temp_profile['role_type'] = '';
            }
            else{
                $specialization_id = $profile->specialization;
                $specialization = $profile->seekerSpecialization;
                // dd($specialization);
                if($specialization != null){
                    $temp_profile['specialization'] = $specialization_id;
                    $temp_profile['specialization_name'] = $specialization->specialization;
                }
                else{
                    $temp_profile['specialization'] = $specialization_id;
                    $temp_profile['specialization_name'] = '';
                }


                $role_type_id = $profile->role_type;
                $role_type = $profile->seekerRoleType;
                if($role_type != null){
                    $temp_profile['role_type'] = $role_type_id;
                    $temp_profile['role_type_name'] = $role_type->job_by_role;
                }
                else{
                    $temp_profile['role_type'] = $role_type_id;
                    $temp_profile['role_type_name'] = '';
                }


            }

            $permnnt_seeker['seeker_profile'] =  $temp_profile;


            $permnnt_seeker['seeker_profile'] =  $temp_profile;

            return ['code' => 200,'status'=>true, 'message' => 'Profile has been updated successfully.','data'=>$permnnt_seeker];

        }
        catch (\Exception $exception){
            return ['code' => 500, 'status' => false, 'message' => $exception->getMessage(),'data'=>[]];
        }
    }


    public function applyjob($data = [], $model){
         try {
            $check = ApplyOnJobModel::GetJobApplication($data['job_id'], $data['seeker_id'])->get()->toArray();
            if (count($check) > 0) {
                return ['code' => 400, 'message' => trim(Lang::get('seeker.already-apply'))];
            } else {
                $data['created_at'] = Carbon::now();
                $model->insert($data);
                $recruiter = JobsModel::find($data['job_id'])->postedRecruiter;
                    if($recruiter->device_type != null){
                        $title = 'Job Portal';
                        $body = trim(Lang::get('recruiter.recruiter-notify.applied-on-job'));
                        $notify = $this->firebase_notification($recruiter->device_token,$title,$body);
                    }

                return ['code' => 200, 'status' => true, 'message' => trim(Lang::get('seeker.apply-success'))];
            }
       }
        catch (\Exception $exception){
            return ['code' => 500, 'status' => false, 'message' => $exception->getMessage()];
        }
    }

    public function sendNotificationRegisteredUser(){

        $page = 'notification';
        $sub_page = 'notify-registered-users';
        $app_users = AppUser::all();
//        dd($app_users);
        return view('admin.notifyregisterd',compact('page','sub_page','app_users'));
    }


    public function firebase_notification($device_token,$title,$body){

        $API_ACCESS_KEY= 'AAAAN1pXap0:APA91bGolaXhXdz-gH74YVIGtM5lryB67HxZpKtayOmfD7JFSv2dnaGjLdJJJ2ezzeLBN1hWCww23dQIxlsPT-YX9fytENzNrLBLUip4hNgrPMYcxwGK5quYL2TDggzv_FvoUPAiA2gU';
     

     $msg = array
          (
            'body'    => $body,
            'title'   => $title,
            'icon'    => 'myicon',/*Default Icon*/
            'sound'   =>  'mySound'/*Default sound*/
          );
    $fields = array
            (
                'to'        => $device_token,
                'notification'    => $msg
            );
    
    
    $headers = array
            (
                'Authorization: key=' . $API_ACCESS_KEY,
                'Content-Type: application/json'
            );
        #Send Reponse To FireBase Server    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        #Echo Result Of FireBase Server

    }
}
