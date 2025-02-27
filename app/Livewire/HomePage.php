<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Brand;
use App\Models\Catogory;

#[Title('Home Page - DCodeMania')]
class HomePage extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active', 1)->get();
        $categories = Catogory::where('is_active', 1)->get();
        
        return view('livewire.home-page', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
