<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class WhishlistController extends Controller
{
    public function whishlist()
    {
        return view('frotend.whishlist.whishlist-show');
    }
}
