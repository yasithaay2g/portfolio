
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Tx_travel</title>

  @include('Adminarea/Includes/css')


</head>

<body class="bg-default">

  <!-- Navbar -->

  @include('Adminarea/Includes/login_nav')

  <!-- Main content -->
  <div class="main-content">
        @yield('header')
        @yield('content')

</div>
  <!-- Footer -->

  @include('Adminarea/Includes/login_footer')


    <!-- Argon Scripts -->
    @include('Adminarea/Includes/js')

</body>

</html>
