@extends('layouts.app')
@section('stylesheets')
<!-- <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->
@endsection

@section('content')



<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Queries </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer ">
                              <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th {{ $i=0 }}>ID</th>
                    <th>Application Number</th>
                    <th>Application Sequence</th>
                    <th>Product Name</th>
                    <th>Dosage Form</th>
                    <!-- <th>Strength</th> -->
                    <th>Application Status</th>
                    <th>Query Letter</th>
                    <th>Upload issued Query</th>
                
                  </tr>
                  </thead>
                  <tbody {{ $i=1 }}>
                  @foreach($applications as $application)
               <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $application->application_number }}</td>
                    <td>{{  $application->PS_squential_number }}</td>
                    <td id="contact_person_name_{{ $application->PS_squential_number }}">{{ $application->Name_of_the_product}}</td>
                    <td>{{ $application->dosage_form }}</td>
                   <!-- <td>{{ $application->strength }} </td> -->
                   <td>{{ $application->application_status }}</td>
                   <td>   
              <!-- <a href="{{ $application->path }}"  id="get_path" rel="noopener" target="_blank" 
              class="edit btn btn-success btn-sm editqueryy">
              <i class="fas fa-download"></i> Query </a> -->

      <a href="javascript:void(0)" data-toggle="tooltip" id="query_download" data-id="{{ $application->PS_squential_number  }}" 
      data-original-title="Edit"  class="edit btn btn-success btn-sm uploaded_assessor"> <i class="fas fa-download"></i> Query </a>
                  
                  </td>
                  <td>
            
    <!-- <a href="{{ $application->path }}"  id="get_path" rel="noopener" target="_blank" class="btn btn-primary">
    <i class="fas fa-upload"></i> Letter </a> -->

      <a href="javascript:void(0)" data-toggle="tooltip" id="query"
              data-id="{{ $application->PS_squential_number  }}" 
              data-original-title="Edit" 
              class="edit btn btn-primary btn-sm editquery">
              <i class="fas fa-upload"></i> Upload </a>

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

<script>

</script>




























































      


@include('layouts.modal_upload_issued_query_from_applicant')

@include('layouts.modal_upload_issued_query_from_asessor')



@endsection