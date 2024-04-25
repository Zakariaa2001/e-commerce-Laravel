<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Product_Color;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class proudctController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->with('category')->get();
        return view('Admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('Admin.product.create',compact('categories','brands','colors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productFormRequest $request)
    {
       $validateData = $request->validated();
       $category = Category::findOrfail($validateData['category_id']);

       $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand' => $validateData['brand'],
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'meta_title' => $validateData['meta_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description'],
       ]); 
       $i = 1;
       if ($request->hasFile('images')) {
           $uploadPath = 'uploads/products/';
           foreach ($request->file('images') as  $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++ .'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }

        return redirect()->route('products.index')->with('message', 'Product added successfully');
       
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
    public function edit(string $id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrfail($id);

        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        return view ('Admin.product.edit',compact('categories','brands','product','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productFormRequest $request, string $id)
    {
        $validateData = $request->validated();
        $product = Category::findOrfail($validateData['category_id'])
                    ->products()->where('id',$id)->first();
        if($product) {
            $product->update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand' => $validateData['brand'],
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'meta_title' => $validateData['meta_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description'],
            ]);
            $i = 1;
            if ($request->hasFile('images')) {
                $uploadPath = 'uploads/products/';
                foreach ($request->file('images') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0,
                    ]);
                }
            }

            return redirect()->route('products.index')->with('message', 'Product updated successfully');

        }else {
            return session('message','No product found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::findOrfail($id);
        if($product->productImages) {
            foreach ($product->productImages as $productImage) {
                if (File::exists($productImage->image)) {
                    File::delete($productImage->image);
                }
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('message', 'product deleted successfully');


    }
    public function destoryImage($product_image_id)
    {
        $productImage = Product_image::findOrfail($product_image_id);
        if(File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return back()->with('message', 'image deleted successfully');
    }
    public function updateProdColorQty(Request $request , $product_color_id) {
        $productColorData = Product::findOrFail($request->product_id)
                            ->productColors()->where('id',$product_color_id)->first();
        $productColorData->update([
            'quantity' => $request->qty,
        ]);
        return response()->json(['message'=>'Product Color Qty Updated succefully']);
    }
    public function deleteProdColor($product_color_id) {
        $prod_color = Product_Color::findOrFail($product_color_id);
        $prod_color->delete();
        return response()->json(['message' => 'Product Color Deleted succefully']);

    }

}