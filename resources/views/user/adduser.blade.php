@extends('template/template')
<!-- title section connect -->
@section('title','Add User')

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
                <h2>Add User
                    <small class="text-muted">Welcome to Nexa Application</small>
                </h2>


            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Nexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Form</a></li>
                    <li class="breadcrumb-item active">Add User</li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{route('user.adduser')}}" id="main_form" method="post">
                                @csrf
                                <div class="body">

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="name">User Name :</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Blog Name"
                                            />
                                        </div>
                                        <div class="error">
                                        <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="gender">Gender:</label>
                                            <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender"
                                            />
                                        </div>
                                        <div class="error">
                                        <span class="text-danger error-text gender_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Podcast">Email :</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email here"
                                            />
                                        </div>
                                        <div class="error">
                                        <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="phone">Phone :</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter phone Number here"
                                            />
                                        </div>
                                        <div class="error">
                                        <span class="text-danger error-text phone_error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="password">Password :</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password here"
                                            />
                                        </div>
                                        <div class="error">
                                        <span class="text-danger error-text password_error"></span>
                                        </div>
                                    </div>



                                    <input type="submit" value="Add User" class="btn btn-raised btn-primary waves-effect m-t-20">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    $(function(){
              
              $("#main_form").on('submit', function(e){
                  e.preventDefault();
          
                  $.ajax({
                      url:$(this).attr('action'),
                      method:$(this).attr('method'),
                      data:new FormData(this),
                      processData:false,
                      dataType:'json',
                      contentType:false,
                      beforeSend:function(){
                          $(document).find('span.error-text').text('');
                      },
                      success:function(data){
                          if(data.status == 0){
                              $.each(data.error, function(prefix, val){
                                  $('span.'+prefix+'_error').text(val[0]);
                              });
                          }else{
                              $('#main_form')[0].reset();
                              alert(data.msg);
                          }
                      }
                  });
              });
          });
</script>


@endsection