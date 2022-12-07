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
                    <h1>Add Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Events</li>
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
                            <h3 class="card-title">Edit Attendance</h3>
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
                        <form action="{{ url('admin/event/' . $event->id . '/' . $attendance->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">advisor_code</label>
                                            <input type="text" name="advisor_code" class="form-control" id="title"
                                                placeholder="Enter advisor_code"
                                                value="{{ old('advisor_code', $attendance->advisor_code) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="venue">team_leader_code</label>
                                            <input type="text" name="team_leader_code" class="form-control"
                                                id="team_leader_code" placeholder="Enter team_leader_code"
                                                value="{{ old('team_leader_code', $attendance->team_leader_code) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="group_leader_code">group_leader_code</label>
                                            <input type="text" name="group_leader_code" class="form-control"
                                                id="group_leader_code" placeholder="Enter group_leader_code"
                                                value="{{ old('group_leader_code', $attendance->group_leader_code) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="venue">team_leader_code</label>
                                            <input type="text" name="team_leader_code" class="form-control"
                                                id="team_leader_code" placeholder="Enter team_leader_code"
                                                value="{{ old('team_leader_code', $attendance->team_leader_code) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="epf">epf</label>
                                            <input type="text" name="epf" class="form-control" id="epf"
                                                placeholder="Enter epf" value="{{ old('epf', $attendance->epf) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter name" value="{{ old('name', $attendance->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nic">nic</label>
                                            <input type="text" name="nic" class="form-control" id="nic"
                                                placeholder="Enter nic" value="{{ old('nic', $attendance->nic) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="branch">branch</label>
                                            <input type="text" name="branch" class="form-control" id="branch"
                                                placeholder="Enter branch"
                                                value="{{ old('branch', $attendance->branch) }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="region">region</label>
                                            <input type="text" name="region" class="form-control" id="nic"
                                                placeholder="Enter region"
                                                value="{{ old('region', $attendance->region) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="chek_in_time">chek_in_time</label>
                                            <input type="text" name="chek_in_time" class="form-control" id="chek_in_time"
                                                placeholder="Enter chek_in_time"
                                                value="{{ old('chek_in_time', $attendance->chek_in_time) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="table_no">table_no</label>
                                            <input type="text" name="table_no" class="form-control" id="table_no"
                                                placeholder="Enter table_no"
                                                value="{{ old('table_no', $attendance->table_no) }}">
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
