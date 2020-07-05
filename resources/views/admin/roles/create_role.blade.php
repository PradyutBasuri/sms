@extends('layouts/admin_template')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role-Add</li>
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
                  
                    <!-- jquery validation -->
                    <div class="card card-primary">

                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

                        <div class="card-body">
                           @include('partials.errors')

                            <div class="row">
                               
                                <div class="form-group col-12 col-md-12">
                                    {!! Form::label('roll_name','Enter Roll Name',['class'=>'']) !!}
                                    {!! Form::text('roll_name',null , array('placeholder' => 'Enter Roll Name','class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-12 col-md-12">
                                    {!! Form::label('select_guard','Select Role Type',['class'=>'']) !!}
                                    <select name="select_guard" id="guard_id" class="form-control">
                                      @foreach(config('global.USER_TYPE') as $key => $value)  
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-12">
                                    {!! Form::label('select_permission','Select Permission',['class'=>'']) !!}
                                    <select id="permission_id" name="select_permission[]" class="form-control"
                                        multiple="multiple">
                                        @foreach($permission as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
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

<script>
    $(document).ready(function() {
      
        $('#permission_id').multiselect({
        enableClickableOptGroups: true,
        enableCollapsibleOptGroups: true,
        enableFiltering: true,
        includeSelectAllOption: true
    });
    });


</script>
@stop