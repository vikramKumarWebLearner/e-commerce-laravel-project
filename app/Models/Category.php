<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'desc',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_desc',
        'status',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    
    public function relatedProduct()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest()->take(16);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '0');
    }
}
