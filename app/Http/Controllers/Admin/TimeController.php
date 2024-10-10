<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Time;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::latest('id')->paginate(10);
        return view('admin.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.time.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|image',
        ]);
         

        $time = Time::create([
             'name' =>'' ,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $time->image()->create([
            'path' => $img_name,
        ]);

        return redirect()->route('admin.time.index')
        ->with('msg', 'Add Time Succssefully')
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
    public function edit(Time $time)
    {
        return view('admin.time.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Time $time)
    {
         $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
        ]);
         

        $time->update([
             'name' =>'' ,
        ]);

       if($request->hasFile('image')) {
            if($time->image) {
                File::delete(public_path('images/'.$time->image->path));
            }
            $time->image()->delete();
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
             $time->image()->create([
            'path' => $img_name,
            ]);

        }

        return redirect()->route('admin.time.index')
        ->with('msg', 'Update Time Succssefully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
        if($time->image) {
            File::delete(public_path('images/'.$time->image->path));
        }
        $time->image()->delete();
        $time->delete();
        return redirect()->route('admin.time.index')
        ->with('msg', 'DELET Time Succssefully')
        ->with('type', 'danger');
    }
}
