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
    <div class="col-md-6" >
      <div class="card mb-4">
        <h5 class="card-header">Basic</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
    <form action="{{route('students.update',$student->id)}}" method="post">
      @csrf
      @method('put')
      <div class="input-group"> 
        <span class="input-group-text" id="basic-addon11">@</span>
        <input
          type="text"
          name="student_name"
          class="form-control "
          placeholder="student_name"
          aria-label="student_name"
          aria-describedby="basic-addon11"
          value="{{$student->name}}"
     />
    </div>
    @error('student_name')
      {{$message}}
    @enderror
        <input
          type="text"
          name="parent_number"
          class="form-control "
          placeholder="parent_numer"
          aria-label="student_name"
          aria-describedby="basic-addon11"
          value="{{$student->parent_number}}"
          
     />
    @error('parent_number')
      {{$message}}
    @enderror
        <input
          type="text"
          name="student_number"
          class="form-control "
          placeholder="student_number"
          aria-label="student_name"
          aria-describedby="basic-addon11"
          value="{{$student->student_number}}"
     />
    @error('student_number')
      {{$message}}
    @enderror
    <div class="mb-3">
        <label for="groups" class="form-label">groups</label>
        <select class="form-select" id="groups"  name="groups">
            <option value="{{$student->group_id}}" selected>{{$student->group->name}}</option>
          @foreach ($groups as $group)
              
          <option value="{{$group->id}}">{{$group->name}}</option>
          @endforeach
        </select>
      </div>
      @error('groups')
      {{$message}}
    @enderror
      
       
<input type="submit" value="save" class="btn btn-primary">
</form>
</div>
</div>
</div>

    <!-- / Content -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

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
