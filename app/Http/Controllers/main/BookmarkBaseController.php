<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Services\main\bookmark\BookmarkService;
use Illuminate\Http\Request;

class BookmarkBaseController extends Controller
{
    public $service;

    public function __construct(BookmarkService $service)
    {
        $this->service = $service;
    }
}
