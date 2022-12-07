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
                    <h1>Attendance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Events</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <div>
                            @if (session('message'))
                            <h2 class="alert alert-success">{{ session('message') }}</h2>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Advisor Code</th>
                                        <th>Team Leader Code</th>
                                        <th>Group Leader Code</th>
                                        <th>EPF</th>
                                        <th>Name</th>
                                        <th>NIC</th>
                                        <th>Branch</th>
                                        <th>Region</th>
                                        <th>Chek In Time</th>
                                        <th>Table No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $attendance->advisor_code }}</td>
                                            <td>{{ $attendance->team_leader_code }}</td>
                                            <td>{{ $attendance->group_leader_code }}</td>
                                            <td>{{ $attendance->epf }}</td>
                                            <td>{{ $attendance->name }}</td>
                                            <td>{{ $attendance->nic }}</td>
                                            <td>{{ $attendance->branch }}</td>
                                            <td>{{ $attendance->region }}</td>
                                            <td>{{ $attendance->chek_in_time }}</td>
                                            <td>{{ $attendance->table_no }}</td>
                                            <td>
                                                <div id="one_line">
                                                    <a href="{{ url('admin/event/'.$event->id.'/' . $attendance->id . '/edit') }}"
                                                        class="btn btn-app" id="edit-btn">
                                                        <i class="fas fa-edit" id="edit-fa-btn"></i></a>

                                                    <form class="delete-form"
                                                        action="{{ url('admin/event/attendance/' . $attendance->id . '/delete') }}"
                                                        method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="show_confirm delete-btn" data-toggle="tooltip" title='Delete' value="Delete"><i class="fa fa-trash" id="fa_font"></i></button>
                                                    </form>

                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Advisor Code</th>
                                        <th>Team Leader Code</th>
                                        <th>Group Leader Code</th>
                                        <th>EPF</th>
                                        <th>Name</th>
                                        <th>NIC</th>
                                        <th>Branch</th>
                                        <th>Region</th>
                                        <th>Chek In Time</th>
                                        <th>Table No</th>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(".show_confirm").each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                let form = $(this).parent();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else

                    {
                        swal("Error!", "Please try again", "error");
                    }
                })
            });
        });
    </script>
@endpush
