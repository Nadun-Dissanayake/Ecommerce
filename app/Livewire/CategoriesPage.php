<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Catogory;

#[Title('Categories Page - DCodeMania')]

class CategoriesPage extends Component
{
    public function render()
    {
        $categories = Catogory::where('is_active', 1)->get();
        return view('livewire.categories-page', [
            'categories' => $categories
        ]);
    }
}
