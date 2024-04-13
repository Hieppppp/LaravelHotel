<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
                    <div class="div_center">
                        <h1 style="font-size: 30px;font-weight:bold;">Update Rooms</h1>
                        <form action="{{url('edit_room',$data->id)}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_deg">
                                <label for="">Room Title</label>
                                <input type="text" name="title" value="{{$data->room_title}}">
                            </div>
                            <div class="div_deg">
                                <label for="">Description</label>
                                <textarea name="description" rows="4">
                                    {{$data->description}}
                                </textarea>
                            </div>
                            <div class="div_deg">
                                <label for="">Price</label>
                                <input type="number" name="price" value="{{$data->price}}">
                            </div>
                            <div class="div_deg">
                                <label for="">Room Type</label>
                                <select name="type"> 
                                    <option selected value="{{$data->room_type}}">{{$data->room_type}}</option>
                                    <option selected value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="deluxe">Deluxe</option>

                                </select>
                            </div>
                            <div class="div_deg">
                                <label for="">Free Wifi</label>
                                <select name="wifi" value="{{$data->room_title}}"> 
                                    <option selected value="{{$data->wifi}}">{{$data->wifi}}</option>
                                    <option selected value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label>Cerrent Image</label>
                                <img style="margin: auto;" class="rounded mx-auto d-block" width="20%" src="/room/{{$data->image}}" alt="">
                            </div>
                            <div class="div_deg">
                                <label>Upload Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="div_deg">
                                <input class="btn btn-primary" type="submit" value="Update Room">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    
        

        <!-- Fooder -->
        @include('admin.fooder')
        <!-- End Fooder -->
  </body>
</html>