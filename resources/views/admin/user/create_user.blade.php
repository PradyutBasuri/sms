@extends('layouts/admin_template')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">User List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
          <!-- jquery validation -->
          <div class="card card-primary">
            
            {!! Form::open(['url' => 'admin/user-save', 'name' => 'user_add_form', 'class' =>'', 'id' => 'user_add_form', 'method' => 'post','role'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="card-body">
              @if(Session::has('success_message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('success_message') }}</p>
              @endif
      
            @if(Session::has('failure_message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('failure_message') }}</p>
            @endif

            <div class="row">
            

              <div class="form-group col-12 col-md-6">
                {!! Form::label('user_name','Enter Name',['class'=>'required']) !!}
                {!! Form::text('user_name','', ['class'=>'form-control','autocomplete'=>'off','maxlength'=>'100', 'id'=>'user_name', 'placeholder'=>'Enter User Name']) !!}
              </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('user_email','Enter User Email',['class'=>'required']) !!}
                {!! Form::text('user_email','', ['class'=>'form-control','autocomplete'=>'off','maxlength'=>'100','id'=>'user_email', 'placeholder'=>'Enter User Email']) !!}
              </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('user_mobile_no','Enter User Mobile No',['class'=>'required']) !!}
                {!! Form::text('user_mobile_no','', ['class'=>'form-control','autocomplete'=>'off','maxlength'=>'20','id'=>'user_mobile_no', 'placeholder'=>'Enter User Mobile No']) !!}
              </div>
            
              <div class="form-group col-12 col-md-6">
                {!! Form::label('user_dob','Enter Date Of Birth',['class'=>'required']) !!}
                {!! Form::text('user_dob','', ['class'=>'form-control','autocomplete'=>'off','id'=>'user_dob', 'placeholder'=>'Enter Date Of Birth']) !!}
              </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('password','Password',['class'=>'required']) !!}
                {!! Form::text('password','', ['class'=>'form-control','autocomplete'=>'off','id'=>'password', 'placeholder'=>'Enter Password']) !!}
              </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('con_password','Confirm Password',['class'=>'required']) !!}
                {!! Form::text('con_password','', ['class'=>'form-control','autocomplete'=>'off','id'=>'con_password', 'placeholder'=>'Enter Confirm Password']) !!}
              </div>
              <div class="form-group col-12 col-md-12">
              <div class="custom-file custom_file_sec">
                {!! Form::label('user_image','Profile Picture',['class'=>'required']) !!}
                
                {!! Form::file('user_image',['id'=>'user_image','class'=>'form-control','onchange'=>"validateFileExtension2(this),readURL1(this);"]) !!} 
                <button type="button"><img src="{{asset('images/Blank.png')}}"  id="blah" width="240"  height="120"alt="blue"></button><br>
                <!-- <span style="color: #002a80;font-size:85%;" class="info_adin_text">Max Size(2MB)</span> -->
               
                <span class="info_adin_text">Image size maxmum 2MB</span>
                <br><button type="reset" id="pseudoCancel">
                  Cancel
                </button>


                
               
                  </div>
                </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('user_type','Select User Type',['class'=>'required']) !!}
                <select class="form-control" id="user_type" name="user_type">
                  <option value="">--Select--</option>
                  @foreach(config('global.EXCEPT_ADMIN') as $key=>$value)
                <option value="{{$key}}">{{$value}}</option>

                  @endforeach
                </select>
              </div>

            </div>
              
              
              
           
            </div>
            <!-- /.card-body -->
            <div class="card-footer mb-4">

              {{ Form::submit('Save',['class'=>'btn btn-primary btnStyle']) }}
            </div>
            {!! Form::close() !!}
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('scripts')

<script type="text/javascript">
  $(document).ready(function() {
    $('#pseudoCancel').click(function(){
      $('#imagePreview_resume').removeAttr('src');
      $('#imagePreview_resume').val('');
      $('#blah').val('');
      $('#blah').removeAttr('src');
      $('#blah').attr('src',"{{asset('images/Blank.png')}}");
  console.log("Pseudo Cancel button clicked.");
    });
    $("#user_dob").datepicker({
    
      dateFormat: 'dd/mm/yy'
 
   
    });
    });

$('#user_add_form').validate({
      rules: {
        user_name: {
          required  : true,
        },
        user_email: {
          required  : true,
        },
        user_dob: {
          required  : true,
       },
       user_mobile_no:{
        required  : true,
       },
       user_image: {
          required  : true,
          accept: "image/jpg,image/jpeg,image/png"
          
        },
        user_type:{
          required  : true,
        },
        password: {
            required: true,
           
          },
          con_password: {
            required: true,
            equalTo : "#password"
          },
     },
      messages: {
        user_name: {
          required : "Please enter name",
        
        },
        user_email:{
          required : "Please enter email",
        },
        user_dob:{
          required : "Please enter date of birth",
         
        },
        user_mobile_no:{
          required : "Please enter mobile no",
         
        },
        user_image: {
          required  : "Please upload an image",
          accept : "Profile image accept only an image.It should be an jpg,jpeg,png."
        },
        user_type:{
          required  : "Please select user type",
        },
        password: {
            required: "Please enter password",
           
          },
          con_password: {
            required: "Please enter confirm password",
            equalTo: "Password and confirm password should be same"
          },
     },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      
    });
 
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(240)
                        .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function validateFileExtension2(Source, args) {
        var fuData = document.getElementById('user_image');
        var FileUploadPath = fuData.value;
        if (FileUploadPath == '') {
            args.IsValid = false;
        } else {
            var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "JPG" || Extension == "PNG") {
                return true;
            } else {
                alert("'." + Extension + "' extention is not accepted"); // Not valid file type
                document.getElementById('user_image').value = "";
                $('#blah').attr('src',"{{asset('images/Blank.png')}}");
                return false;
            }
        }

    }

</script>

@stop