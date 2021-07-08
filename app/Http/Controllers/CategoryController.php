<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
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
          'category_name' => 'required|unique:categories',
          'category_photo' => 'mimes:jpeg,bmp,png|max:2024',
        ]);
        $return_form_db = Category::create([
          'category_name' => $request->category_name,
          'added_by' => Auth::id(),
          'created_at' => now(),
        ]);
        $upload_category_photo = $request->file('category_photo');
        $new_category_photo_name = $return_form_db->id.'.'.$upload_category_photo->extension();
        $new_category_photo_location = base_path('public/uploads/category/'.$new_category_photo_name);
        Image::make($upload_category_photo)->resize(350,350)->save($new_category_photo_location);
        Category::find($return_form_db->id)->update([
          'category_photo' => $new_category_photo_name,
        ]);
        return back()->with('category_success','Category Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.view',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->all();
        if ($request->hasFile('category_photo')) {
          if ($category->category_photo != 'category_default_photo.jpg') {
            $delete_location = base_path('public/uploads/category/'.$category->category_photo);
            unlink($delete_location);
          }
          $upload_category_photo = $request->file('category_photo');
          $new_category_photo_name = $category->id.'.'.$upload_category_photo->extension();
          $new_category_photo_location = base_path('public/uploads/category/'.$new_category_photo_name);
          Image::make($upload_category_photo)->save($new_category_photo_location);
          $category->category_photo = $new_category_photo_name;
        }
        $category->category_name = $request->category_name;
        $category->save();
        return back()->with('edit_success','Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
