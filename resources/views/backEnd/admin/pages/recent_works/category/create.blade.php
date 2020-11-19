
@extends('backEnd.admin.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@if(isset($editData))
                                Edit User
                            @else
                                Manage User
                            @endif
                </h1>
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
		          		<h1 class="card-title">{{ (@$editData)?"Edit User":"Add Category" }}</h1>
		          		<a href="{{ Route('recentWorksCategory.manage')}}" class="btn btn-primary float-sm-right">
		          			Manage Category <i class="fa fa-plus-circle"></i>
		          		</a>
		          	</div>
		          	<div class="card-body">
                         @if(session()->has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong>{{ session()->get('success') }}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                        @endif
		          		<form method="POST" action="{{ (@$editData)? route('recentWorksCategory.update', @$editData->id):route('recentWorksCategory.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ (@$editData)?$editData->name:'' }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ (@$editData)? 'Update': 'Add' }}
                                </button>
                            </div>
                        </div>
                    </form>
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
