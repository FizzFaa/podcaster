<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

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

        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            'category'=>'required'
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            'category.required'=>'Please Select Category',

        ]);
        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->desc = $request->get('desc');
        $blog->cat_id = $request->get('category');
        
        
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($blog->image)) {
                File::delete($blog->image);
            }
            $path = 'files/upload/admin/blogs/';

            $thumb = $request->file('image');
            $image = Str::slug($blog->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $blog->title . '_' . $image);
                $imagepath =asset($path . $blog->title . '_' . $image);
                
            $blog->image = $imagepath;
            $blog->save();
        }
        Session::flash("success", "Blog has been created");
        return back();
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
    public function edit(Request $blog)
    {
        //
        $cat = Category::latest()->get();
        $blog = Blog::find($blog['id']);
        return view('admin.blog.edit',[
            'blog'=>$blog,
            'categories'=>$cat
        ]);
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
        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            'category'=>'required'
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            'category.required'=>'Please Select Category',

        ]);
        $blog = Blog::find($request['id']);
        $blog->title = $request->get('title');
        $blog->desc = $request->get('desc');
        $blog->cat_id = $request->get('category');
           
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($blog->image)) {
                File::delete($blog->image);
            }
            $path = 'files/upload/admin/blogs/';

            $thumb = $request->file('image');
            $image = Str::slug($blog->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $blog->title . '_' . $image);
                $imagepath =asset($path . $blog->title . '_' . $image);
                
            $blog->image = $imagepath;
            
        }
        $blog->save();
        Session::flash("success", "Blog has been Updated");
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $blog)
    {
        //
        $blog = Blog::find($blog['id']);
        $blog->delete();
        Session::flash("error", "Blog has been Deleted");
        return back();
    }
    // ADMIN SIDE BEHAVIOURS METHODS
    public function getBlogs()
    {
        $blogs = Blog::latest()->with('category')->paginate(5);
        return view('admin.blog.index',
    [
        'posts' =>$blogs
    ]);
    }


    public function addBlog()
    {
        $cat = Category::latest()->get();
        return view('admin.blog.create',
    [
        "categories"=>$cat
    ]);
    }
    public function popularPosts( $id)
    {

        $blog = Blog::with('category')->find($id);


return view('User.post',[
    'post'=>$blog,
    
]);
    }
    public function about()
    {
        return view('User.about');
    }   public function contact()
    {
    return view('User.contact');
    }
}
