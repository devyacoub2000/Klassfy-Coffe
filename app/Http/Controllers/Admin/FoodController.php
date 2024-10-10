<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Food;
use App\Models\Time;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Food::latest('id')->paginate(10);
        return view('admin.food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $times = Time::select('id', 'name')->get();
        return view('admin.food.create', compact('times'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'body_en' => 'required|string',  
            'body_ar' => 'required|string', 
            'time_id' => 'required', 
            'image' => 'required|image',
        ]);
         

        $food = Food::create([
             'name'    =>'' ,
             'body' =>'',
             'time_id' => $request->time_id,
             'price' =>   $request->price,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $food->image()->create([
            'path' => $img_name,
        ]);

        return redirect()->route('admin.food.index')
        ->with('msg', 'Add Food Succssefully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {    
        $times = Time::select('id', 'name')->get(); 
        return view('admin.food.edit', compact('food', 'times'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
        ]);
         

        $food->update([
             'name' =>'' ,
             'body' =>'',
             'time_id'  => $request->time_id,
             'price'    =>   $request->price,
        ]);

        if($request->hasFile('image')) {
            if($food->image) {
                File::delete(public_path('images/'.$food->image->path));
            }
            $food->image()->delete();
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $food->image()->create([
                'path' => $img_name,
            ]);
        }

        return redirect()->route('admin.food.index')
        ->with('msg', 'Update Food Succssefully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        if($food->image) {
            File::delete(public_path('images/'.$food->image->path));
        }
        $food->image()->delete();
        $food->delete();
        return redirect()->route('admin.food.index')
        ->with('msg', 'DELETEE Food Succssefully')
        ->with('type', 'danger');

    }
}





