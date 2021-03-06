
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
              <li class="breadcrumb-item active">User</li>
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
		          		<h1 class="card-title">User Management</h1>
		          		<a href="{{ Route('user.add')}}" class="btn btn-primary float-sm-right">
		          			Add User <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
		          		<table class="table table-info">
		          			<thead>
		          				<th>Sl</th>
		          				<th>Name</th>
		          				<th>Email</th>
		          				<th>Image</th>
                      <th>Gender</th>
                      <th>User Role</th>
                      <th>Status</th>
		          				<th>Action</th>
		          			</thead>
		          			<tbody>
		          				@foreach($users as $key =>$user)
		          				<tr>
		          					<td>{{ $key+1}}</td>
		          					<td>{{$user->name}}</td>
		          					<td>{{ $user->email}}</td>
                        <td>
                          <img src="{{ Storage::url($user->image)}}" alt="" width="100px">
                        </td>
		          					<td>
                          {{ $user->gender }}       
                        </td>
		          					<td>
                            {{ $user->user_type }}       
                        </td>
                        <td>
                          <form action="{{Route('user.status', $user->id)}}" method ="post">
                            @csrf
                            <input type="hidden" value="{{$user->status}}" name="status">
                            <input type="submit" class="btn {{ $user->status ==true?'btn-success':'btn-danger'}}" value="{{ $user->status == true?'active':'deactive' }}">
                          </form>
                        </td>
                        <td>  
                          <a href="{{ Route('user.edit', $user->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"> </i>
                          </a>
                          <a href="{{ Route('user.delete', $user->id)}}" class="btn btn-danger">
                            <i class="fa fa-trash"> </i>
                          </a>
                        </td>
		          				</tr>
		          				@endforeach
		          			</tbody>
		          		</table>
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