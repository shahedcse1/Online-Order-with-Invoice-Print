<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="{{url('')}}/admin_panel/AdminLTE//dist/css/adminlte.min.css">--}}
    <link rel="stylesheet" href="{{url('')}}/UI/AdminUI/Panel/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="{{ url('') }}"><b> </b></a>
    </div>
    <!-- User name -->
    <div class="text-danger text-center">Your account is in-active/blocked. <br> Please contact to your IT department.</div>

    <br>
    <br>

    <div class="text-center">
        <a href="{{ url('') }}">Get Back To Home</a>
    </div>
</div>
<!-- /.center -->

<script>
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "{{ url('') }}/en/login";

    }, 60000);
</script>

<!-- jQuery -->
<script src="{{url('')}}/UI/AdminUI/Panel/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('')}}/UI/AdminUI/Panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
