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
<h3 class="card-title">Issue Query</h3>
<div class="card-tools">
<button type="button" class="btn btn-primary float-right"   id="issue_query"> <i class="fas fa-question"></i> Issue Query </button>
<br><br>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                             



<table id="examplehu " class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th {{ $i=0 }}>ID</th>
                    <th>Application Number</th>
                    <th>Sequence Number</th>
                    <th>Application Status</th>
                    <th>Product Name</th>
                    <!-- <th>Supplier Name</th> -->
                    <th>Supplier contact Name</th>
                    <!-- <th>Issue Query</th> -->
                    <th>Upload Query</th>
                    <th>Answered Query</th>
                
                  </tr>
                  </thead>
                  <tbody {{ $i=1 }}>
                  @foreach($applications as $application)
               <tr>
                    <td>{{ $i++ }}</td>
                    <td id="application_number"> {{ $application->application_number }}</td>
                    <td id="application_number"> {{ $application->PS_squential_number  }}</td>
                    <td>{{ $application->application_status }}</td>
                    <td >{{ $application->product_trade_name }}</td>
                    <!-- <td>{{ $application->trade_name  }}</td> -->
                   <td id="contact_person_name_{{ $application->PS_squential_number }}">{{ $application->first_name." ".$application->middle_name." ".$application->last_name }}</td>

                  <!-- <td>
                    <a class="btn btn-primary"  href="{{ route('application.IssueQuery',$application->application_id)  }}" 
                    <i class="fas fa-question"></i>Issue Query </a>
                    
</td> -->
<td>
  @if($application->Name_of_the_product != '')

  <!-- <button type="button" class="btn btn-warning float-right"   id="upload_query"> <i class="fas fa-upload"></i> Upload </button> -->
  <a href="javascript:void(0)" data-toggle="tooltip" id="query"
              data-id="{{ $application->PS_squential_number }}"
              data-app_number= "{{ $application->application_number }}"
              
               data-original-title="Edit" class="edit btn btn-warning btn-sm editquery">
              <i class="fas fa-upload"></i> Upload </a>
  @else
  --
  @endif
                    
</td>
                

   <td>   

<a href="javascript:void(0)" data-toggle="tooltip" id="" data-id="{{ $application->PS_squential_number }}" data-original-title="Edit" class="edit btn btn-success btn-sm show">
              <i class="fas fa-eye"></i> Show </a>
  
  </td>
               
    @endforeach
                </tr>

          
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>






@include('layouts.modal_upload_issued_query_from_front_section')


@include('layouts.modal_upload_query_first_entry')



@include('layouts.modal_show_result_issued_query')

@endsection