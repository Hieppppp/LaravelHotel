<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                            <th class="th_deg">Room-ID</th>
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Check-In</th>
                            <th class="th_deg">Check-Out</th>
                            <th class="th_deg">Status</th>
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Action</th>
                            <th class="th_deg">Status Update</th>

                        </tr>
                        @foreach($data as $data)
                        <tr >
                            <td class="align-middle">{{$data->room_id}}</td>
                            <td class="align-middle">{{$data->name}}</td>
                            <td class="align-middle">{{$data->email}}</td>
                            <td class="align-middle">{{$data->phone}}</td>
                            <td class="align-middle">{{$data->checkIn}}</td>
                            <td class="align-middle">{{$data->checkOut}}</td>
                            <!-- <td class="align-middle">{{$data->status}}</td> -->
                            <td class="align-middle">
                                @if($data->status == 'approve')
                                  <span style="color: green;">Chấp Nhận</span>
                                @elseif($data->status == 'reject')
                                  <span style="color: red;">Từ Chối</span>
                                @else
                                  <span style="color: darkorange;">Đang Đợi</span>
                                @endif
                            </td>
                            <td class="align-middle">{{$data->room->room_title}}</td>
                            <td class="align-middle">{{$data->room->price}}$</td>
                            <td class="align-middle">
                                <img class="rounded mx-auto d-block" width="50%" src="/room/{{$data->room->image}}" alt="">
                            </td>
                            <td class="align-middle">
                              <a onclick="return confirm('Bạn có muốn xóa không!');" class="btn btn-danger" href="{{url('delete_booking',$data->id)}}"> Delete</a>
                            </td>
                            <td class="align-middle">
                                <span class="mb-3">
                                  <a class="btn btn-success" href="{{url('approve_book',$data->id)}}">Approve</a>
                                </span>
                                <span>
                                  <a class="btn btn-warning" href="{{url('reject_book',$data->id)}}">Rejected</a>
                                </span>
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