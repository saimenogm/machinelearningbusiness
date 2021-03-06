@extends('layouts.app')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
    
<div class="container">
       <!-- /.card -->
       <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
            Assigned / Un-Assigned / All
            </h3>
          </div>
          <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            <li class="nav-item"> 
                <a class="nav-link" href="{{route('un-assignment.index') }}" role="tab" aria-controls="custom-content-below-profile" 
                aria-selected="false">Un-Assigned</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('assignment.index') }}" role="tab" aria-controls="custom-content-below-profile" 
                aria-selected="false">Assigned</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active " href="{{route('assignment.all_assigned_unassigned') }}" role="tab" aria-controls="custom-content-below-profile"
                 aria-selected="false">All</a>
              </li>
            
            </ul>
            </div>
            </div>
            
                <!-- <h1>Assigned/UnAssigned/All</h1> -->
    <!--<a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Create New Book</a>-->
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                    <th>ID</th>
                    <th>Application Number</th>
                    <th>Application Status</th>
                    <th>Product Name</th>
                    <th> Applicant Contact Name</th>
                    <th>Applicant Business Name</th>
                    <th>Applicant  Assigned To</th>
                    <th>Applicant Assigned By</th>
                    <th>Applicant Assigned Date</th>
                    <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

  @endsection
  @section('scripts')
  <!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


@include('layouts.modal_assign_unassign_all')
@endsection