@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ url('plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ url('plugins/dropzone/min/dropzone.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Lecturer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Lecturer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Lecturer</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#logins-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Account Information</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Profile Picture</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <form method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $getRecord->name }}" required placeholder="Enter Account Owner's Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Matrix ID/Username</label>
                            <input type="text" class="form-control" id="matrixid" name="matrixid" value="{{ $getRecord->matrixid }}" readonly placeholder="Enter Account Owner's Matrix ID or Username">
                          </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $getRecord->email }}" required placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"  placeholder="Password">
                        <p style="color: red">(Only Fill up if you want to change your password)</p>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                    </div>
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="profile_image" class="custom-file-input" id="exampleInputFile" onchange="updateLabel()">
                                <label class="custom-file-label" for="exampleInputFile" id="fileLabel">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    
                      <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- BS-Stepper -->
<script src="{{ url('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- Page specific script -->
<script>
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>
<script>
    function updateLabel() {
        const fileInput = document.getElementById('exampleInputFile');
        const fileLabel = document.getElementById('fileLabel');
        fileLabel.textContent = fileInput.files[0] ? fileInput.files[0].name : 'Choose file';
    }
</script>
@endsection