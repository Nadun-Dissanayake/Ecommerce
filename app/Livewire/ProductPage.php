<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Brand;
use App\Models\Catogory;

#[Title('Product Page - DCodeMania')]

class ProductPage extends Component
{
    use WithPagination;
    public function render()
    {
        $productQuery = Product::query()->where('is_active',1);
        return view('livewire.product-page',[
            'products'=>$productQuery->paginate(6),
            'brands'=>Brand::where('is_active',1)->get(['id','name', 'slug']),
            'categories'=>Catogory::where('is_active',1)->get(['id','name', 'slug'])
        ]);
    }
}
