<?php

#TODO:何のCategoryか分かるように変数名を変更する
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('default', compact('categories'));
    }
}
