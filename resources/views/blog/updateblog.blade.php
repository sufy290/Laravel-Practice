@extends('template/template')
<!-- title section connect -->
@section('title','Update Blog')

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
                <h2>Update Blog Form
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>


            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Form</a></li>
                    <li class="breadcrumb-item active">Update Blog</li>
                </ul>
            </div>
            <div class="container" style="margin-top:15px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                    <img src = "{{env('BLOG_IMAGE').$blog->image}}" style="margin: 15px;" class="img-thumbnail" width="150px" height="150px">

                       <form action="{{url('/editblog')}}" id="parsleyform" method="POST" data-parsley-validate="" enctype="multipart/form-data">
                           @csrf

                           <input type="hidden" class="form-control" name="id" value="{{$blog['id']}}"/>
                        <div class="body">
                            <div class="form-group">
                                <div class="form-line">
                                <label for="Podcast">Blog Name :</label>
                                    <input type="text" class="form-control" name="name" value="{{$blog['name']}}"
                                    required data-parsley-required-message="Please enter name first"/>
                                </div>
                                <div class="error">
                                           <p> @error('name'){{$message}}@enderror</p>
                                </div>
                            </div>

                      
                                            <label for="image">Blog Image :</label>
                                            <input type="file" class="form-control" name="image" placeholder="Enter Blog File here"
                                            />
                                        
                                        <div class="error">
                                           <p> @error('image'){{$message}}@enderror</p>
                                        </div>
                                   
                            <div class="form-group">
                                <div class="form-line">
                                <label for="Podcast">Blog Description :</label>
                                    <input type="text" class="form-control" name="description" value="{{$blog['description']}}" 
                                    required data-parsley-required-message="Please enter description first"/>
                                </div>
                                <div class="error">
                                           <p> @error('description'){{$message}}@enderror</p>
                                </div>
                            </div>

                         

                            <input type="submit" value="Update Blog" class="btn btn-raised btn-primary waves-effect m-t-20">
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