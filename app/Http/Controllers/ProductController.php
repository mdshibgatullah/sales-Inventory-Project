<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function product(){
        return view('pages.dashboard.product');
    }


    public function CreateProduct(Request $request)
    {
        $user_id = (int) $request->header('user_id');


        // prepare and store file
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $user_id."_".time()."_".$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
        }

        return Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
            'img_url' => $filePath,
            'category_id' => $request->input('category_id'),
            'user_id' => $user_id,
        ]);
    }



    // List product
    public function productList(Request $request)
    {
        $user_id = (int) $request->header('user_id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }


        $products = Product::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 'Success',
            'user_id' => $user_id,
            'products' => $products
        ], 200);
    }


    // product by id
     public function productId(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $product_id = $request->input('id');

        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }


 // Update product
public function updateProduct(Request $request)
{
    $user_id = (int) $request->header('user_id');
    $pro_id = $request->input('id');

    if (!$user_id) {
        return response()->json([
            'status' => 'Failed',
            'message' => 'User not authenticated'
        ], 401);
    }

    $product = Product::where('id', $pro_id)
        ->where('user_id', $user_id)
        ->first();

    if (!$product) {
        return response()->json([
            'status' => 'Failed',
            'message' => 'Product not found'
        ], 404);
    }

    // image upload
    if ($request->hasFile('image')) {

        // delete old image
        if ($product->img_url && Storage::disk('public')->exists($product->img_url)) {
            Storage::disk('public')->delete($product->img_url);
        }

        $file = $request->file('image');
        $filename = $user_id."_".time()."_".$file->getClientOriginalName();
        $product->img_url = $file->storeAs('uploads', $filename, 'public');
    }

    $product->update([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'unit' => $request->input('unit'),
        'category_id' => $request->input('category_id'),
    ]);

    return response()->json([
        'status' => 'Success',
        'message' => 'Product updated successfully',
        'product' => $product
    ], 200);
}


    
    // Delete product
    public function deleteProduct(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $pro_id = $request->input('id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        // delete image
        if($request->input('image_path') && Storage::disk('public')->exists($request->input('image_path'))){
            Storage::disk('public')->delete($request->input('image_path'));
        }

        // delet database
        $product = Product::where('id', $pro_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$product) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Category not found'
            ], 404);
        }

        

        $product->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Category deleted successfully'
        ], 200);
    }   
}
