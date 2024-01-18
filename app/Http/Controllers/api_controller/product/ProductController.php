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
        $products = Product::paginate(5);
        //$product_images = Product_Image::all();

        return response()->json([

            'message'=>'Product list',
            'data'=>$products,
            //'dataImage'=>$product_images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
                'user_id' => $request->user()->id,
            ]);




            // $image = $request->file('image');
            // $make_name = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            // Image::make($request->file('image'))->resize(800,800)->save('upload/product/'.$make_name);
            // $save_url = 'upload/product/'.$make_name;



                $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('upload/product/'), $name_gen);
                $save_url = 'upload/product/' . $name_gen;


                 Product_Image::create([
                    'product_id' => $product->id,
                    'image' => $save_url,
                ]);
            // }



            //return $productImage;

            DB::commit();

            $msg = "Product and images added successfully";
            return response()->json(['success' => $msg], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            $msg = "Error adding product and images: " . $e->getMessage();
            return response()->json(['error' => $msg], 500);
        }


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
