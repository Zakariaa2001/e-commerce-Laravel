<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$slug,$status,$brand_id,$category_id;

    public function resetInput() {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->category_id = null;
    }
    public function closeModal() {
        $this->resetInput();
    }
    public function openModal() {
        $this->resetInput();
    }
    public function rules() {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id' => 'required',
        ];
    }
    public function storeBrand() {
        $validatedData = $this->validate();
        Brand::create([
            'name'=> $this->name,
            'slug'=> $this->slug,
            'status'=> $this->status == true ? '1':'0',
            'category_id'=> $this->category_id,
        ]);
        session()->flash('message','brand added succefully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function editBrand(int $brand_id) {
        $this->brand_id = $brand_id;
        $brand=Brand::findOrfail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }
    public function updateBrand() {
        $validatedData = $this->validate();
        Brand::findOrfail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this->category_id,
        ]);
        session()->flash('message', 'brand updated succefully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.brand.index',compact('brands','categories'))
                ->extends('layouts.admin')
                ->section('content');
    }

    public function destoryBrand($brand_id) {
        $this->brand_id = $brand_id;
        
    }
    public function deleteBrand() {
        $brand = Brand::findOrfail($this->brand_id);
        $brand->delete();
        session()->flash('message', 'brand deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
}