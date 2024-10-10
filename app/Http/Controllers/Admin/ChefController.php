<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\File;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::latest('id')->paginate(10);
        return view('admin.chef.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'special_en' => 'required|string',  
            'special_ar' => 'required|string',  
            'image' => 'required|image',
        ]);
         

        $chef = Chef::create([
             'name'    =>'' ,
             'special' =>'',
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $chef->image()->create([
            'path' => $img_name,
        ]);

        return redirect()->route('admin.chef.index')
        ->with('msg', 'Add Chef Succssefully')
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
    public function edit(Chef $chef)
    {
        return view('admin.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name_en'    => 'required|string',
            'name_ar'    => 'required|string',
            'special_en' => 'required|string',  
            'special_ar' => 'required|string',  
        ]);

        $chef->update([
             'name'    => '',
             'special' => '',
        ]);

        if($request->hasFile('image')) {
            if($chef->image) {
                File::delete(public_path('images/'.$chef->image->path));
            }
            $chef->image()->delete();
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
             $chef->image()->create([
            'path' => $img_name,
            ]);

        }

        return redirect()->route('admin.chef.index')
        ->with('msg', 'Update Chef Succssefully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
         
         if($chef->image) {
            File::delete(public_path('images/'.$chef->image->path));
          }
         $chef->image()->delete();
         $chef->delete();
         return redirect()->route('admin.chef.index')
        ->with('msg', 'DELETED Chef Succssefully')
        ->with('type', 'danger');
    }
}
