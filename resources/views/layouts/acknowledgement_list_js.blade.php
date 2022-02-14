<script>

$(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  }); 


$('#acknowledgment_letter').click(function () {
    // alert("hii");
    var letter_acknowledgement = document.getElementById('letter_acknowledgement').innerHTML;
    var application_id = document.getElementById('application_id').value;
var current_date =  document.getElementById('current_date').innerHTML;
var  RL_squential_number  =  document.getElementById('RL_squential_number').innerHTML;
var applicant_name =  document.getElementById('applicant_name').innerHTML;
var state_plot_number  =  document.getElementById('state_plot_number').innerHTML;
var country  =  document.getElementById('country').innerHTML;
var contact_person_name    =  document.getElementById('contact_person_name').innerHTML;
var application_number =  document.getElementById('application_number').innerHTML;
var number_days_receipts =  document.getElementById('days_of_receipt').value;
if(number_days_receipts=='' ||   number_days_receipts <= 0){document.getElementById('days_of_receipt').focus(); return false;}




$.ajax({
      
      data:{ 
        application_id: application_id,
        current_date:current_date,
        RL_squential_number:RL_squential_number,
        applicant_name:applicant_name,
        state_plot_number:state_plot_number,
        country:country,
        contact_person_name:contact_person_name,
        number_days_receipts:number_days_receipts,
        application_number:application_number,
           },

     url: "{{   url('/save_acknowledgment_letter/save')   }}",
      type: "POST",
      dataType: 'json',
      success: function (data) {
if(data.Message == true)
{

var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 6000
                  }); 
                  
document.getElementById('acknowledgment_letter').disabled = true;
$('#acknowledgment_letter').hide();
$('#actions_to_applicant').show('100');
$('#get_path').attr("href", data.Download_link);

toastr.success("Acknowledgement Letter Successfully Saved!!")
             
}
else 
                         {
                  var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000
                  });

               toastr.error("Acknowledgement Letter already produced")
               
              }

      },
      error: function (data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
      }

    
  });


});

});


</script>