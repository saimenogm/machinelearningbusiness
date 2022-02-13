@extends('layouts.app')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<!-- <link rel="stylesheet" href="{{ asset('/app/lib/twitter-bootstrap/4.1.3/css/bootstrap.min.css')}}" > -->
    <!-- <link rel="stylesheet" href="{{ asset('/app/lib/1.10.16/css/jquery.dataTables.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('/app/lib/1.10.19/css/dataTables.bootstrap4.min.css')}}" >
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> -->
    
    <!-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 -->

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Application Check List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                              <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th {{ $i=0 }}>ID</th>
                    <th>Application Number</th>
                 
                    <th>Product Name</th>
                    <th>Supplier Name</th>
                    <th>Supplier contact Name</th>
                    <th>Application Status</th>
                    <th>Action</th>
                    <th>Issue Query</th>
                
                  </tr>
                  </thead>
                  <tbody {{ $i=1 }}>
                  @foreach($applications as $application)
               <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $application->application_number }}</td>
                   
                    <td>{{ $application->product_trade_name }}</td>
                    <td>{{ $application->trade_name  }}</td>
                   <td>{{ $application->first_name." ".$application->middle_name." ".$application->last_name }}</td>
                   <td><button class="btn btn-warning btn-xs"> {{ $application->application_status }} </button></td>
                    <td>   
                    @if($application->check_app == '' )
<a  href="{{ route('application.checklist',$application->application_id)  }}" <i class='fas fa-battery-empty'>Validate </i> </a>
                    @else
<a href="{{ route('application.checklist_update',$application->application_id)  }}" <i class='fas fa-battery-half'><span style="color:green"> Validate </span> </i> </a>
                    @endif
  
                  </button>
                  </td>
                  <td>
                    <a  href="{{ route('application.IssueQuery',$application->application_id)  }}" 
                      <i class='fas fa-question'>Issue Query </i> </a>
</td>
                  </tr>
                @endforeach
                  
                  </tbody>
                  <tfoot>
                
                  
                  </tfoot>
                </table>
                            </div>
                           </div>
                         </div>
                            <!-- /.card-body -->
                      </div>
                 </div>
           </div>
      </div>
  </section>

  @endsection






