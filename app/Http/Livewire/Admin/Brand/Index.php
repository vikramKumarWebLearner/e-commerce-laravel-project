<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Str;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;

    public $slug;

    public $status;

    public $brand_id;

    public $brand_Id;

    public $category_id;

    protected $rules = [
        'name' => 'require|string',
        'slug' => 'require|string',
        'status' => 'nullable',
        'category_id' => 'require',
    ];

    public function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->category_id = null;
    }

    public function storeBrand()
    {
        //  $validatedData  = $this->validate();

        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == 'true' ? '1' : '0',
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->closeModal();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brands = Brand::findOrfail($brand_id);
        $this->name = $brands->name;
        $this->slug = $brands->slug;
        $this->status = $brands->status;
        $this->category_id = $brands->category_id;
    }

    public function updateBrand()
    {
        // $validatedData  = $this->validate();

        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == 'true' ? '1' : '0',
            'category_id' => $this->category_id,
        ]);

        session()->flash('message', 'Brand Update Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand(int $brand_id)
    {
        $this->brand_Id = $brand_id;

    }

    public function destoryBrand()
    {
        $brands = Brand::find($this->brand_Id);

        $brands->delete();

        session()->flash('message', 'Brand Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $category = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $category])->extends('layouts.admin')->section('content');
    }
}
