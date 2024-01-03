<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->paginate(5);

        //return  $products;


        return view('product.index',compact('products'));
    }
}
