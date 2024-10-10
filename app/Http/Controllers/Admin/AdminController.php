<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Reservation;
use App\Models\Chef;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    
   public function index() {
      return view('admin.index');
   }

   public function all_reservations() {
      $reservations = Reservation::latest('id')->paginate(10);
      return view('admin.reservations.index', compact('reservations'));
   }

   public function update_reservation(Request $request, $id) {
           
           $data = Reservation::findOrFail($id);

           $data->update([
                 'status' => $request->status,
           ]); 

           return redirect()->route('admin.all_reservations')
           ->with('msg', 'Status Reservations Changed')
           ->with('type', 'success');

   }

   public function profile() {
      $admin = Auth::user();
      return view('admin.profile', compact('admin'));
   }

   public function update_profile(Request $request) {

           $request->validate([
                'name' => 'required',
                'current_password' => 'required_with:password',
                'password' => 'nullable|min:8|confirmed',
           ]); 

      $admin = Auth::user();
      $data = [
         'name' => $request->name,
        ];

     if($request->has('password')) {
        $data['password'] = bcrypt($request->password);
     }   

     $admin->update($data);

     if($request->hasFile('image')) {
        if($admin->image) {
           File::delete(public_path('images/'.$admin->image->path));
           $admin->image()->delete();
        }
        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $admin->image()->create([
            'path' => $img_name,
        ]); 

     }

        return redirect()->route('admin.profile')
        ->with('msg', 'Profile Update Successfully')
        ->with('type', 'success');
     }



    public function check_password(Request $request) {
           return (Hash::check($request->password, Auth::user()->password));
     }



         

}












