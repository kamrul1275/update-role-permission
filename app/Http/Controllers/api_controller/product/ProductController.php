<?php


namespace App\Http\Controllers\api_controller\product;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([

            'message'=>'Product list',
            'data'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $products = new Product();
        $products->title= $request->title;
        $products->price= $request->price;
        $products->save();

        $msg="Product added succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::find($product);

        //return $product;
        return response()->json([
        "success" => true,
        "message" => "Edit Product List",
        "data" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    // {
    //     $product = Product::find($product);

    //     return $product;
    //     return response()->json([
    //     "success" => true,
    //     "message" => "Edit Product List",
    //     "data" => $product
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->title= $request->title;
        $product->price= $request->price;
        $product->save();
        $msg="Product update succesfully";
        return response()->json(['success'=>$msg],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $msg="Product Delete succesfully";
        return response()->json(['success'=>$msg],200);


    }//end method
}
