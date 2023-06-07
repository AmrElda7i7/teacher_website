<!DOCTYPE html>

<html
  lang="en"
  class="light-style"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Blank layout - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

  <form action="{{route('details')}}" method="post">
    @csrf
    <input type="text" hidden value="{{$id}}" name="id">
    <select name="month" id="month">
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'8','1')->format('Y-m-d')}}">8</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'9','1')->format('Y-m-d')}}">9</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'10','1')->format('Y-m-d')}}">10</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'11','1')->format('Y-m-d')}}">11</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'12','1')->format('Y-m-d')}}">12</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'2','1')->format('Y-m-d')}}">2</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'3','1')->format('Y-m-d')}}">3</option>
        <option value="{{Carbon\Carbon::createFromDate(Carbon\Carbon::today()->format('Y'),'4','1')->format('Y-m-d')}}">4</option>
    </select>
    <input type="submit" class="btn btn-primary">
  </form>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
