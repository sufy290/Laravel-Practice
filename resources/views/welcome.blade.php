@extends('template/template')
<!-- title section connect -->
@section('title','bloglisting')

<!-- header section connect -->
@section('header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Favicon-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
<link href="{{asset('assets/toster/toastr.min.css')}}" rel="stylesheet">




@endsection

<!-- content section connect -->
@section('content')

<!-- nexa files include -->
@include('include.leftsidebar')
@include('include.rightsidebar')
@include('include.topbar')
<!-- end include file -->
<section class="content">
    <div class="block-header">
        <div class="container" style="margin-top: 20px;">

        @if(Session::has('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Great!',
                            text: '{{Session::get("success")}}'
                        });
                    </script>
                     {{Session::forget('success')}}
        @endif






            <a href="{{route('user.add')}}" class="btn btn-sm">AddUser</a><br><br>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- bootstrap model -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <ul class="list-group list-group-flush" style="margin-top:12px;">
                                        <li class="list-group-item">
                                            <div class="m-t-2 m-b-0">
                                                <h4>User Name : <strong id="name"> </strong></h4>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <h4 class="m-t-2 m-b-0"> <strong>Gender: </strong> <strong id="gender"></strong></h4>
                                        </li>
                                        <li class="list-group-item">
                                            <h4 class="m-t-2 m-b-0"> <strong>Email: </strong> <strong id="email"></strong></h4>
                                        </li>
                                        <li class="list-group-item">
                                            <h4 class="m-t-2 m-b-0"> <strong>Phone: </strong> <strong id="phone"></strong></h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.viewbtn', function() {
            var id = $(this).val();
            //   alert(id);
            $('#viewModel').modal('show');
            $.ajax({
                url: "/viewww/" + id,
                type: 'get',
                success: function(res) {
                    // res = JSON.parse(res)
                    console.log(res.data);
                    $('#name').html(res.data.name);
                    $('#gender').html(res.data.gender);
                    $('#email').html(res.data.email);
                    $('#phone').html(res.data.phone);
                },
            });
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

 

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert your userdata!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{url('delete')}}/" + id,
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your userdata has been deleted.',
                            'success'
                        )
                       table.ajax.reload();
                    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {},
                    complete: function() {}
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your userdata is safe :)',
                    'error'
                )
            }
        })
    });
});

</script>


<script>
var deleteLinks = document.querySelectorAll('.delete');

for (var i = 0; i < deleteLinks.length; i++) {
    deleteLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));

        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}
</script>

@endsection
<!-- end content section -->