<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends BookmarkBaseController
{
    public function index()
    {
        $userId = Auth::id();

        $bookmark = Bookmark::where('user_id', $userId)->first();

        $products = null;

        if($bookmark){
            $products = Bookmark::where('user_id', $userId)->first()->products;
        }



        return view('main.bookmark.index', compact('products'));
    }

    public function store(Request $request)
    {
        $id = $request['product_id'];

        $this->service->store($id);

        return back()->with('bookmarkSuccess', 'товар добавлен в закладки');
    }

    public function destroy(Request $request)
    {
        $productId = $request['product_id'];

        $this->service->destroy($productId);

        return back()->with('bookmarkDestroy', 'товар больше не в закладках');
    }
}
