<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('assets/forntend/libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/forntend/css/style.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <title>SLIC</title>
</head>

<body>
    <div class="container-fluid">
        <div class="main">
            <input type="hidden" id="token" value="{{ csrf_token() }}">
            <form action="" id="myform" method="POST">
                @csrf
                <div class="logo">
                    <img src="{{ asset('assets/forntend/img/logo.png') }}" alt=""
                        class="img-fluid rounded mx-auto d-block" />
                </div>
                <div class="topic">


                    <h1>{{ $events->title }}</h1>

                </div>

                <select class="category" name="category" id="category">
                    <option value="0">Select Category</option>
                    <option value="1">Advisor / BSO</option>
                    <option value="2">Team Leader</option>
                    <option value="3">Group Leader</option>
                </select>
                <center>
                    <label class="form-details">Advisor Code</label>
                    <input type="text" id="advisor_code" name="advisor_Code" />
                    <span class="error" id="advisor_code_err"> </span>

                    <label class="form-details">NIC No.</label>
                    <input type="text" id="nic" name="nic" />
                    <span class="error" id="nic_err"> </span>
                </center>
                <input type="submit" id="submitbtn" value="Check-in Now" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" />
            </form>
            <div id="success_message"></div>
            {{-- <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="popup" id="popup">
                                <h3>{{ $events->input_text }}</h3>
                                <h2>Your table number is</h2>
                                <button type="button"></button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<script src="{{ asset('assets/forntend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

{{-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#advisor_code').on('input', function() {
            checkadvisor_code();
        });
        $('#nic').on('input', function() {
            checkenic();
        });

        $('#submitbtn').click(function() {


            if (!checkadvisor_code() && !checkenic()) {
                console.log("er1");
                $("#message").html(
                    `<div class="alert alert-warning">Please fill all required field</div>`);
            } else if (!checkadvisor_code() || !checkenic()) {
                $("#message").html(
                    `<div class="alert alert-warning">Please fill all required field</div>`);
                console.log("er");
            } else {
                console.log("ok");
                $("#message").html("");
                var form = $('#myform')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/event/' . $events->id . '/check') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,


                    success: function(data) {
                        $('#message').html(data);
                    },
                    complete: function() {
                        setTimeout(function() {
                            $('#myform').trigger("reset");
                            $('#submitbtn').html('Submit');
                            $('#submitbtn').attr("disabled", false);
                        }, 50000);
                    }
                });
            }
        });
    });


    function checkadvisor_Code() {

        var advisor_code = $('#advisor_code').val();
        if (!$('#advisor_code').val()) {
            $('#advisor_code_err').html('Advisor Code Invalid');
            return false;
        } else {
            $('#advisor_code_err').html('');
            return true;
        }
    }

    function checkenic() {

        var nic = $('#nic').val();
        if (!$('#nic').val()) {
            $('#nic_err').html('NIC No Invalid');
            return false;
        } else {
            $('#nic_err').html('');
            return true;
        }
    }
</script> --}}


 <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#submitbtn").click(function(e) {

        e.preventDefault();

        var category = $("#category").val();
        var advisor_code = $("#advisor_code").val();
        var nic = $("#nic").val();
        var token = $("#token").val();
        
        $.ajax({
            type: 'POST',
            url: "{{ url('admin/event/' . $events->id . '/check') }}",
            data: {
                advisor_code: advisor_code,
                nic: nic,
                category: category,
                _token: token
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    alert(data.success);
                    location.reload();
                } else {
                    printErrorMsg(data.error);
                }
            }
        });

    });

    function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
    }
</script>



</html>
