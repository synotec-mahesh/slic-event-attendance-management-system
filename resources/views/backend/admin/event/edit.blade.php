@extends('backend.layouts.master')

@section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/bs-stepper/css/bs-stepper.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Events</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Events</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if (session('message'))
                            <h2 class="alert alert-success">{{ session('message') }}</h2>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ url('admin/event/' . $event->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                placeholder="Enter title" value="{{ old('title', $event->title) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="venue">Venue</label>
                                            <input type="text" name="venue" class="form-control" id="venue"
                                                placeholder="Enter venue" value="{{ old('venue', $event->venue) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date and time:</label>
                                            <div class="input-group date" id="reservationdatetime"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime" name="date"
                                                    value="{{ old('date', $event->date) }}" placeholder="Enter date & time"
                                                    required />
                                                <div class="input-group-append" data-target="#reservationdatetime"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Response Message</label>
                                            <input type="text" name="message" class="form-control" id="message"
                                                value="{{ old('message', $event->message) }}" placeholder="Enter message" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input_text">Input text</label>
                                            <input type="text" name="input_text" class="form-control" id="input_text"
                                                value="{{ old('input_text', $event->input_text) }}"
                                                placeholder="Enter input text" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                        </form>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection




@push('scripts')
    <!-- BS-Stepper -->
    <script src="{{ asset('assets/backend/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('assets/backend/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('assets/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>
    <!-- InputMask -->
    <script src="{{ asset('assets/backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js') }}"></script>
    
    <script src="{{ asset('assets/backend/js/dateandtime.js') }}"></script>
@endpush
