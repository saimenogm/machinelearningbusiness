@extends('layouts.app_app')
@section('content')  

<!-- check_list_js.blade.php -->

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}" >
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }} ">
  <link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
  <!-- SimpleMDE -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
 
<!--   
plugins -->
<script rel="javascript" src="{{ asset('/app/lib/ajax/jquery/1.9.1/jquery.js')}}" ></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href={{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}>



<link rel="stylesheet" href="{{ asset('/app/lib/twitter-bootstrap/4.1.3/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!--<link rel="stylesheet" href="{{ asset('3.3.6/bootstrap.min.css')}}" >-->
<link rel="stylesheet" href="{{ asset('/app/lib/1.10.16/css/jquery.dataTables.min.css')}}" >
<link rel="stylesheet" href="{{ asset('/app/lib/1.10.19/css/dataTables.bootstrap4.min.css')}}" >
    <!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}" >
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}" >
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" >

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

<script rel="javascript" src="{{ asset('/app/lib/ajax/jquery-validate/1.19.0/jquery.validate.js')}}" ></script>
<script rel="javascript" src="{{ asset('/app/lib/1.10.16/js/jquery.dataTables.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('/app/lib/4.1.3/js/bootstrap.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('/app/lib/1.10.19/js/dataTables.bootstrap4.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('plugins/toastr/toastr.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}" ></script>
<!-- Select2 -->
<script rel="stylesheet" src="{{ asset('plugins/select2/js/select2.full.min.js')}}" ></script>
<script src="{{ asset('dist/js/demo.js')}}" ></script>




<div class="row" >
          <div class="col-12">
<!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acknowledgement Letter</h1>
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="letter_acknowledgement">
            <!-- <div class="callout callout-info"> -->
              <!-- <h5><i class="fas fa-info"></i> Note:</h5>
             <img src="../../../images/nmfs.jpg"  alt="image" height="190" width="auto"/> -->
            <!-- </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                 
                  <img src="../../../images/nmfa_header.png"  alt="image" height="140" width="1000"/>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
  <div class="row invoice-info">
@foreach($check_list as $checked) @endforeach


@foreach($country_contact_info as $country) @endforeach
<input hidden id="application_id" value="{{$checked->application_id}} " />
<div class="container"> 
 

  <p class="list-group">
  <div class="panel panel-default">

  <div class="panel-heading"  >Date: <span id="current_date"> @php $t=time(); echo date("d-m-Y",$t); @endphp</span> </div>
  <br/>
  <div class="panel-body"  >Ref: <span id="RL_squential_number"> {{ $random_application_RL_squential_number }} </span>  </div>
  <br/>
  <div class="panel-body">
 To: <span id="applicant_name"> {{ $checked->fullname_contact}} </span>  <br/>
 <ul>
    <li> <span id="state_plot_number"> {{ $checked->address_line_one}} , {{ $checked->address_line_two}}  </span> </li> <br/>
    <li> <span id="country"> {{ $country->country_name}} </span> </li>  </br>
  <!-- <li> [country]  </li>    </br> -->
  </ul>
</div>
</div>
  </p>

<style>
p,block {
    text-align: justify;
}


</style>
     
<b> Subject: Acknowledgement Letter for the Completion of Preliminary Assessment </b> 
<br/><br/>
<block style="text-align: justify;">
<p>Dear Sir/Madam or  <span id="contact_person_name"> {{ $checked->fullname_contact}} </span> ,</p>
<br/>
This is to kindly inform you that the preliminary assessment of your application <span id="application_number"> {{ $checked->application_number}}   </span>  showed completeness and has therefore passed for the evaluation process. Please be informed that the evaluation decision of the NMFA will be communicated within <span style="border:0.5px">
@if($number_days_receipts == '')
<input type="number" min="0" width="10" hieght="10"   id="days_of_receipt" /> </span> days of receipt of this notification.
@else
{{  $number_days_receipts }}
@endif
</block>
<br/><br/>
<p> Best regards,  </p>

Iyassu Bahta
Director, National Medicines and Food Administration
Ministry of Health
Asmara, Eritrea

                </div>
                <br><br>
    <p>
<img src="../../../images/nmfa_footer.png"  alt="image" height="90" width="1000"/>       
</p>        
                </div>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">

               
   <br><br>
   @if($path =='')
   <button type="button" class="btn btn-primary float-md-right" style="margin-right: 5px;" 
                id="acknowledgment_letter">
                <i class="fas fa-save"></i> Save
                </button>
                
   <div id="actions_to_applicant"  style="float-right;display:none"> 
                  <a href=""  id="get_path" rel="noopener" target="_blank" class="btn btn-warning"><i class="fas fa-download"></i> Download </a>
                  &nbsp;  &nbsp;  &nbsp;

                  <button type="button" class="btn btn-info float-right"   id="upload_acknowledgment_letter">
                  <i class="fas fa-upload"></i> Send To Applicant  ( {{ $checked->fullname_contact}})
                  </button>
@else

  <div id="actions_to_applicant"  style="float-right;display:block"> 
                  <a href="{{ $path }}"  id="get_path" rel="noopener" target="_blank" class="btn btn-warning"><i class="fas fa-download"></i> Download </a>
                  &nbsp;  &nbsp;  &nbsp;

  <button type="button" id="upload_acknowledgment_letter" class="btn btn-info float-right"> <i class="fas fa-upload"></i> Send To Applicant  ( {{ $checked->fullname_contact}})
                  </button>
  @endif




    </div>
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



  
</div>
<!-- ./wrapper -->



        
@include('layouts.acknowledgement_list_js')

@include('layouts.modal_upload_acknowledgment_letter')


@endsection