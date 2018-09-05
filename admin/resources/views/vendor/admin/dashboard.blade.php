@extends('app')

@section('main-content')
<section class="content">
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/all-user') }}">
                <div class="info-box bg-orange hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Seekers</div>
                        <div data-fresh-interval="20" data-speed="1000" data-to="{{$seeker}}" data-from="0" class="number count-to">{{$seeker}}</div>
                    </div>
                </div></a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/location')}}">
                <div class="info-box bg-pink hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">map</i>
                    </div>
                    <div class="content">
                        <div class="text">Locations</div>
                        <div class="number count-to" data-from="0" data-to="{{$location}}" data-speed="1000" data-fresh-interval="20">{{$location}}</div>
                    </div>
                </div>
            </a> 
            </div>
           
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/area-of-sectors')}}">
                <div class="info-box bg-cyan hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">business</i>
                    </div>
                    <div class="content">
                        <div class="text">Area of Sectors</div>
                       <div class="number count-to" data-from="0" data-to="{{$area}}" data-speed="1000" data-fresh-interval="20">{{$area}}</div>
                    </div>
                </div>
             </a>   
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/specialization')}}">
                <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">folder_special</i>
                    </div>
                    <div class="content">
                        <div class="text">Specialization</div>
                        <div data-fresh-interval="20" data-speed="1000" data-to="{{$specialization}}" data-from="0" class="number count-to">{{$specialization}}</div>
                    </div>
                </div>
             </a>
            </div>

        </div>
        <!-- #END# Widgets -->
           <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/recruiter/all-recruiter') }}">
                <div class="info-box bg-orange hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">record_voice_over</i>
                    </div>
                    <div class="content">
                        <div class="text">Recruiters</div>
                        <div data-fresh-interval="20" data-speed="1000" data-to="{{$recruiter}}" data-from="0" class="number count-to">{{$recruiter}}</div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/qualification')}}">
                <div class="info-box bg-pink hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Qualifications</div>
                        <div data-fresh-interval="20" data-speed="15" data-to="{{$qualification}}" data-from="0" class="number count-to">{{$qualification}}</div>
                    </div>
                </div>
            </a>
            </div>
           
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/job-by-role')}}">
                <div class="info-box bg-cyan hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">person_pin</i>
                    </div>
                    <div class="content">
                        <div class="text">Job by roles</div>
                        <div data-fresh-interval="20" data-speed="1000" data-to="{{$role}}" data-from="0" class="number count-to">{{$role}}</div>
                    </div>
                </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('/job-types')}}">
                <div class="info-box bg-light-green hover-expand-effect" style="cursor: pointer;">
                    <div class="icon">
                        <i class="material-icons">person_pin</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Job type</div>
                        <div data-fresh-interval="20" data-speed="1000" data-to="{{$type}}" data-from="0" class="number count-to">{{$type}}</div>
                    </div>
                </div>
            </a>
            </div>

        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <!-- graph start -->
      
            <!-- graph end -->
        <!-- #END# CPU Usage -->
    <div class="row clearfix">
                <!-- Visitors -->
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">RECENT JOBS IN</div>
                            <ul class="dashboard-stat-list">
                            <?php foreach ($job_by_roles as $job_by_roles) { ?><li>#{{$job_by_roles->job_by_role}}</li>
                                 <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">APPLIED JOBS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>{{$job_today}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>{{$job_yesterday}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    THIS MONTH
                                    <span class="pull-right"><b>{{$job_month}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    THIS YEAR
                                    <span class="pull-right"><b>{{$job_year}}</b> <small>JOBS</small></span>
                                </li>
                                <li>
                                    ALL
                                    <span class="pull-right"><b>{{ $apply_on_job}}</b> <small>JOBS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>


    </div>
</section>

    @endsection