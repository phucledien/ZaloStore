<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  @yield('title')
  
  @include('admin.layouts.css')
  
  @yield('css')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.layouts.navigator')
  
  <div class="content-wrapper">
    @yield('content')
    <!-- /.container-fluid-->

    
    @include('admin.layouts.footer')

    @include('admin.layouts.scripts')
    
    @yield('scripts')
  </div>
  <!-- /.content-wrapper-->
</body>

</html>