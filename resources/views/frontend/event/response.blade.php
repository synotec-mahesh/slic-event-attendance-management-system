<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('assets/forntend/libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/forntend/css/style.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />


</head>

<body class="background_body">
    <div class="wrapper">

        @if ($Attendance)
            <div class="alert_wrap success">
                <div class="alert_icon">
                    <ion-icon class="icon" name="checkmark" id="icon_success"></ion-icon>
                </div>
                <div class="content">
                    <p class="title">Success!</p>
                    <hr class="sucess_border">
                    <p class="info">
                    <h3 id="info_message">{{ $Attendance->events->message }}</h3>
                    <h2 id="info_input_text">{{ $Attendance->events->input_text }}</h2>
                    <label type="text" id="table_no">{{ $Attendance->table_no }}</label>
                    </p>
                </div>

            </div>
        @elseif ($error)
            <div class="alert_wrap error">
                <div class="alert_icon">
                    <ion-icon class="icon" name="close" id="icon_error"></ion-icon>
                </div>
                <div class="content">
                    <p class="title" id="error_title">Wrong!</p>
                    <hr class="error_border">
                    <p class="info">
                        <strong class="error_text">{{ $error }}</strong>
                        
                    </p>
                </div>
               
                <div>
                    <a href="{{ URL::previous() }}"> <button>Retry</button></a>
                 </div>
                
              
                
            </div>
        @endif
    </div>
    


</body>

<script src="{{ asset('assets/forntend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</html>
