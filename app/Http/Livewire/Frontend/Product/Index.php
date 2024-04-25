<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products , $category ,$brandsInputs = [] ,$priceInputs;


    protected $queryString = [
        'brandsInputs' => ['except' => '', 'as' => 'brand'],
        'priceInputs' => ['except' => '', 'as' => 'price'],
    ];
    public function mount($category) {
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
                            ->when($this->brandsInputs, function ($q) {
                                $q->whereIn('brand',$this->brandsInputs);
                            })
                            ->when($this->priceInputs, function ($q) {
                                $q->when($this->priceInputs == 'high-to-low', function ($q2) {
                                    $q2->orderBy('selling_price','desc');
                                })->when($this->priceInputs == 'low-to-high', function ($q2) {
                                    $q2->orderBy('selling_price','asc');
                                });
                            })  
                            ->where('status', '0')->get();
        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}