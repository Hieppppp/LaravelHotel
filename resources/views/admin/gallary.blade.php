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
      <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1>Gallary</h1>
                    <div class="row">
                        @foreach($gallary as $gallary)
                            <div class="col-md-4">
                                <img style="height: 200px!important;width:300px;" src="/gallary/{{$gallary->image}}" alt="">
                            </div>
    
                        @endforeach

                    </div>


                    <form action="{{url('upload_gallary')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Upload Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div>
                            <input class="btn btn-primary" type="submit" value="Add Image">
                        </div>
                    </form>
                    
                </div>
            </div>
      </div>




        <!-- Fooder -->
        @include('admin.fooder')
        <!-- End Fooder -->
  </body>
</html>