@extends('layouts/admin_template')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role-List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Role List</h3>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('success_message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">
                          {{ Session::get('success_message') }}</p>
                        @endif
          
                        @if(Session::has('failure_message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">
                          {{ Session::get('failure_message') }}</p>
                        @endif
                        <div  class="row">
                            <div class="col-12 col-md-3 col-lg-3 mb-4 mb-md-0">
                              <a href="{{route('roles.create')}}"><button class="btn btn-primary btnStyle_shrot ml-0">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Role</button>
                              </a>
                            </div>
                        
                           
                          </div>
                          <div class="custome_table table-responsive mt-3">
                            <table id="example1" class="table table-bordered mb-0">
                        
                            <thead>
                                <tr>
                                    <th>#</th>
                                   <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key=> $roles_details)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$roles_details->name}}</td>
                                    
                                   
                                    
                                    <td class="">
                                        <a class="btn btn-primary mr-2"
                                            href="{{ route('roles.edit',base64_encode($roles_details->id)) }}" title="Click to edit"><i
                                                class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ route('roles.destroy',base64_encode($roles_details->id))}}')" title="Click to delete"><i
                                                class="fa fa-trash"></i></button>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('scripts')

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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



@stop