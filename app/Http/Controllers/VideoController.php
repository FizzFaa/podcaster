<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        
        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            'category'=>'required',
            'video_link'=>'required|min:5',
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            'category.required'=>'Please Select Category',
            'video_link.required'=>'Please Enter Embed Link of Video',
            'video_link.min'=>'Please Enter a Valid Embed Link of Video',

        ]);
        $video = new Video();
        $video->title = $request->get('title');
        $video->desc = $request->get('desc');
        $video->video_link = $request->get('video_link');
        $video->cat_id = $request->get('category');
        
        
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($video->image)) {
                File::delete($video->image);
            }
            $path = 'files/upload/admin/videos/';

            $thumb = $request->file('image');
            $image = Str::slug($video->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $video->title . '_' . $image);
                $imagepath =asset($path . $video->title . '_' . $image);
                
            $video->image = $imagepath;
            $video->save();
        }
        Session::flash("success", "video has been created");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $video)
    {
        //
        $cat = Category::latest()->get();
        $blog = Video::find($video['id']);
        return view('admin.video.edit',[
            'video'=>$blog,
            'categories'=>$cat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            'category'=>'required',
            'video_link'=>'required|min:5',
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            'category.required'=>'Please Select Category',
            'video_link.required'=>'Please Enter Embed Link of Video',
            'video_link.min'=>'Please Enter a Valid Embed Link of Video',

        ]);
        
        $video = Video::find($request['id']);
        $video->title = $request->get('title');
        $video->desc = $request->get('desc');
        $video->video_link = $request->get('video_link');
        $video->cat_id = $request->get('category');
        
        
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($video->image)) {
                File::delete($video->image);
            }
            $path = 'files/upload/admin/videos/';

            $thumb = $request->file('image');
            $image = Str::slug($video->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $video->title . '_' . $image);
                $imagepath =asset($path . $video->title . '_' . $image);
                
            $video->image = $imagepath;
            
        }
        $video->save();
        Session::flash("success", "video has been updated");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $video)
    {
        //
        $video = Video::find($video['id']);
        $video->delete();
        Session::flash("error", "Video Post has been Deleted");
        return back();
    }

    // ADMIN SIDE BEHAVIOURS METHODS
    public function getVideos()
    {
         
        $videos = Video::latest()->with('category')->paginate(5);
       
        return view('admin.video.index',[
        'videos' =>$videos
    ]);
    
    }
    public function addVideo()
    {
        $cat = Category::latest()->get();
        return view('admin.video.create',[
        "categories"=>$cat

        ]);
    }
}
