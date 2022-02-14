<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<script rel="javascript" src="{{ asset('plugins/toastr/toastr.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}" ></script>
<div  class="modal fade" id="ajax_model_query_letter" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <input type="hidden" value="{{ Auth::user()->id }}" id="user_id" />
        <!-- <div class="modal-content"> -->
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title" id="query_modelHeading"></h4>
            </div>
            <div class="modal-body">
<form method="POST" enctype="multipart/form-data" id="ACKForm"     method="POST" name="ACKForm"  action="javascript:void(0)"  accept-charset="utf-8" class="form-horizontal"  >

              @csrf
              <input  type="hidden" id="applicant_number" name="application_number" required  class="form-control"  value="{{  @$application->application_number }}">    
    
              <input  type="hidden" id="applicant_user_id" name="applicant_user_id" required  class="form-control"  value="{{ @$application->user_id  }}">    
              <input  type="hidden" id="assesor_user_id" name="assesor_user_id"     required  class="form-control"  value="{{ Auth::user()->id  }}">    
              <input  type="hidden" id="sequence_number" name="sequence_number"     required  class="form-control"  value="{{ @$application->PS_squential_number  }}">    

              <input  type="hidden" id="dosage_form" name="dosage_form"     required  class="form-control"  value="{{ @$application->PS_squential_number  }}">    

              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group">
                        <label class="">Product Name</label>
                        <div class="col-sm-12">
                  <input id="app_name" name="app_name" required  class="form-control"  type="text" readonly >   
                        </div>
                        </div>

                        <div class="form-group">
                        <label > Upload Issued Query </label>
                        <div class="col-sm-12">
                        <input  id="receipt_file" type="file" name="file" required placeholder="File" class="form-control" >
                        </div>
                        </div>
  <div class="col-md-offset-2 col-sm-10">
  <button style="display:block"  type="submit" class="btn btn-primary"  id="UploadData" value="create"> Save changes
                     </button>
                   
                    </div>
                    
                </form>
            </div>
            <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th {{ $i=0 }}>ID</th>
                    <th>Refrence Number</th>
                    <th>Product Name</th>
                    <th>Dosage Forms</th>
                    <th>strength </th>
                    <th>Uploaded Documents </th>
                    <th>Delete </th>
                
                  </tr>
                  </thead>
                  <tbody id="table_upload_doc_doc">
                   </tbody>
                  <tfoot>
                
                  
                  </tfoot>
                </table>
        </div>
    </div>
</div>







<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

// $('#upload_query').click(function () {
  
//     });


//Edit Form Wizard Compostion
$('#upload_query').click(function () {

var table = document.getElementById('example1'),rIndex;
var count=table.rows.length;
for(var i =0; i < table.rows.length ; i++)
{ 
var row = table.rows[i];
row.onclick = function()
{
rIndex = this.rowIndex;
console.log(rIndex);
if(rIndex==0) { }   
else{
          var application_number  = this.cells[1].innerHTML;
          var sequence_number  = this.cells[2].innerHTML;
          var contact_person  = this.cells[3].innerHTML;
          var dosage_form  = this.cells[4].innerHTML;
          document.getElementById('dosage_form').value = dosage_form ;
          
         $('#app_name').val(contact_person.toUpperCase().trim());
         $('#query_modelHeading').html("Query /Upload");
         $('#ajax_model_query_letter').modal('show');



$.ajax({
    data:{
    application_number:application_number,
    sequence_number :sequence_number ,
    dosage_form:dosage_form,
    },

type:'POST',
dataType: 'json',
url: "{{ route('retrive_issued_query_from_front_section')  }}",

success: (data) => { 
    document.getElementById('table_upload_doc_doc').innerHTML = data.Data_returned;
},

error: function(data){
console.log(data);
}

});


}

}
}
});








//deletequery  di
$('body').on('click', '.deletequery', function () {
var document_id = $(this).data('id');
var sequence_number = $(this).data('di');
var file_name = $(this).data('file_name');

// alert(file_name);

if (confirm("Are sure  you want to remove this file??") == true)
               { 
                   

$.ajax({
    data:{
    sequence_number :sequence_number ,
    file_name :file_name,
    document_id:document_id,
    },

type:'POST',
dataType: 'json',
url: "{{ route('delete_file_data_applicant')  }}",

success: (data) => { 
    document.getElementById('table_upload_doc_doc').innerHTML = data.Data_returned;
},

error: function(data){
console.log(data);
}

});
        
        
         } 
             
             
              else { return false;}

                

      



});











    $('body').on('click', '.editquery', function () {
var sequence_number = $(this).data('id');
document.getElementById('sequence_number').value= sequence_number;
var contact= 'contact_person_name_'+sequence_number;
var contact_person = document.getElementById(contact).innerHTML;
document.getElementById('dosage_form').value = contact_person;

      

$('#app_name').val(contact_person.toUpperCase().trim());
$('#query_modelHeading').html("Query /Upload");
$('#ajax_model_query_letter').modal('show');



$.ajax({
    data:{
    sequence_number :sequence_number ,
    },

type:'POST',
dataType: 'json',
url: "{{ route('retrive_issued_query_from_applicant')  }}",

success: (data) => { 
    document.getElementById('table_upload_doc_doc').innerHTML = data.Data_returned;
},

error: function(data){
console.log(data);
}

});





});

 

 $('#ACKForm').submit(function(e) {
e.preventDefault();
console.log(e.preventDefault());
$('#UploadData').html('Uploading Letter......');
document.getElementById('UploadData').disabled = true;
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ route('upload_file_issued_query_from_to_assessor')  }}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {

        if(data.Message==true)  
           {

// this.reset();
 var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 6000
    }); 

toastr.success("Query Issued Uploaded Successfully")

 $('#UploadData').html('Save changes');
 document.getElementById('UploadData').disabled = false;
 document.getElementById('table_upload_doc_doc').innerHTML = data.Data_returned;

           } 

           else
           {
            this.reset();
 var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 6000
    }); 

$('#UploadData').html('Save changes');
document.getElementById('UploadData').disabled = false;
var contact_person  = document.getElementById('contact_person_name').innerHTML;
        $('#app_name').val(contact_person.toUpperCase().trim());
toastr.error('Allowed Files Type is only .PDF (PDF Document)')

           }


},
error: function(data){
console.log(data);
}
});

});


  });
</script>




