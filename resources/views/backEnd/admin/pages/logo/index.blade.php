
@extends('backEnd.admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Logo</li>
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
		          		<h1 class="card-title">Logo Management</h1>
		          		<a href="{{ Route('logo.create')}}" class="btn btn-primary float-sm-right">
		          			Add Logo <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
		          		<table class="table table-info">
		          			<thead>
		          				<th>Sl</th>
		          				<th>Name</th>
		          				<th>Image</th>
                      <th>User Name</th>
                      <th>Status</th>
		          				<th>Action</th>
		          			</thead>
		          			<tbody>
		          			@foreach($logos as $key=>$logo)
                      <tr> 
                          <td>{{ $key+1 }}  </td>
                          <td> {{ @$logo->logo_name }}</td> 
                          <td>
                            <img src="{{ asset('/profile_images'.$logo->image) }}" alt="" width="100">
                          </td> 
                          <td> {{ @$logo->user->name }}</td> 
                          <td>
                             <form action="{{Route('logo.status', $logo->id)}}" method ="post">
                            @csrf
                            <input type="hidden" value="{{$logo->status}}" name="status">
                            <input type="submit" class="btn {{ $logo->status ==true?'btn-success':'btn-danger'}}" value="{{ $logo->status == true?'active':'deactive' }}">
                          </form>
                          </td>
                          <td>  </td>

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