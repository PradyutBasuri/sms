@extends('layouts/admin_template')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role-Edit</li>
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

                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                        <div class="card-body">
                            @if(Session::has('success_message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">
                                {{ Session::get('success_message') }}</p>
                            @endif

                            @if(Session::has('failure_message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">
                                {{ Session::get('failure_message') }}</p>
                            @endif

                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    {!! Form::label('roll_name','Enter Roll Name',['class'=>'']) !!}
                                    {!! Form::text('roll_name',$role->name , array('placeholder' => 'Enter Roll
                                    Name','class' => 'form-control')) !!}
                                </div>


                                <div class="form-group col-12 col-md-12">
                                    {!! Form::label('select_permission','Select Permission',['class'=>'']) !!}
                                    <select id="permission_id" name="select_permission[]" class="form-control"
                                        multiple="multiple">
                                        @foreach($permission as $value)
                                        <option <?php if(in_array($value->id,$rolePermissions)){ echo 'selected';}?>
                                            value="{{$value->id}}">
                                            {{$value->name}}</option>
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