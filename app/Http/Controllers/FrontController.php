<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Food;

class FrontController extends Controller
{
    
   public function index () {
     $times = Time::latest('id')->get(); 
     $chefs = Chef::latest('id')->paginate(3); 
     $data =  Food::latest('id')->paginate(6); 
     return view('front.index', compact('times', 'chefs', 'data'));
   }

   public function dashboard() {
     $times = Time::latest('id')->get(); 
     $chefs = Chef::latest('id')->paginate(3); 
     $data =  Food::latest('id')->paginate(6); 
     return view('dashboard',  compact('times', 'chefs', 'data'));
   }

   public function store(Request $request) {
      $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer',
            'number_guests' => 'required|integer|max:12|min:1',
            'date' => 'required|date',
            'message' => 'required',
            'time_id' => 'required',
      ]);

       $data = Reservation::create($request->all());
      
       return redirect('/'); 

   }

   public function single_time($id) {
        $time = Time::FindOrFail($id);
        return view('front.single_time', compact('time'));
   }



}
