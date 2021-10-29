<?php

namespace App\Http\Services\admin;

use App\Models\Product;

class ProductService
{

    public function store($data)
    {

        $data = Product::create($data);
        
    }

    public function update($product, $data)
    {
        $product = $product->update($data);
    }
}