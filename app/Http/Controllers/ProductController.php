<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Controllers\CategoryController;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
     $data = Product::all();
    // $category = Category::all();
 
    /*  $products = DB::table('products')
            ->join('product_translations', 'products.id', '=', 'product_translations.product_id')
            ->join('category_translations', 'products.category_id', '=', 'category_translations.category_id')
            ->select('products.*', 'product_translations.*', 'category_translations.category_name')
            ->get();*/
     return view('product.show_product',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
       // return $categories;

        return view('product.add_product',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
            //save image in folder
            $file_name=$request->image->getClientOriginalName();
            $path=$request ->image ->storeAs('product_image',$file_name,'uploads_image');
              //return $path;
             //return $this->UploadeImage($request->image,'user_images');
            /////////////////////////////////
            $input = $request->all();
            $input['image']=$path;
           // return $input;
            $product = Product::create($input);
           // return $product;
            return redirect()->route('product.index')
            ->with('success','product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $categories = Category::all();

        $product=Product::find($id);
        return view('product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
