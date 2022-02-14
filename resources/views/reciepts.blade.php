@extends('layouts.app')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">> 
  
    <div class="container">
       <!-- /.card -->
       <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
            Receipt Status
            </h3>
          </div>
          <div class="card-body">

                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link"  href="{{route('receipts') }}" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Receipt-in-progress</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('receipts.received')   }}" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Received</a>
              </li>


                 <li class="nav-item">
                <a class="nav-link active " href="{{route('receipts.received.all') }}" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All</a>
              </li>
            
            </ul>
            </div>
            </div>
            
               
    <div class="card-header">
                <h3 class="card-title">Receipt Status</h3>
              </div>
              <br/></br>
 <!--   <a class="btn btn-primary" href="javascript:void(0)" id="createNewBook"> Receive Paid Receipts </a>-->
<br><br><br>
<div class="container">
<div class="table-responsive">
 <!--   <a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Generate Invoice Number </a>-->
 <table class="table table-bordered data-table">       
  <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Application ID</th>
                <th style="color:green">Receipt ID</th>
                <th>Invoice Number</th>
                <th>Receipt Amount</th>
                <th>Invoice Date</th>
                <th>Receipt Date</th>
                <th>Invoice Document</th>
                <th>Receipt Document</th>
                <th>Description</th>
               
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   </div>

    
<script rel="stylesheet" src="{{ asset('/app/lib/ajax/jquery/1.9.1/jquery.js')}}" ></script>
<script rel="stylesheet" src="{{ asset('/app/lib/ajax/jquery/3.3.1/jquery.min.js')}}" ></script>

<script rel="stylesheet" src="{{ asset('/app/lib/ajax/jquery-validate/1.19.0/jquery.validate.js')}}" ></script>
<script rel="stylesheet" src="{{ asset('/app/lib/1.10.16/js/jquery.dataTables.min.js')}}" ></script>
<script rel="stylesheet" src="{{ asset('/app/lib/4.1.3/js/bootstrap.min.js')}}" ></script>
<script rel="stylesheet" src="{{ asset('/app/lib/1.10.19/js/dataTables.bootstrap4.min.js')}}" ></script>


@include('layouts.modal_generate_receipts')

          

@endsection