
@extends('backEnd.admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">User Profile</h1>
                        
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="{{ Storage::url(@$user->image)}}" alt="" width="300" height="300">
                        </div>
                        <div class="col-md-5 offset-md-3 mt-5">
                           <h4>Name : {{ $user->name }}</h4>
                           <h4>Email : {{ $user->email }}</h4>
                           <h4>Gender: {{ $user->gender }}</h4>
                           <a href="{{ Route('user.password.change', $user->id) }}">Change Password</a>
                        </div>
                      </div>
                        
                       
                    </div>
                 </div>
            </div>
          
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection