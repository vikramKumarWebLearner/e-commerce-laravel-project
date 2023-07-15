<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';

    protected $fillable = [
        'quantity',
        'product_id',
        'color_id',
    ];

    /**
     * Get the user that owns the ProductColor
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
