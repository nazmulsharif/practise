
@extends('backEnd.admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Recent Works</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">works</li>
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
		          		<a href="{{ Route('recentWorks.create')}}" class="btn btn-primary float-sm-right">
		          			Add Recent Works <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
		          		<table class="table table-info"style="table-layout: fixed">
		          			<thead>
		          				<th>Sl</th>
		          				<th>Title</th>
		          				<th>Sub Title</th>
		          				<th>Image</th>
		          				<th>Link</th>
		          				<th>Category</th>
                                <th>User Name</th>
                                <th>Status</th>
		          				<th>Action</th>
		          			</thead>
		          			<tbody>
                            @foreach($RecentWorks as $work)
                                <tr>
                                    <td>{{ $work->title }}</td>
                                    <td>{{ $work->sub_title }}</td>
                                    <td>
                                        <img src="{{ Storage::url( $work->image ) }}" alt="" width="40px">
                                    </td>
                                    <td>{{ $work->link }}</td>
                                    <td>{{ $work->link }}</td>
                                    <td>{{ $work->category->category_name }}</td>
                                    <td>{{ $work->user->name }}</td>
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
