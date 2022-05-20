@extends('template/template')
<!-- title section connect -->
@section('title','bloglisting')

<!-- header section connect -->
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!-- Favicon-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
<!-- section end for header -->



<!-- content section connect -->
@section('content')

<!-- nexa files include -->
@include('include.leftsidebar')
@include('include.rightsidebar')
@include('include.topbar')
<!-- end include file -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Blog DataTable Listing
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>


            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Blog DataTables</li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12"><br>
                <button class="btn"><a href="{{route('blog.add')}}">AddBlog</a></button>
            </div>



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



            <div class="col-lg-12 col-md-12 col-sm-12">
                <table id="dtable" class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>



                    @foreach($blogdata as $data)
                    <tbody>
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data['name']}}</td>
                            <td>{{$data['description']}}</td>
                            <td><img src="{{env('BLOG_IMAGE').$data->image}}" width="100px" height="100px"></td>
                            <td>{{$data['created_at']}}</td>
                            <th scope="col"><a class="btn" href="{{ url('/editt', $data->id) }}">Edit</a></th>
                            <th><button type="button" class="btn viewbtn" value="{{$data['id']}}" data-toggle="modal" data-target="#viewModal">View</button></th>
                            <th scope="col"><a class="btn delete" data-id="{{$data->id}}" href="{{ url('/deletee', $data->id) }}">Delete</a></th>


                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="margin-left:80%;">
                {{$blogdata->links('pagination::bootstrap-4');}}
            </div>
        </div>
    </div>
</section>

<!-- bootstrap model -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Details</h5>
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
                                            <img src="" id="image" width="100px" height="100px">
                                        </li>
                                        <li class="list-group-item">
                                            <div class="m-t-2 m-b-0">
                                                <h4>Blog Name : <strong id="name"> </strong></h4>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <h4 class="m-t-2 m-b-0"> <strong>Blog Description : </strong> <strong id="description"></strong></h4>
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

<script type="text/javascript">
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tr = $(this).closest("tr");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{url('deletee')}}/" + id,
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                       $(tr).remove();
                    
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
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    });


</script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.viewbtn', function() {
            var id = $(this).val();
            //   alert(id);
            $('#viewModel').modal('show');
            $.ajax({
                url: "/view/" + id,
                type: 'get',
                success: function(res) {
                    // res = JSON.parse(res)
                    console.log(res.data.name);
                    $('#name').html(res.data.name);
                    $('#description').html(res.data.description);
                    var src = "{{env('BLOG_IMAGE')}}" + res.data.image;
                    $('#image').attr('src',src);
                },
            });
        });
    });
</script>

@endsection
<!-- end content section -->