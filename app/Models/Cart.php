<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = ['user_id', 'product_id', 'product_color_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the Cart
     */
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class);
    }
}
