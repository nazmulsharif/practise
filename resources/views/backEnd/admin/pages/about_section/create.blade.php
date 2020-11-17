@extends('backEnd.admin.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About Section Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">About Section</li>
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
                <h2 class="card-title">
                  add About Section
                </h2>
                <a href="{{Route('aboutSection.manage')}}" class="btn btn-info float-sm-right">
                    <i class="fa fa-About Section"></i>
                  Manage About Section
                </a>
              </div>
              <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session()->get('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <form method="POST" action="{{ route('aboutSection.store') }}" enctype="multipart/form-data">
                          @csrf

                          <div class="form-group row">
                              <label for="main_title" class="col-md-4 col-form-label text-md-right">{{ __('Main Title') }}</label>

                              <div class="col-md-6">
                                  <textarea id="main_title"  class="form-control @error('main_title') is-invalid @enderror" name="main_title"   autocomplete="main_title" autofocus>
                                  </textarea>

                                  @error('main_title')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        <div class="form-group row">
                            <label for="short_title" class="col-md-4 col-form-label text-md-right">{{ __('Short Title') }}</label>

                            <div class="col-md-6">
                                      <textarea id="short_title"  class="form-control @error('short_title') is-invalid @enderror" name="short_title"   autocomplete="short_title" autofocus>
                                      </textarea>

                                @error('short_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="desc" id="desc" rows="5" class="form-control"></textarea>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="list" class="col-md-4 col-form-label text-md-right">{{ __('List') }}</label>

                        <div class="col-md-6">

                            <div class="field_wrapper">
                                <div>
                                    <textarea name = "list[]" class="list mb-1"  id="list"></textarea>
                                    <a href="javascript:void(0);" class="add_button" title="Add field">add</a>
                                </div>
                            </div>

                            @error('list')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="final_text" class="col-md-4 col-form-label text-md-right">{{ __('Final Text') }}</label>

                        <div class="col-md-6">
                            <textarea name="final_text" id="final_text"  class="form-control"></textarea>

                            @error('final_text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Add About Section') }}
                                  </button>
                              </div>
                          </div>
                      </form>


              </div>
            </div>
          </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </div>
    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  @endsection

 @section('scripts')
     <script>
         $(document).ready(function(){
             var maxField = 10; //Input fields increment limitation
             var addButton = $('.add_button'); //Add button selector
             var wrapper = $('.field_wrapper'); //Input field wrapper
             var fieldHTML = '<div><textarea name="list[]" value=""></textarea><a href="javascript:void(0);" class="remove_button">x</a></div>'; //New input field html
             var x = 1; //Initial field counter is 1

             //Once add button is clicked
             $(addButton).click(function(){
                 //Check maximum number of input fields
                 if(x < maxField){
                     x++; //Increment field counter
                     $(wrapper).append(fieldHTML); //Add field html
                 }
             });

             //Once remove button is clicked
             $(wrapper).on('click', '.remove_button', function(e){
                 e.preventDefault();
                 $(this).parent('div').remove(); //Remove field html
                 x--; //Decrement field counter
             });
         });



     </script>
 @endsection
