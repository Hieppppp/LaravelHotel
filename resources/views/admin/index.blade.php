<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    <!-- Header -->
    @include('admin.header')
    <!-- End Header -->

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.slider')
      <!-- Sidebar Navigation end-->

        <!-- Body -->
        @include('admin.body')
        <!-- End Body -->

        <!-- Fooder -->
        @include('admin.fooder')
        <!-- End Fooder -->
  </body>
</html>