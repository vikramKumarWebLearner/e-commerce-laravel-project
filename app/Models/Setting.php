<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_url',
        'page_title',
        'meta_keyword',
        'meta_desc',
        'address',
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'facbook',
        'twitter',
        'instagram',
        'youtube'
    ];
}
