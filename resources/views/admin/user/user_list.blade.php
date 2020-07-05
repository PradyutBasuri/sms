@extends('layouts/admin_template')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User-List</li>
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
                        <h3 class="card-title">User List</h3>
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
                              <a href="{{route('getUserAdd')}}"><button class="btn btn-primary btnStyle_shrot ml-0">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add User</button>
                              </a>
                            </div>
                        
                           
                          </div>
                          <div class="custome_table table-responsive mt-3">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No(s)</th>
                                    <th>User Type</th>
                                    <th>Date Of Birth</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_list as $key=> $user_details)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user_details->name}}</td>
                                    <td>{{$user_details->email}}</td>
                                    <td>{{$user_details->mobile_no}}</td>
                                    <td>{{config('global.EXCEPT_ADMIN.'.$user_details['user_type'])}}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($user_details['dob']))}}</td>
                                    
                                    <td class="">
                                        <a class="btn btn-primary mr-2"
                                            href="{{ route('getUserEdit',['id'=>base64_encode($user_details->id)]) }}" title="Click to edit"><i
                                                class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ route('getUserDelete', ['id'=>base64_encode($user_details->id)])}}')" title="Click to delete"><i
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

  function deleteConfirmation(url) {
 
    
 Swal.fire({
 title: "Delete?",
 text: "Are you sure to delete this record?",
 type: "",
 showCancelButton: !0,
 confirmButtonText: "Yes, delete it!",
 cancelButtonText: "No, cancel!",
 reverseButtons: !0
}).then(function (e) {
 console.log(e)
 if (e.value === true) {
   location.href=url;

 } else {
     e.dismiss;
 }

}, function (dismiss) {
 return false;
})
}
</script>



@stop