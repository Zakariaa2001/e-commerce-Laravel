<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $colors = Color::orderBy('id','desc')->get();
        return view('Admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.color.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(colorRequest $request)
    {
        if($request->validated()) {
            $color = new Color();
            $color->name = $request->name; 
            $color->color = $request->code;
            $color->status = $request->has('status');
            $color->save();
            return redirect()->route('colors.index')->with('message','Color Added With Succefully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('Admin.color.edit', compact('color'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(colorRequest $request, Color $color)
    {
        if ($request->validated()) {
            $color->name = $request->name;
            $color->color = $request->code;
            $color->status = $request->status == true ? '1' : '0';
            $color->update();
            return redirect()->route('colors.index')->with('message', 'Color Updated With Succefully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('message', 'Color deleted successfully');
    }
}