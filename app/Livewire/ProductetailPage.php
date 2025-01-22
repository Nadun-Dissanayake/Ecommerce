<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;

#[Title('Product Detail - DCcodeMania')]
class ProductetailPage extends Component
{


    public $slug;
    public $quantity = 1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function decrementQuantity(){
        if($this->quantity > 1) {
            $this->quantity--;
        }
        
    }

    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update-cart-count', total_count:$total_count)->to(Navbar::class);
        
    }

    public function incrementQuantity(){
        
        $this->quantity++;
    }

    public function render()
    {
        return view('livewire.productetail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail()
        ]);
    }
}
