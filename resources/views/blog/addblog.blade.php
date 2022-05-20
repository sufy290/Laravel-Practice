@extends('template/template')
<!-- title section connect -->
@section('title','addblog')

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
                <h2>Add Blog Form
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>


            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Form</a></li>
                    <li class="breadcrumb-item active">Add Blog</li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{route('blog.addblogg')}}" id="parsleyform" method="post" data-parsley-validate="" enctype="multipart/form-data">
                                @csrf
                                <div class="body">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Podcast">Blog Name :</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Blog Name"
                                            required data-parsley-required-message="Please enter name first"/>
                                        </div>
                                        <div class="error">
                                           <p> @error('name'){{$message}}@enderror</p>
                                        </div>
                                    </div>

                                 
                                        
                                            <label for="image" class="form-label">Blog Image :</label>
                                            <input type="file" class="form-control" name="image" placeholder="Enter Blog File here"
                                            required data-parsley-required-message="Please upload image first"/>
                                        
                                        <div class="error">
                                           <p> @error('image'){{$message}}@enderror</p>
                                        </div>
                                 

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Podcast">Blog Description :</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Blog Description" required data-parsley-required-message="Please enter description first"/>
                                        </div>
                                        <div class="error">
                                        <p> @error('description'){{$message}}@enderror</p>
                                        </div>
                                    </div>



                                    <input type="submit" value="Add Blog" class="btn btn-raised btn-primary waves-effect m-t-20">
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