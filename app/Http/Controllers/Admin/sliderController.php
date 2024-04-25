<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('Admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if ($request->validated()) {
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->description = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/slider/', $filename);
                $slider->image = 'uploads/slider/'.$filename;
            }
            $slider->status = $request->has('status');
            $slider->save();
            return redirect()->route('sliders.index')->with('message', 'Slider Added With Succefully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('Admin.slider.edit',compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
         if ($request->validated()) {
            $slider->title = $request->title;
            $slider->description = $request->description;
            if ($request->hasFile('image')) {
                $path = $slider->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/slider/', $filename);
                $slider->image = 'uploads/slider/'.$filename;
            }
            $slider->status = $request->has('status');
            $slider->save();
            return redirect()->route('sliders.index')->with('message', 'Slider Added Succefully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $path = $slider->image; 
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        return redirect()->route('sliders.index')->with('message', 'Slider Deleted Succefully');

    }
}