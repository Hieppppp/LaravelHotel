<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
        .div_deg{
            padding-top: 30px;
        }
        .div_center{
            text-align: center;
            padding-top: 40px;
        }

    </style>

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
                                <h1 class="text-center">Update Blog</h1>
                            </div>
                            <div class="card-body">
                                <form action="{{url('edit_blog',$data->id)}}" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Blog Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$data->blog_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Blog Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$data->blog_title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" >
                                            {{$data->description}}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Blog Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option selected value="{{$data->blog_type}}">{{$data->blog_type}}</option>
                                            <option selected value="regular">Regular</option>
                                            <option value="premium">Premium</option>
                                            <option value="deluxe">Deluxe</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Current Image</label>
                                        <img style="margin: auto;" class="rounded mx-auto d-block" width="20%" src="/blog/{{$data->image}}" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Upload Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" value="Update Blog">
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