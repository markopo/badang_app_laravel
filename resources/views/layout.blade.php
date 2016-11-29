<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{URL::to('/')}}/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
    <style>
        #wrapper {
            margin: 0 auto;
            max-width: 960px;
            min-width: 480px;
        }

    </style>
    <script src="{{URL::to('/')}}/js/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/js/knockout.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.validate.min.js"></script>
    <script src="{{URL::to('/')}}/js/bootstrap.min.js" ></script>


</head>
<body>
<div id="wrapper">
    @yield('content')
</div>

</body>
</html>
