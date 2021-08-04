<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::selection()->paginate(10);
        return view('admin.products.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
//        return $request;
        try {
            $filePath="";
            if ($request->has('photo')){
                $filePath = uploadImage('products', $request->photo);
            }
            Product::create([
                'product_name'=>$request->name,
                'product_img'=>$filePath,
                'product_author'=>$request->author,
                'product_type'=>$request->type,
                'product_price'=>$request->price,
                'product_category'=>$request->category,
                'product_pub_date'=>$request->pub_date,
            ]);
            return redirect()->route('admin.products')->with(['success'=>'registred successufly']);


        } catch (\Exception $exception){
            return $exception;
            return redirect()->route('admin.products.create')->with(['error'=>'registred failed! try again']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product){
            return redirect()->route('admin.products')->with(['error'=>'product not found']);
        }
        return view('admin.products.edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product){
                return redirect()->route('admin.products')->with(['error'=>'product not found']);
            }
            DB::beginTransaction();

            Product::where('id', $id)->update([
                'product_name'=>$request->name,
                'product_author'=>$request->author,
                'product_type'=>$request->type,
                'product_price'=>$request->price,
                'product_category'=>$request->category,
                'product_pub_date'=>$request->pub_date,
            ]);

            if ($request->has('photo')){
                $filePath = uploadImage('products', $request->photo);
                Product::where('id', $id)->update([
                    'product_img'=>$filePath
                ]);
            }

            DB::commit();
            return redirect()->route('admin.products')->with(['success'=>'updated successufly']);
        } catch (\Exception $exception){
            DB::rollBack();
            return redirect()->route('admin.products.edit')->with(['error'=>'update failed! try again']);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product){
            return redirect()->route('admin.products')->with(['error'=>'product not found']);
        }
        $image = Str::after($product->product_img, 'assets');
        $image = base_path('public/assets' . $image);
        unlink($image);
        $product->delete();
        return redirect()->route('admin.products')->with(['success'=>'deleted successfuly']);
    }
}
