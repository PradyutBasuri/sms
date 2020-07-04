@extends('admin/layout/admin_template')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>City Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active">City Management</li>
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
            
            {!! Form::open(['url' => 'admin/city', 'name' => 'city_add_form', 'class' =>'', 'id' => 'city_add_form', 'method' => 'post','role'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="card-body">
              @if(Session::has('success_message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('success_message') }}</p>
              @endif
      
            @if(Session::has('failure_message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('failure_message') }}</p>
            @endif

            <div class="row">
             <div class="form-group col-12 col-md-6">
                {!! Form::label('country_name','Select Country',['class'=>'']) !!}
                <select class="form-control" id="country_name" name="country_name">
                  <option value="">--Select--</option>
                  @foreach($countryData as $value)
                <option value ="{{$value->id}}">{{$value->country_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-12 col-md-6">
                {!! Form::label('state_name','Select State',['class'=>'']) !!}
                <select class="form-control"  id="state_name" name="state_name">
                  <option value="">--Select--</option>
                 
                </select>
              </div>

              <div class="form-group col-12 col-md-6">
                {!! Form::label('city_name','Enter City Name',['class'=>'']) !!}
                {!! Form::text('city_name','', ['class'=>'form-control','autocomplete'=>'off','id'=>'city_name', 'placeholder'=>'Enter City Name']) !!}
              </div>
             
            
              <div class="form-group form-group col-12 col-md-6">
              {!! Form::label('status','Status',['class'=>'']) !!}<br>
              {{ Form::label('active_inactive', 'Active') }}
              {{ Form::radio('active_inactive', '1',true) }}
              &nbsp; &nbsp;
              {{ Form::label('active_inactive', 'In Active') }}
              {{ Form::radio('active_inactive', '0') }}
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
    $('#country_name').change(function(){
      getStateName();
    });

$('#city_add_form').validate({
      rules: {
        state_name: {
          required  : true,
         
          
        },
        city_name: {
          required  : true,
          maxlength :255
          
        },
        country_name: {
          required  : true,
       },
     },
      messages: {
        state_name: {
          required : "Please Select State",
        
        },
        country_name:{
          required : "Please Select Country",
        },
        city_name:{
          required : "Enter City Name",
          maxlength:"City name should not cross 255 characters"
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
  });


  function getStateName(){
       var token = $("input[name='_token']").val();
       var  country_name=$('#country_name').val();
       
        $.ajax({
            type: "post",            
            url: "{{route('getStateName')}}",
            data: {country_name: country_name, _token: token},
            dataType: 'json',
            success: function (data) {
                $('#state_name').html('<option value="">-- Select --</option>');                
                $.each(data, function (key, value) {                  
                    $("#state_name").append('<option value=' + value.id  + '>' + value.state_name + '</option>');
                });
              
            },
          
          

        });
    }
</script>

@stop