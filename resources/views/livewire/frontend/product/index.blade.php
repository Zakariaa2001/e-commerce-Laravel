<div>
    <div class="row">
        <div class="col-3">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $categoryItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandsInputs" value="{{ $categoryItem->name }}">
                                {{ $categoryItem->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>brands</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name='priceInput' wire:model="priceInputs" value="high-to-low"> High To
                        Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name='priceInput' wire:model="priceInputs" value="low-to-high"> Low To
                        High
                    </label>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Of Stock</label>
                                @endif
                                @if ($product->productImages()->count() > 0)
                                    <img src="{{ asset($product->productImages[0]->image) }}"
                                        alt="{{ $product->name }}">
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ route('frontend.productView', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $product->selling_price }}</span>
                                    @if ($product->selling_price != $product->original_price)
                                        <span class="original-price">{{ $product->original_price }}</span>
                                    @endif
                                </div>
                                {{-- <div class="mt-2">
                                            <a href="" class="btn btn1">Add To Cart</a>
                                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                            <a href="" class="btn btn1"> View </a>
                                        </div> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="p-4">
                        No Products Avaiable for {{ $category->name }}
                    </h3>
                @endforelse

            </div>

        </div>
    </div>
</div>
