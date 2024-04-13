<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .table_deg{
            border: 2px solid white;
            margin: auto;
            width: 80%;
            align-items: center;
            margin-top: 40px;
        }
        .th_deg{
            background-color: dimgray;
            padding: 15px;
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
                    <table class="table_deg table table-dark table-striped text-center align-middle">
                        <tr>
                            <!-- <th>STT</th> -->
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg" width = "30%">Description</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Wifi</th>
                            <th class="th_deg">Room-Type</th>
                            <th class="th_deg">Image Room</th>
                            <th class="th_deg">Update</th>
                            <th class="th_deg">Delete</th>
                        </tr>

                        @foreach($data as $data)
                        <tr>
                            <td class="align-middle">{{$data->room_title}}</td>
                            <td class="align-middle">{{$data->description}}</td>
                            <td class="align-middle">{{$data->price}}$</td>
                            <td class="align-middle">{{$data->wifi}}</td>
                            <td class="align-middle">{{$data->room_type}}</td>
                            <td class="align-middle">
                                <img class="rounded mx-auto d-block" width="80%"  src="room/{{$data->image}}" alt="">
                            </td>
                            <td class="align-middle">
                                <a href="{{url('update_room',$data->id)}}" class="btn btn-warning">Update</a>
                            </td>
                            <td class="align-middle">
                                <a onclick="return confirm('Bạn có muốn xóa không!');" href="{{url('delete_room',$data->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                </div>
            </div>
      </div>
    
        <!-- Fooder -->
        @include('admin.fooder')
        <!-- End Fooder -->
  </body>
</html>