@extends('template/template')
<!-- title section connect -->
@section('title','Update User')

<!-- header section connect -->
@section('header')
<link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />

<!-- Favicon-->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
<link href="{{asset('assets/toster/toastr.min.css')}}" rel="stylesheet">

<!-- jquery cdn link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- parsley cdn link -->
<link rel="stylesheet" href="{{asset('assets/jsparsley/parsley.css')}}">
<script src="{{asset('assets/jsparsley/parsley.min.js')}}"></script>


<!-- sweetalert2 cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
<style>
    .error{
        color: red;
    }
</style>

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
                <h2>Update User Form
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>


            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Form</a></li>
                    <li class="breadcrumb-item active">Update User</li>
                </ul>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                       <form action="{{route('user.updateuser')}}" id="parsleyform" method="POST" data-parsley-validate="">
                           @csrf

                           <input type="hidden" class="form-control" name="id" value="{{$blog['id']}}"/>
                        <div class="body">
                            <div class="form-group">
                   

                            <div class="form-line">
                                            <label for="name">User Name :</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Blog Name" value="{{$blog['name']}}"
                                            required data-parsley-required-message="Please enter name first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('name'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="gender">Gender:</label>
                                            <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender" value="{{$blog['gender']}}"
                                            required data-parsley-required-message="Please enter gender first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('gender'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Podcast">Email :</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email here" value="{{$blog['email']}}"
                                            required data-parsley-required-message="Please enter email first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('email'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="phone">Phone :</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter phone Number here" value="{{$blog['phone']}}"
                                            required data-parsley-required-message="Please enter phone-number first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('phone'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="password">Password :</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password here" value="{{$blog['password']}}"
                                            required data-parsley-required-message="Please enter password first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('password'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                         

                            <input type="submit" value="Update User" class="btn btn-raised btn-primary waves-effect m-t-20">
                            </form>
                    </div>

                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>

@endsection