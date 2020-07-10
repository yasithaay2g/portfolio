
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="travel">
    <meta name="author" content="Creative Tim">
    <title>Portfolio</title>

    @include('Adminarea/Includes/css')
    @yield('css')




</head>

<body>
    <!-- Sidenav -->
    @include('Adminarea/Includes/sidebar')

    <div class="main-content" id="panel">

            @include('Adminarea/Includes/nav')




        <!-- Header -->

            @yield('pagehead')
            @yield('gellary')
        <!-- Page content -->
        <div class="container-fluid mt--6">

                @yield('content')

            @include('Adminarea/Includes/footer')

        </div>
    </div>

    @include('Adminarea/Includes/js')





@yield('js')






</body>

</html>
