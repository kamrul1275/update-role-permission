<?php


namespace App\Http\Controllers\api_controller\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Product_Image;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        //$product_images = Product_Image::all();

        return response()->json([

            'message'=>'Product list',
            'data'=>$products,
           
        ]);
    }


// total product count

    public function getTotalProducts() {

       // return "oky";
        $totalProducts = Product::count();
    
        // Now you can use $totalUsers in your code as needed
       // return view('your_view')->with('totalUsers', $totalUsers);
        return response()->json([
    
            'message'=>'All Product',
            'data'=>$totalProducts,
    
        ]);
    }
    
    



  

    public function create()
    {
        //
    }




    public function store(StoreProductRequest $request)
    {

        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $product = Product::create([
                'title' => $request->title,
                'price' => $request->price,
                // 'user_id' => $request->user()->id,
            ]);



            // code oky...
                // $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
                // $request->file('image')->move(public_path('upload/product/'), $name_gen);
                // $save_url = 'upload/product/' . $name_gen;


                //  Product_Image::create([
                //     'product_id' => $product->id,
                //     'image' => $save_url,
                // ]);

          



            DB::commit();

            $msg = "Product and added successfully";
            return response()->json(['success' => $msg], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            $msg = "Error adding product and images: " . $e->getMessage();
            return response()->json(['error' => $msg], 500);
        }


    }



    public function editProduct(Product $product,$id)
    {
        //return "working";
        $product = Product::find($id);

        //return $product;
        return response()->json([
            'message'=>'Product list',
            'data'=>$product,
        ]);
    }




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
