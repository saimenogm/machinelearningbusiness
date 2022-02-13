@extends('layouts.app')

<!-- @section('stylesheets')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection -->

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
                              <h3 class="card-title">Supervisor Check List Progress Status </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                              <table id="example" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr>
                    <th {{ $i=0 }}>ID</th>
                    <th>Application Number</th>
                    <th>Application Status</th>
                    <th>Product Name</th>
                    <th>Supplier Name</th>
                    <th>Application Assigned To</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody {{ $i=1 }}>
                  @foreach($applications as $application)
               <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $application->application_number }}</td>
                    <td>{{ $application->application_status }}</td>
                    <td>{{ $application->product_trade_name }}</td>
                    <td>{{ $application->trade_name  }}</td>
                    <td style="color:black"> {{ $application->fullname }}</td>
                    <td>   
                    @if($application->check_app == '' )
                    <button  class="btn btn-warning btn-xs" > in process </button> 

<!-- <a  href="{{ route('application.checklist',$application->application_id)  }}" <i class='fas fa-battery-empty'>Validate </i> </a> -->
                    @else
<a href="{{ route('supervisor_check_progress_of_assessor.checklist_progress',$application->application_id)  }}" <i class='fas fa-battery-half'><span style="color:green"> View Preliminary Screening </span> </i> </a>
                    @endif
  
                  </button>
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

  @endsection
