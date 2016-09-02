<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Application fbm - @yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

    @include('layouts.header')

</head>
<body>
<div id="wrapper">
    @include('layouts.admin_topnav')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                @include('layouts.admin_side_bar')
            </div>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">

                @yield('content')

            </div>
        </div>
    </div>

    @include('layouts.footer')
</div>
<!-- Latest compiled and minified JavaScript -->
<!-- JavaScripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="{{ elixir('js/all.js') }}"></script>

</body>
</html>