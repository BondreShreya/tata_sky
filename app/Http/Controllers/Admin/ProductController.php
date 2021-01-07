<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_img' => 'required|image|max:2048',
            'cost_price' => 'required',
            'selling_price' => 'required',
        ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $image = $request->file('product_img');
        // dd($request->file('photo'));
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productImg'), $image_name);
        }
        $product->product_img =$image_name;
        $product->status = $request->status;
        $product->cost_price = $request->cost_price;
        $product->selling_price = $request->selling_price;
        $product->save();
        return redirect('/admin/product')->with('success', 'Product Added Successfully!');
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
        $product = Product::findorfail($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('product_img');
        if($image != '')
        {
            $request->validate([
                'product_name' => 'required',
                'product_img' => 'required|image|max:2048',
                'product_description' => 'required',
                'cost_price' => 'required',
                'selling_price' => 'required',
                'status' => 'required',
            ]);
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('public/tempcourseimg',$image_name);
        $image->move(public_path('productImg'), $image_name);
        }
        else{
            $request->validate([
                'product_name' => 'required',
                'product_img' => 'image|max:2048',
                'product_description' => 'required',
                'cost_price' => 'required',
                'selling_price' => 'required',
                'status' => 'required',
            ]);
        }
        $input_data = array (
            'product_name' => $request->product_name,
            'product_img' => $image_name,
            'product_description' => $request->product_description,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
        );

        Product::whereId($id)->update($input_data);
        return redirect('/admin/product')->with('success', 'Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);
        if($product->product_img){
            unlink(public_path('productImg/'.$product->product_img));
        }
        $product->delete();
        return redirect('/admin/product')->with('success', 'Product Deleted Successfully!');
    }
}
