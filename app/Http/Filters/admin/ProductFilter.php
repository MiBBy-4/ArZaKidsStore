<?php

namespace App\Http\Filters\admin;

use App\Http\Filters\QueryFilter;

class ProductFilter extends QueryFilter
{

    public function searchField($searchString = '')
    {

        return $this->builder->where('title', 'LIKE', '%'.$searchString.'%')
        ->orWhere('color', 'LIKE', '%'.$searchString.'%')
        ->orWhere('composition', 'LIKE', '%'.$searchString.'%')
        ->orWhere('size', 'LIKE', '%'.$searchString.'%');
    }
}