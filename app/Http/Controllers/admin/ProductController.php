<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\admin\ProductFilter;
use App\Http\Requests\admin\StoreRequest;
use App\Http\Requests\admin\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    
    public function index(ProductFilter $request)
    {
        
        $products = Product::filter($request)->paginate(5);

        return view("admin.product", compact('products'));
    }

    public function create()
    {

        return view("admin.create");
    }

    public function store(StoreRequest $request)
    {
        
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route("admin.products.index");
    }

    public function update(Product $product, UpdateRequest $request)
    {
        
        $data = $request->validated();
        $this->service->update($product, $data);

        return redirect()->route("admin.products.index");
    }

    public function edit(Product $product)
    {
        return view("admin.edit", compact('product'));
    }

    

    public function destroy($productId)
    {
        DB::table('products')->where('id', $productId)->delete();

        return redirect()->route("admin.products.index");
    }

    public function test()
    {
        dd("ПОШЕЛ ТЫ НАХУЙ ЕБАННЫЙ РОУТЕР");
    }
}
