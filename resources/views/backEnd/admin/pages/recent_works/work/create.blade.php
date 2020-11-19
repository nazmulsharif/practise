
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
		          		<h1 class="card-title">{{ (@$editData)?"Edit User":"Add Recent Works" }}</h1>
		          		<a href="{{ Route('recentWorks.manage')}}" class="btn btn-primary float-sm-right">
		          			Manage recentWorks <i class="fa fa-plus-circle"></i>
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
		          		<form method="POST" action="{{ (@$editData)? route('recentWorks.update', @$editData->id):route('recentWorks.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ (@$editData)?$editData->title:'' }}"  autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="sub_title" class="col-md-4 col-form-label text-md-right">{{ __('Sub Title') }}</label>

                                <div class="col-md-6">
                                    <input id="sub_title" type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" value="{{ (@$editData)?$editData->sub_title:'' }}"  autocomplete="sub_title" autofocus>

                                    @error('sub_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="old_image" value="{{ @$editData->image }}">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image">
                                @if(isset($editData->image))
                                    <img src="{{ Storage::url($editData->image)}}" alt="" width="100px">
                                @endif
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                                <div class="col-md-6">

                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" autocomplete="link">

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">

                                    <select name="category_id" id="category">
                                        @foreach($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
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
