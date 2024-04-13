<!DOCTYPE html>
<html lang="en">
   <head>
        <base href="/public">
      @include('home.css');
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

      <style type="text/css">
        
      </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      @include('home.header');
    
      <!-- end header inner -->
      <!-- end header -->

      <!-- Room Details -->
        <div class="our_room">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Room Details</h2>
                            <p>Lorem Ipsum available, but the majority have suffered </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-8">
                        <div id="serv_hover" class="room">
                            <div class="room_img" style="padding: 20px;">
                                <figure><img class="img-fluid" src="/room/{{$room->image}}" alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>{{$room->room_title}}</h3>
                                <p class="mb-3">{{$room->description}} </p>
                                <h4 class="mb-3">Free Wifi : {{$room->wifi}}</h4>
                                <h4 class="mb-3">Room Type : {{$room->room_type}}</h4>
                                <h3 class="mb-3">Price : {{$room->price}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1 style="font-size:40px!important;">Book Room</h1>
                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                    {{session()->get('message')}}
                                </div>
                            @endif
                        </div>
                        @if($errors)
                            @foreach($errors->all() as $errors)
                            <li style="color: red;">
                                {{$errors}}
                            </li>
                            @endforeach
                        @endif
                        <form action="{{url('add_booking',$room->id)}}" method="Post"  class="form-fluid">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                 @if(Auth::id()) value="{{Auth::user()->name}}"@endif>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" @if(Auth::id()) value="{{Auth::user()->email}}"@endif placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}"@endif>
                            </div>
    
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Check In</label>
                                <input type="date" class="form-control" name="checkIn" id="checkIn">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Check Out</label>
                                <input type="date" class="form-control" name="checkOut" id="checkOut">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-success" value="Book Room">
                            </div>
                        </form>

                    </div>
                   

                </div>
            </div>
        </div>
      <!--  footer -->
      @include('home.footer')
      <!-- end footer -->

      <!-- Javascript files-->
      @include('home.scripts');

      <script type="text/javascript">
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth()+1;

            var day = dtToday.getDate();
            
            var year = dtToday.getFullYear();

            if(month<10){
                month ='0' + month.toString();
            }
            if(day<10){
                day ='0' + day.toString();
            }
            var maxDate = year + '_' + month + '_' + day;
            $('#checkIn').attr('min',maxDate);
            $('#checkOut').attr('min',maxDate);

        });

      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    
     
   </body>
</html>