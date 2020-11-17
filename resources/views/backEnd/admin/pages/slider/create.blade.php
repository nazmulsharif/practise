
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
                                Edit Slider
                            @else
                                Manage Slider
                            @endif
                </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
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
		          		<h1 class="card-title">{{ (@$editData)?"Edit Slider":"Add slider" }}</h1>
		          		<a href="{{ Route('slider.manage')}}" class="btn btn-primary float-sm-right">
		          			Manage slider <i class="fa fa-plus-circle"></i>
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
		          		<form method="POST" action="{{ (@$editData)? route('slider.update', @$editData->id):route('slider.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('slider Title') }}</label>

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
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="hidden" name="old_image" value="{{ @$editData->image }}">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ @$editData->image }} }}"  autocomplete="image">
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Button URL') }}</label>

                            <div class="col-md-6">
                                <input id="button_url" type="text" class="form-control @error('button_url') is-invalid @enderror" name="button_url" value="{{ (@$editData)?$editData->button_url:'' }}"  autocomplete="button_url" autofocus>

                                @error('button_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('slider Text') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text">{{ (@$editData)?$editData->text:'' }}</textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>

                            <div class="col-md-6">
                               <input id="priority" type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ (@$editData)?$editData->priority:'' }}"  autocomplete="priority" autofocus>

                                @error('priority')
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