 @include('layouts.css_libs')
 @include('layouts.js_libs')
     <!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}" >
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}" >
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}" >

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<body class="hold-transition register-page">
<meta name="_token" content="{{csrf_token()}}" />

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span class="" > NMFA </span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
  <form   action="{{ route('customreg') }} "  method="post"    id="nmfacustomregister"  >
      @csrf
        <div class="input-group mb-4">
          <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

          <div class="input-group mb-3">
          <input type="text" class="form-control" name="middle_name" placeholder="Middle Name"  required>
          <div class="input-group-append">
          <div class="input-group-text">
          <span class="fas fa-user"></span>
          </div>
          </div>
          </div>


        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="last_name" placeholder="Last Name"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <select class="form-control select2bs4" style="width: 100%;"  name="country_id" id="country"   required>
              <option value="0" disable="true" selected="true">=== Select Country ===</option>
                @foreach ($countries as $key => $value)
                  <option value="{{$value->id}}">{{ $value->country_name }}</option>
                @endforeach
            </select>
        </div>
  <!--        City       -->
          <div class="input-group mb-3">
          <input type="text" name="city" class="form-control" placeholder="City" name="city"   required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-city"></span>
            </div>
          </div>
        </div>

  <!--        Street       -->
        <div class="input-group mb-3">
          <input type="text" name="street" class="form-control" placeholder="Street"    required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-street-view"></span>
            </div>
          </div>
        </div>

  <!--        Postalcode       -->
        <div class="input-group mb-3">
          <input type="text" name="postal_code" class="form-control" placeholder="Postal code"    required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


          <!--       Telephone      -->
        <div class="input-group mb-3">
          <input type="tele" name="telephone" class="form-control" placeholder="Telephone"     required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>


  <!--       fax      -->
  <div class="input-group mb-3">
          <input type="text" name="fax" class="form-control" placeholder="Fax"    >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-fax"></span>
            </div>
          </div>
        </div>


          
            <div class="input-group mb-3">
             <!--       UserName      -->
           
		     <div id="danger-user" class="alert alert-danger" style="display:none"></div>
			 <div id="warning-user" class="alert alert-warning" style="display:none"></div>
       <div id="success-user" class="alert alert-success" style="display:none"></div>
    <input type="text" name="user_name" class="form-control"  onkeyUp="Validate_UserName(this.value)" id="User_Name" placeholder="username"  required>


          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users-slash"></span>
            
            </div>
           
          </div>
        </div>

           <!--       website URL      -->
           <div class="input-group mb-3">
          <input type="url" class="form-control"  name="webiste_url" placeholder="Website Url"   >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-external-link-alt"></span>
            </div>
          </div>
        </div>

             <!--       website URL        -->
             @error('name')
              <p class="text-sm text-red-600"> {{  $message   }} </p>
              @enderror
              <div id="success" class="alert alert-success" style="display:none"></div>
		          <div id="danger" class="alert alert-danger" style="display:none"></div>
             <div id="warning" class="alert alert-warning" style="display:none"></div>
             <div class="input-group mb-3">
          <input type="email" class="form-control"  id="email" onKeyup="ValidateEmail(this.value)" name="email" placeholder="Email"   required>
          <div id="email_error"> </div>
			 
             
-
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mail-bulk"></span>
            </div>
          </div>
        </div>
             <!--        business_address      -->

            <div class="input-group mb-3">
          <input type="text" class="form-control"  name="business_address" placeholder="Business Address"   required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-business-time"></span>
            </div>
          </div>
        </div>

   <!--       Password       -->
   <div id="password_check" class="alert alert-warning" style="display:none"></div>
        <div class="input-group mb-3">
        
          <input type="password" id="password" name="password" class="form-control" placeholder="password"  onKeydown="check_validity_password(this.value,confirm_password.value)"   required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!--        Confirmpassword       -->
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" class="form-control" onKeydown="check_validity_password(password.value,this.value)"  placeholder="ConfirmPassword"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div id="confirm_check" class="alert alert-danger" style="display:none"></div>

        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree"  required>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"   id="Register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>


      </form>

      <div class="social-auth-links text-center">
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a> -->
      </div>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

 @include('layouts.custom_registration') 

 
<script>
    function ValidateEmail(Email) {

if (Email != '') {

    jQuery(document).ready(function() {

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{  url('/Validate/post')}}",
            method: 'post',
            data: {
                Email: jQuery('#email').val(),
            },
            success: function(result) {
              jQuery('#danger').hide('100');
                if (result.error == undefined) {

                   /* jQuery('#success').show('100');
                    jQuery('#success').html(result.success);
                    jQuery('#danger').hide('100');
                    $("#sucess").animate({ left: '250px' });
                    jQuery('#success').hide('100');*/

                    var id = setInterval(validate, 500);

                    function validate() {

                        if ((Email.indexOf("@") < 1) || ((Email.indexOf("@") == (Email.length < 1)))) {
                            jQuery('#warning').show('100');
                            jQuery('#warning').html('Invalid Email Axerate Symbol is Absent');
                            document.getElementById('email').focus();
                            document.getElementById('Register').disabled = true;
                            clearInterval(id);
                            return false
                        }

                        if (Email.indexOf("@") <= 4) {
                            jQuery('#warning').show('100');
                            jQuery('#warning').html('Invalid Email Length is fewer than expected,5 charcters are expected as minimum');
                            document.getElementById('email').focus();
                            document.getElementById('Register').disabled = true;
                            clearInterval(id);
                            return false
                        }

                        if ((Email.indexOf(".") == -1)) {
                            document.getElementById('Register').disabled = true;
                            jQuery('#warning').show('100');
                            jQuery('#warning').html('Invalid Email (.) Symbol is Absent');
                            document.getElementById('email').focus();
                            clearInterval(id);
                            return false
                        }

                        if ((Email.indexOf("@") > 1) || ((Email.indexOf("@") != (Email.length < 1)) || (Email.indexOf(".") != -1)))
                         {
                            document.getElementById('Register').disabled = false;
                            jQuery('#warning').hide('100');
                            document.getElementById('email').focus();
                            clearInterval(id);
                        }



                    }

                } else {
                    jQuery('#danger').show('100');
                    jQuery('#danger').html(result.error);
                    $("#danger").animate({ right: '15px' });
                    jQuery('#success').hide('100');
                    jQuery('#warning').hide('100');
                    document.getElementById('Register').disabled = true;


                }
            },
        });

    });

} else {

    jQuery('#danger').hide('100');
    jQuery('#warning').hide('100');
    jQuery('#success').hide('100');
}

}

</script>




<script>


function Validate_UserName(username) 
{
var name = document.getElementById('User_Name').value;
if(username != '' )
{

    jQuery(document).ready(function() {

        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{  url('/Validate/user')  }}",
            method: 'post',
            data: {
                name: jQuery('#User_Name').val(),
                  },
        success: function(result) {
			console.log(result.error);
      jQuery('#danger-user').hide('100');
		if(result.error == undefined   )
		{
	var id = setInterval(validate, 500);
  function validate() {

	if( name.length <= 4 )
{
  jQuery('#danger-user').hide('100');
	document.getElementById('Register').disabled=true;
jQuery('#danger-user').hide('100');
jQuery('#warning-user').show('100');
jQuery('#warning-user').html('Username Length requirements is not met: The required Length is 5 and above');
jQuery('#User_Name').focus();
$("#Register").addClass("important blue");
//jQuery('#Register').text('Username Length requirements is not met: The required Length is 5 and above');
clearInterval(id);
}

else{

document.getElementById('Register').disabled=false;
$('#warning-user').hide('100');
document.getElementById('User_Name').focus();
clearInterval(id);
/*
jQuery('#success-user').show('100');
		jQuery('#success-user').html(result.success);
		jQuery('#danger-user').hide('100');
		$("#success-user").animate({left: '25px'});
		jQuery('#success-user').hide('100');
    */
}


}


}
		else{
	    var id = setInterval(validate, 500);
    document.getElementById('Register').disabled=true;
		jQuery('#danger-user').show('100');
		jQuery('#danger-user').html(result.error);
		//$("#danger-user").animate({left: '15px'});
		jQuery('#success-user').hide('100');
		jQuery('#warning-user').hide('100');
    
            }
			},
            });
            });

}


else
{

		jQuery('#danger-user').hide('100');
		jQuery('#warning-user').hide('100');
		jQuery('#success-user').hide('100');
}

}
</script>


<script>

function check_validity_password(password,confirmpassword)
{
  if(confirmpassword == '' && password != '' ){jQuery('#password_check').hide('10');}
  if(confirmpassword != '' && password == '' ){

     var id = setInterval(checkconfirmation, 500);
  function checkconfirmation() {
jQuery('#password_check').html('Password is Empty:First Fill Password');
$("#password_check").animate({left: '25px'});
jQuery('#password_check').show('1000');
jQuery('#password').focus();
jQuery('#confirm_password').val('');
clearInterval(id);

}
jQuery('#password_check').hide('100');
}
/*
var confirmpassword= $("#confirmpassword").val();
var password = $("#password").val();
 if(confirmpassword != '' && password !='' && confirmpassword != password  )
 {
     console.log(password);

var id = setInterval(checkconfirm, 1000);
function checkconfirm(){
   
        
jQuery('#confirm_check').html('Password Incorrect');
$("#confrim_check").animate({left: '35px'});
jQuery('#confirm_check').show('10000');
clearInterval(id);
}
jQuery('#confirm_check').hide('');
}
*/
}


</script>
