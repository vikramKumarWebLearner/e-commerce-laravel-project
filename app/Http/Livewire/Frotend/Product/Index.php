<?php

namespace App\Http\Livewire\Frotend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;

    public $category;

    public $brand = [];

    public $price;

    protected $queryString = [
        'brand' => ['except' => '', 'as' => 'brand'],
        'price' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brand, function ($query) {
                $query->whereIn('brand', $this->brand);
            })
            ->when($this->price, function ($query) {
                $query->when($this->price == 'High-to-Low', function ($q1) {
                    $q1->orderBy('selling_price', 'DESC');
                })
                    ->when($this->price == 'Low-to-High', function ($q1) {
                        $q1->orderBy('selling_price', 'ASC');
                    });
            })
            ->where('status', '0')
            ->get();

        return view('livewire.frotend.product.index', ['products' => $this->products, 'category' => $this->category]);
    }
}
