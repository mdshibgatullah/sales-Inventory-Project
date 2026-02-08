<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

// old 
    public function category(){
        return view('pages.dashboard.category');
    }

// new 
    // List categories
    public function CategoryList(Request $request)
    {
        $user_id = (int) $request->header('user_id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $categories = Category::where('user_id', $user_id)->get();

        return response()->json([
            'status' => 'Success',
            'user_id' => $user_id,
            'categories' => $categories
        ], 200);
    }

    // Create category
    public function createCategory(Request $request)
    {
        $user_id = (int) $request->header('user_id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
            'user_id' => $user_id
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Category created successfully',
            'category' => $category
        ], 201);
    }


    // category by id
     public function categoryId(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $category_id = $request->input('id');

        return Category::where('id', $category_id)->where('user_id', $user_id)->first();
    }

    // Update category
    public function updateCategory(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $cat_id = $request->input('id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $category = Category::where('id', $cat_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$category) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Category not found'
            ], 404);
        }

        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'category' => $category
        ], 200);
    }

    // Delete category
    public function deleteCategory(Request $request)
    {
        $user_id = (int) $request->header('user_id');
        $cat_id = $request->input('id');

        if (!$user_id) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User not authenticated'
            ], 401);
        }

        $category = Category::where('id', $cat_id)
            ->where('user_id', $user_id)
            ->first();

        if (!$category) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ], 200);
    }   


}
