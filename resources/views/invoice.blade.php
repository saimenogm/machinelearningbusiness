@extends('layouts.app')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Theme style --
    <div class="container">
    <br>
-->
<div class="card-header">
<h3 class="card-title">Invoice Status</h3>
</div>
              <br/></br>
              <div class="container">
<div class="table-responsive">
 <!--   <a class="btn btn-success" href="javascript:void(0)" id="createNewBook"> Generate Invoice Number </a>-->
 <!-- <table class="table table-bordered table-condensed  table-responsive table-hover data-table"  id="example1"> -->
 <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Application Number </th>
                <th>UserId</th>
                <th>Generic Name</th>
                <th>Product Trade Name </th>
                <th>Company Supplier Name</th>
                <th>Maufacturer Name</th>
                <th>Application Type</th>
                <th>Generated Invoice Number</th>
                <th>Remark</th>
                <th>Amount</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>
   
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




@include('layouts.modal_generate_invoice')




          

@endsection