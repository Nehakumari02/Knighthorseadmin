<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TempCart;

class WishlistController extends Controller
{
    public function index()
    {
        $page_title = "All Users' Wishlist (Temp Carts)";

        // 1. Fetch TempCart data
        // 2. 'with('user')': Load the user details for every cart
        // 3. 'whereNotNull': Don't show empty rows
        // 4. 'latest()': Show newest additions first
        $wishlists = TempCart::with('user')
            ->whereNotNull('data')
            ->latest()
            ->paginate(15);

        return view('admin.sections.wishlist.index', compact('page_title', 'wishlists'));
    }
}