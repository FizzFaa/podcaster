<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
               
        return view('category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            "title" => "required|min:5",
            "desc" => "required|min:10",
            "status" => "required",
            
        
        ], [
            "title.required" => "Please enter Title name ",
            "title.min" => "Please enter Title name more than 5 characters",
            "desc.required" => "Please enter Description words more than 20",
            "desc.min" => "Please enter Description words more than 10",
           
            "status.required" => 'Please Set Status',
        ]);
        $category = new Category();
        $category->title = $request->get('title');
        $category->description = $request->get('desc');
        $category->status =$request->get('status');
        $category->save();
        Session::flash("success", "Category Added Successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        //
        $cat = Category::find($category);
        return view('category.edit',[
            "category"=>$cat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $category)
    {
        //
        
        $this->validate($request, [
            "title" => "required",
            "desc" => "required|min:10",
            "status" => "required",
            
        
        ], [
            "title.required" => "Please enter Title name",
            "desc.required" => "Please enter Description words more than 20",
            "desc.min" => "Please enter Description words more than 10",
           
            "status.required" => 'Please Set Status',
        ]);
        $cat = Category::find($category);
        $cat->title = $request->get('title');
        $cat->description = $request->get('desc');
        $cat->status =$request->get('status');
        
        $cat->save();
        Session::flash("success", "Category Update Successfully");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $cat = Category::find($id);
        $cat->status = 0;
        $cat->save();
        Session::flash("success", "Category has been deleted!");
        return back();
    }
    
}
