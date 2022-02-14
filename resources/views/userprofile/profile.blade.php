@extends('layouts.app_app')
@section('content')

@include('layouts.custom_supplier_js')

<meta name="csrf-token" content="{{ csrf_token() }}">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

        @php   $count=0;   @endphp
       @foreach ($dataa as $key => $user)
                            @if(!empty($user->getRoleNames())) 
                            @foreach($user->getRoleNames() as $v)
                             @if($v == 'Applicant')
                             @php   $count=1;   @endphp
                             @endif
                                                     


   @endforeach
   @endif
  @endforeach 

            <!-- About Me Box -->
           

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">About Me</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
@if($count == 0  ) 
<br>
<strong><i class="far fa-file-alt mr-1"></i> Upload A Document</strong>
<!-- <p class="text-muted"><input type="file" name="upload_cv" required /></p> -->
<button class="btn btn-secondary"  id="upload_cv" > <i class="fas fa-check"> Upload A Document </i>  </button> 
@endif

</div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Users-Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="active tab-pane" id="settings">
                  <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    @if (count($errors) > 0)

                        <div class="alert alert-danger">

                            <strong>Whoops!</strong> There were some problems with your input.<br><br>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><h2>Edit User:  {{ Auth::user()->user_name   }} </h2></h3>


                            <div class="card-tools">

                                <a class="btn btn-primary" href="{{ route('application_reception') }}"> Back</a>

                            </div>

                        </div>
   {!! Form::model($user, ['method' => 'PATCH','route' => ['users_profile.update', $user->id]]) !!}
   <div class="card-body">
                         <strong>First Name:</strong>
                         {!! Form::text('first_name',null , array('placeholder' => 'First Name','class' => 'form-control')) !!}
                         <strong>Middle Name:</strong>
                         {!! Form::text('middle_name',null , array('placeholder' => 'Middle Name','class' => 'form-control')) !!}
                         <strong>Last Name:</strong>
                         {!! Form::text('last_name',null , array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                         <strong>Country:</strong>

                     {!! Form::select('country_id',$countries_id,$countries, array('class' => 
                     'form-control')) !!}
                   <div class="form-group">
                  <strong>Email:</strong>
                 {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                            </div>
                       <strong>Street :</strong>
                         {!! Form::text('street',null , array('placeholder' => 'Street','class' => 'form-control')) !!}

                          <strong>state :</strong>
                         {!! Form::text('street',null , array('placeholder' => 'state','class' => 'form-control')) !!}

                        <strong>Postal Code :</strong>
                         {!! Form::text('postal_code',null , array('placeholder' => 'postal ode','class' => 'form-control')) !!}
                        
                         <strong>Telephone:</strong>
                         {!! Form::text('telephone',null , array('placeholder' => 'telephone','class' => 'form-control')) !!}
                        

                         <strong>city:</strong>
                         {!! Form::text('city',null , array('placeholder' => 'city','class' => 'form-control')) !!}
                        

                         <strong>Fax:</strong>
                         {!! Form::text('fax',null , array('placeholder' => 'fax','class' => 'form-control')) !!}
                        
                         <strong>User Name :</strong>
                         {!! Form::text('user_name',null , array('placeholder' => 'user name','class' => 'form-control')) !!}
                        
                         <strong>Website Url :</strong>
                         {!! Form::text('website_url',null , array('placeholder' => 'website url','class' => 'form-control')) !!}
                        
                         <strong>Email :</strong>
                         {!! Form::text('email',null , array('placeholder' => 'email','class' => 'form-control')) !!}
                        
                         <strong>Business Address :</strong>
                         {!! Form::text('business_address',null , array('placeholder' => 'email','class' => 'form-control')) !!}
                        
                         <div class="form-group">
                    <input type="text" id="2" value="Applicant" name="roles" hidden />

                            </div>
                          
                         <div class="form-group">
                        
      

<strong>Password:</strong>
<div id="pass_email_success" class="alert alert-success alert-sm" style="display:none"></div>
<div id="pass_response_email_danger" class="alert alert-danger alert-sm" style="display:none"></div>
<div id="pass_response_email_warning" class="alert alert-warning alert-sm" style="display:none"></div>
{!! Form::password('password', array( 'id'=>'password','required','placeholder' =>  'Password','class' => 'form-control','onkeyup'=>'check_strength_password(this.value)')) !!}
</div>

<div class="form-group">
<strong>Confirm Password:</strong>
{!! Form::password('confirm-password',array('id'=>'confirm_password', 'required','placeholder' => 'Confirm Password','class' =>  'form-control','onkeyup'=>'check_strength_password_confirm(password.value,this.value)')) !!}
</div>

                            <div class="card-footer">
                            <button type="submit" id="submit_Save" style="display:block"class="btn btn-success">Submit</button>
                            </div>


                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</script>




@include('layouts.modal_upload_cv')




@include('layouts.custom_supplier_js')




@endsection