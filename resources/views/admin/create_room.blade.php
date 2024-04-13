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
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="text-center">Add Rooms</h1>
                            </div>
                            <div class="card-body">
                                <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Room Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Room Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option selected value="regular">Regular</option>
                                            <option value="premium">Premium</option>
                                            <option value="deluxe">Deluxe</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="wifi">Free Wifi</label>
                                        <select class="form-control" id="wifi" name="wifi">
                                            <option selected value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Upload Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add Room</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Fooder -->
        @include('admin.fooder')
        <!-- End Fooder -->
  </body>
</html>