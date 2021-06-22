<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if(isset($request['id']))
        {
        $blogs = Blog::where('cat_id','=',$request['id'])->paginate(5);
        }
        else {
              $blogs = Blog::latest()->paginate(5);
        }
      
        return view('User.index',
        [
            'posts'=>$blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
        
        if($request->get('nextprev') == 0)
        {
 $blog = Blog::with('category')->find($request->get('id'));
        }
        else if($request->get('nextprev') == 1)
        {
            $blog = Blog::with('category')->where('id','<',$request->get('id'))->first();
            if($blog == null)
            {
                $blog = Blog::with('category')->find($request->get('id'));

            }

        }
        else {
            $blog = Blog::with('category')->where('id','>',$request->get('id'))->first();
            if($blog == null)
            {
                $blog = Blog::with('category')->find($request->get('id'));

            }
        }
       
        return view('User.post',[
            'post'=>$blog,
            
        ]);

    }
    public function next(Request $request)
    {
        $blog = Blog::with('category')->where('id','>',$request['id'])->first();
        if($blog=='')
        {
        $blog='Last';    
        $blog = array('title' =>$blog);
        }
        return $blog;

    }
    public function prev(Request $request)
    {
        
        $blog = Blog::with('category')->where('id','<',$request['id'])->first();
        if($blog=='')
        {
        $blog='First';    
        $blog = array('title' =>$blog);
        }
        return $blog;

    }

public function  getPopularPosts()
{
    return $blogs = Blog::latest()->get();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
