<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PodcastController extends Controller
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
        dd($request->all());
        
        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            
            'audio_link'=>'required|min:5',
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            
            'audio_link.required'=>'Please Enter Embed Link of Audio',
            'audio_link.min'=>'Please Enter a Valid Embed Link of Audio',

        ]);
        $audio = new Podcast();
        $audio->title = $request->get('title');
        $audio->desc = $request->get('desc');
        $audio->audio_link = $request->get('audio_link');
        
        
        
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($audio->image)) {
                File::delete($audio->image);
            }
            $path = 'files/upload/admin/audios/';

            $thumb = $request->file('image');
            $image = Str::slug($audio->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $audio->title . '_' . $image);
                $imagepath =asset($path . $audio->title . '_' . $image);
                
            $audio->image = $imagepath;
            $audio->save();
        }
        Session::flash("success", "Audio Post has been created");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $podcast)
    {
        //
        $blog = Podcast::find($podcast['id']);
        return view('admin.podcasts.edit',[
            'audio'=>$blog,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Podcast $podcast)
    {
        //
        //title desc category image
        $this->validate($request,[
            'title'=>'required| min:5',
            'desc'=>'required|min:20',
            'audio_link'=>'required|min:5',
            

        ],[
            'title.required'=>'Title cannot be Empty',
            'title.min'=>'Title must have 5 characters',
            'desc.required'=>'Description cannot be Empty',
            'desc.min'=>'Description must  have 20 characters',
            
            'audio_link.required'=>'Please Enter Embed Link of Audio',
            'audio_link.min'=>'Please Enter a Valid Embed Link of Audio',

        ]);
        
        $audio = Podcast::find($request['id']);
        $audio->title = $request->get('title');
        $audio->desc = $request->get('desc');
        $audio->audio_link = $request->get('audio_link');
        
        
        
        if ($request->file('image')) {
            $this->validate($request, [
                "image" => "mimes:png,jpg,jpeg"
            ], [
                "image.mimes" => "Please upload png or jpg format"
            ]);
            if (File::exists($audio->image)) {
                File::delete($audio->image);
            }
            $path = 'files/upload/admin/audios/';

            $thumb = $request->file('image');
            $image = Str::slug($audio->title) . rand(12345678, 98765432) . '.' . $thumb->getClientOriginalExtension();
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            Image::make($thumb)->resize(300, 300)->save($path . $audio->title . '_' . $image);
                $imagepath =asset($path . $audio->title . '_' . $image);
                
            $audio->image = $imagepath;
            
        }
        $audio->save();
        Session::flash("success", "Audio Post has been updated");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $podcast)
    {
        //
        $podcast = Podcast::find($podcast['id']);
        $podcast->delete();
        Session::flash("error", "Podcast Post has been Deleted");
        return back();
    }
     // ADMIN SIDE BEHAVIOURS METHODS
     public function getPodcasts()
     {
          
         $audios = Podcast::latest()->paginate(5);
        
         return view('admin.podcasts.index',[
         'audios' =>$audios
     ]);
     
     }
     public function addPodcast()
     {
         
         return view('admin.podcasts.create');
     }
}
