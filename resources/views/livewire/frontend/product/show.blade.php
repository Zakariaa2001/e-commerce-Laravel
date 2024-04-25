 <div class="py-3 py-md-5 bg-light">
     <div class="container">
         @if (session()->has('message'))
             <div class="alert alert-success">
                 {{ session('message') }}
             </div>
         @endif
         <div class="row">
             <div class="col-md-5 mt-3">
                 <div class="bg-white border">
                     @if ($product->productImages)
                         <div id="productImageCarousel" class="carousel slide" data-bs-ride="carousel">
                             <div class="carousel-inner">
                                 @foreach ($product->productImages as $key => $image)
                                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                         <img src="{{ asset($image->image) }}" class="d-block w-100" alt="Image">
                                     </div>
                                 @endforeach
                             </div>
                             <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel"
                                 data-bs-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Previous</span>
                             </button>
                             <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel"
                                 data-bs-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="visually-hidden">Next</span>
                             </button>
                         </div>
                     @else
                         No image added
                     @endif
                 </div>
             </div>
             <div class="col-md-7 mt-3">
                 <div class="product-view">
                     <h4 class="product-name">
                         {{ $product->name }}
                         {{-- <label class="label-stock bg-success">In Stock</label> --}}
                     </h4>
                     <hr>
                     <p class="product-path">
                         Home / {{ $product->category->name }} / {{ $product->name }}
                     </p>
                     <div>
                         <span class="selling-price">{{ $product->selling_price }}</span>
                         <span class="original-price">{{ $product->original_price }}</span>
                     </div>
                     <div>
                         @if ($product->productColors->count() > 0)
                             @if ($product->productColors)
                                 @foreach ($product->productColors as $productColor)
                                     {{-- <input type="radio" name="colorSelection" value="{{ $productColor->id }}">
                                     {{ $productColor->color->name }} --}}
                                     <label for="" class="colorSelectionLabel"
                                         style="background-color: {{ $productColor->color->color }}; color: {{ $productColor->color->color == 'white' ? 'black' : 'white' }};"
                                         wire:click="colorSelected({{ $productColor->id }})">
                                         {{ $productColor->color->name }}
                                     </label>
                                 @endforeach
                             @endif
                             <div>
                                 @if ($this->productQunatnity == 'outofstock')
                                     <label class="btn-sm py-1 mt-2 text-white  bg-danger">Out of Stock</label>
                                 @else
                                     <label class="btn-sm py-1 mt-2 text-white  bg-success">In Stock</label>
                                 @endif
                             </div>
                         @else
                             @if ($product->quantity > 0)
                                 <label class="btn-sm py-1 mt-2 text-white  bg-success">In Stock</label>
                             @else
                                 <label class="btn-sm py-1 mt-2 text-white  bg-danger">Out of Stock</label>
                             @endif
                         @endif
                     </div>
                     <div class="mt-2">
                         <div class="input-group">
                             <span class="btn btn1" wire:click='decremmentQuantity'><i class="fa fa-minus"></i></span>
                             <input type="text" wire:model='quantityCount'
                                 valquantityCountue="{{ $this->quantityCount }}" readonly class="input-quantity" />
                             <span class="btn btn1" wire:click='incremmentQuantity'><i class="fa fa-plus"></i></span>
                         </div>
                     </div>
                     <div class="mt-2">
                         <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                             <i class="fa fa-shopping-cart"></i> Add To Cart
                         </button>
                         <button type="button" wire:click='addToWishlist({{ $product->id }})' class="btn btn1">
                             <span wire:loading.remove wire:target='addToWishlist'>
                                 <i class="fa fa-heart"></i> Add To Wishlist
                             </span>
                             <span wire:loading wire:target='addToWishlist'>
                                 loading...
                             </span>
                         </button>
                     </div>
                     <div class="mt-3">
                         <h5 class="mb-0">Small Description</h5>
                         <p>
                             {!! $product->small_description !!}
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 mt-3">
                 <div class="card">
                     <div class="card-header bg-white">
                         <h4>Description</h4>
                     </div>
                     <div class="card-body">
                         <p>
                             {!! $product->description !!}
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
