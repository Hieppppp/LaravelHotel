<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Blog;
use App\Models\Gallary;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $usertype = $user->usertype;
    
            if($usertype == "user"){
                $room = Room::all();
                $gallary = Gallary::all();
                return view("home.index",compact('room','gallary'));
            }
            else if($usertype == "admin"){
                return view("admin.index");
            }
            else{
                return redirect()->back();
            }
        } else {
            // Nếu người dùng chưa đăng nhập, bạn có thể chuyển hướng hoặc xử lý theo cách bạn muốn ở đây
            return redirect()->route('login');
        }
    }

    public function home(){
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index',compact('room','gallary'));
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function create_blog(){
        return view('admin.create_blog');
    }

    //Add room
    public function add_room(Request $request){
        $data = new Room();

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image=$request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }
    
    //Add Blog
    public function add_blog(Request $request){
        $data = new Blog();

        $data->blog_name = $request->name;
        $data->blog_title = $request->title;
        $data->description = $request->description;
        $data->blog_type = $request->type;
        $image =$request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('blog', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    public function view_room(){
        $data = Room::all();
        return view('admin.view_room',compact('data'));
    }

    public function view_blog(){
        $data = Blog::all();
        return view('admin.view_blog',compact('data'));
    }

    public function delete_room($id){
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function delete_blog($id){
        $data = Blog::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function delete_booking($id){
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_room($id){
        $data = Room::find($id);
        return view('admin.update_room',compact('data'));
    }

    public function edit_room(Request $request,$id){
        $data = Room::find($id);

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image=$request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();

    }

    public function bookings(){
        $data = Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function approve_book($id){
        $booking = Booking::find($id);
        $booking->status='approve';
        $booking->save();
        return redirect()->back();

    }
    public function reject_book($id){
        $booking = Booking::find($id);
        $booking->status='reject';
        $booking->save();
        return redirect()->back();

    }

    public function view_gallary(){
        $gallary = Gallary::all();
        return view('admin.gallary',compact('gallary'));
    }

    public function upload_gallary(Request $request){
        $data = new Gallary;
        $image = $request->image;
        if( $image ){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }
    
}
