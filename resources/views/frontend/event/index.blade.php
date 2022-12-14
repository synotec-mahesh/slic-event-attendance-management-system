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

    <title>{{ $events->title }} - SLIC</title>
</head>

<body>
    <div class="container-fluid">
        <div class="main">

            <form action="{{ url('/event/check-in') }}" method="POST">
                @csrf

                <div class="logo">
                    <img src="{{ asset('assets/forntend/img/logo.png') }}" alt=""
                        class="img-fluid rounded mx-auto d-block" id="logo_img" />
                </div>

                <div class="topic">
                    <h1 class="topic_title">{{ $events->title }}</h1>
                </div>

                <select class="category" name="category" id="category" required="TRUE">
                    <option value="">Select Your Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->coloum_name }}" myTag="{{ $category->input_text }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                
                <label class="form-details" ></label>
                
                <center>

                    <label class="form-details">Enter Your <span id="setMyTag">Code</span></label>
                    <input type="text" id="code" name="code"/>

                    <label class="form-details">Enter Your NIC No.</label>
                    <input type="text" id="nic" name="nic" />

                    <input type="hidden" id="event_id" name="event_id" required="TRUE" value="{{ $events->id }}" />

                </center>

                <input type="submit" id="submitbtn" value="Check-in Now" />
            </form>
        </div>
    </div>


</body>

<script src="{{ asset('assets/forntend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(function() { 
    $("#category").change(function(){ 
        var element = $(this).find('option:selected'); 
        var myTag = element.attr("myTag"); 
        $('#setMyTag').empty(); 
        $('#setMyTag').append(myTag); 
        $('#setMyTag').change();
    }); 
}); 

</script>
</html>
