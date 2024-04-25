<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\wishlist;

class WishlistShow extends Component
{

    public function removeWishListItem($wishlistItemId) {
        wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistItemId)->delete();
        $this->emit('wishlistAddedUpdated');

        $this->dispatchBrowserEvent('message', 
        ['text' => 'WishList Item Removed Successfully',
        'type' => 'succes',
        'status' => 200
        ]);
    }
    public function render()
    {
        $wishlists = wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',['wishlists' => $wishlists]);
    }
}
