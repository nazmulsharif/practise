
@extends('backEnd.admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">slider</li>
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
		          		<h1 class="card-title">slider Management</h1>
		          		<a href="{{ Route('slider.create')}}" class="btn btn-primary float-sm-right">
		          			Add slider <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
                  <div class="float-sm-right mb-2">
                     <a href="{{ Route('slider.trash')}}" class="btn btn-danger">Trash</a>
                  </div>
                 
		          		<table class="table table-info" id="tableData"style="table-layout: fixed">
		          			<thead>
		          				<th>Sl</th>
		          				<th>Title</th>
		          				<th>Image</th>
                      <th>Slider Description</th>
                      <th>Status</th>
                      <th>User Name</th>
                      <th>Priority</th>
		          				<th>Action</th>
		          			</thead>
		          			<tbody>
		          			@foreach($sliders as $key=>$slider)
                      <tr> 
                          <td>{{ $key+1 }}  </td>
                          <td> {{ @$slider->title }}</td> 
                          <td>
                            <img src="{{ Storage::url($slider->image) }}" alt="" width="100">
                          </td> 
                          <td>
                            {{  @$slider->slider_text }}
                          </td>
                          <td>
                             <form action="{{Route('slider.status', $slider->id)}}" method ="post">
                            @csrf
                            <input type="hidden" value="{{$slider->status}}" name="status">
                            <input type="submit" class="btn {{ $slider->status ==true?'btn-success':'btn-danger'}}" value="{{ $slider->status == true?'active':'deactive' }}">
                          </form>
                          </td>
                          <td>
                            {{ $slider->user->name }}
                          </td>
                          <td>
                            {{ $slider->priority }}
                          </td>
                          <td>  
                            <a href="{{ Route('slider.edit', $slider->id) }}" class="btn btn-primary">
                              <i class="fa fa-edit"></i>
                            </a>
                             <a href="{{ Route('slider.delete', $slider->id) }}" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
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