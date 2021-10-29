<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Bookmarks";
    protected $fillable = [
        'user_id',
    ];

    public function products()
    {

        return $this->belongsToMany(Product::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
