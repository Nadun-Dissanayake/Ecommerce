<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Brand;
use App\Models\Catogory;
use Livewire\Attributes\Url;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;

#[Title('Product Page - DCodeMania')]

class ProductPage extends Component
{
    use WithPagination;

    #[Url]
    public $Selected_Categories = [];
    #[Url]
    public $Selected_Brands = [];
    #[Url]
    public $featured;
    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 300000;

    #[Url]
    public $sort = 'latest';

    // Add Product to cart methode
    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count:$total_count)->to(Navbar::class);
        
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);
        if(!empty($this->Selected_Categories)){
            $productQuery->whereIn('category_id', $this->Selected_Categories);
        }

        if(!empty($this->Selected_Brands)){
            $productQuery->whereIn('brand_id', $this->Selected_Brands);
        }

        if($this->featured){
            $productQuery->where('is_featured',1);
        }

        if($this->on_sale){
            $productQuery->where('on_sale',1);
        }

        if($this->price_range){
            $productQuery->whereBetween('price',[0,$this->price_range]);
        }

        if($this->sort == 'latest'){
            $productQuery->latest();
        }

        if($this->sort == 'price'){
            $productQuery->orderBy('price');
        }



        return view('livewire.product-page',[
            'products'=>$productQuery->paginate(9),
            'brands'=>Brand::where('is_active',1)->get(['id','name', 'slug']),
            'categories'=>Catogory::where('is_active',1)->get(['id','name', 'slug'])
        ]);
    }
}
