<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_detail($id){
        $room = Room::find($id);

        return view("home.room_detail",compact("room"));
    }

    public function add_booking(Request $request,$id){

        $request->validate([
            'checkIn'=>'required|date',
            'checkOut'=> 'date|after:checkIn',
        ]);
        $data = new Booking;

        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;

        $isBooked = Booking::where('room_id' ,$id)
        ->where('checkIn','<=',$checkOut)
        ->wheres('checkOut','>=',$checkIn)->exists();

        if($isBooked){
            return redirect()->back()->with('message','Room is already booked please try different date!');
        }
        else{

            $data->checkIn = $request->checkIn;
            $data->checkOut = $request->checkOut;

            $data->save();

            return redirect()->back()->with('message','Đặt phòng thành công!');
        }

    }

    public function contact(Request $request){
        $contact = new Contact;

        $contact->name= $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message= $request->message;

        $contact->save();
        return redirect()->back()->with('message','Gửi thông tin thành công!');

    }
}
