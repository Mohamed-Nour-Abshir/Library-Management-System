<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="shortcut icon" href="">
    <link rel="image_src" href="" />
    <link rel="canonical" href="" />

    <title>DIU Library Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" href="{{asset('static/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    @include('common.script_top')

</head>
<body>
    <style>
        .module-head{
            background-color: #000;
            color:#fff;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            font-style: bold;
        }
        .module-head h3{
            color:#fff;
        }

        .widget-menu{
            background: #000 !important;
            color:#fff;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            font-style: bold;
        }
        .navbar-inner{
            background: #000 !important;
            color:#fff;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-transform: uppercase;
            font-style: bold;
        }
    </style>

    @include('layout.template_navbar')

<div class="wrapper">
    <div class="container">
        <div class="row">

            @include('layout.template_leftbar')

            <div class="span9">

            @include('account.message')
            @yield('content')

            </div>
        </div>
    </div>    
</div>

    @include('layout.template_footer')
    


    <script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>

<script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>

@include('common.script_bottom')

<script type="text/template" id="alert_box">
    @include('underscore.alert_box')

</script>

<script>
    $(document).ready(function(){ 
    $("input").attr("autocomplete", "off");
});
</script>

</body>
</html>