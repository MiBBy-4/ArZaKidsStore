<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Products";

    protected $fillable = [
            
            "title", "price", 
            "color", "composition", "size",
            "image", 'is_active',
    ];


    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {

        return $filter->apply($builder);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function bookmarks()
    {

        return $this->belongsToMany(Bookmark::class);
    }

    public function orders()
    {

        return $this->belongsToMany(Order::class);
    }
}
