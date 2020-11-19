
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
              <li class="breadcrumb-item active">Recent Works</li>
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
		          		<h1 class="card-title">Recent Works Management</h1>
		          		<a href="{{ Route('recentWorksCategory.create')}}" class="btn btn-primary float-sm-right">
		          			Add Recent Works <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
		          		<table class="table table-info">
		          			<thead>
		          				<th>Sl</th>
		          				<th>Name</th>

                                <th>User Name</th>
                                <th>Status</th>
		          				<th>Action</th>
		          			</thead>
		          			<tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $category->category_name  }}</td>
                                        <td>
                                            {{ $category->user->name }}
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{ Route('recentWorksCategory.delete', $category->id)}}">Delete</a>
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
