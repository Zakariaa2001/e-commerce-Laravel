<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryFormRequest $request)
    {

        if($request->validated()) {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;

                $file->move('uploads/category/',$filename);
                $category->image = $filename;
            }
            $category->status = $request->status == true ? '1' : '0';
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $category->save();
            return redirect('admin/category')->with('message','category added suuccefully');
        }
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
    public function edit(Category $category)
    {
        return view('Admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryFormRequest $request, string $id)
    {
        $category = Category::findOrfail($id);
        if ($request->validated()) {
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            if ($request->hasFile('image')) {
                $path = 'uploads/category/'.$category->image;
                if(File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }
            $category->status = $request->status == true ? '1' : '0';
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $category->update();
            return redirect('admin/category')->with('message', 'category update suuccefully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}