@extends('backend.layouts.master')


@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Check Attendance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
                        <li class="breadcrumb-item active">Check Attendance</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content')

    <section class="content">
     
        @if (session('message'))
            <h2 class="alert alert-success">{{ session('message') }}</h2>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ url('admin/view-event') }}"><button type="button"
                                        class="btn btn-block btn-outline-warning btn-sm">Back</button></a></h3>
                        </div>
                        <div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('admin/event/'.$eventId.'/check-filter-attendance') }}" class="form-inline" method="POST">
                                @csrf
                                <div class="col-md-6">
                                  <div class="form-group" id="filter_form">
                                    <label for="filter" class="col-md-2-sm-2  col-form-label">Filter :</label>
                                    <select id='approved' class="form-control" id="filter" name="filter" placeholder="Product name...">
                                        <option value="all">All</option>
                                        @foreach ($categories as $category)
                                             <option value="{{ $category->coloum_name }}" myTag="{{ $category->input_text }}">{{ $category->category_name }}</option>
                                         @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default">Filter</button>
                                  </div>
                                </div>
                                
                            </form>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>NIC</th>
                                        <th>Branch</th>
                                        <th>Region</th>
                                        <th>Table No</th>
                                        <th>Check In Time</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkTimeAttendances as $attendance)
                                        <tr>
                                            <td>{{ $attendance->name }}</td>
                                            <td>{{ $attendance->nic }}</td>
                                            <td>{{ $attendance->branch }}</td>
                                            <td>{{ $attendance->region }}</td>
                                            <td>{{ $attendance->table_no }}</td>
                                            <td>{{ $attendance->chek_in_time }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>NIC</th>
                                        <th>Branch</th>
                                        <th>Region</th>
                                        <th>Table No</th>
                                        <th>Check In Time</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection



@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
@endpush
