@extends('backEnd.admin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage aboutSection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">aboutSection</li>
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
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('message') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <h2 class="card-title">Manage aboutSection</h2>
                 <a href="{{ Route('aboutSection.create') }}" class="float-sm-right"><i class="fa fa-plus-circle"></i>
                 Add aboutSection</a>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Main Title</th>
                      <th>Short Title</th>
                      <th>Description</th>
                      <th>List</th>
                      <th>Final Text</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($aboutSections as $key=>$aboutSection)
                        @php
                            $array = explode('<>',$aboutSection->list);

                        @endphp
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $aboutSection->main_title }}</td>
                      <td>{{ $aboutSection->short_title }}</td>
                      <td>{{ $aboutSection->description }}</td>
                      <td>
                          <ol>
                              @foreach($array as $arr)
                                 <li>{{ $arr }} </li>
                              @endforeach
                          </ol>
                      </td>
                      <td>{{ $aboutSection->final_text }}</td>
                        <td>

                        </td>
                        <td>
                            <a href="{{ Route('aboutSection.edit', $aboutSection->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ Route('aboutSection.delete', $aboutSection->id) }}" class="btn btn-danger">
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

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
