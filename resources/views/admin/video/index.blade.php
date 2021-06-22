@extends('layouts.app')
@section('content')
<div class="container">
   @include('layouts.partials_admin.status')
   <div class="row">
    @include('layouts.partials_admin.sidebar')
    <div class="col-md-8">
        
        <div class="card">
            <div class="card-header">
                All Posts 
                <a href="{{ route('video-add') }}" class="btn btn-outline-primary float-right"> <i class="fa fa-plus float-right"></i><span class="float-right">Add</span></a>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg" style="overflow:scroll">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Video Link</th>
                            <th>Category</th>
                            <th colspan="2"> <div class="offset-3">Actions</div> </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($videos as $key => $row )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{   str_replace( "<br />","<br>",$row->desc) }}</td>
                            <td><img src="{{ $row->image }}" alt="" class="img-thumbnail" width=50 height=50></td>
                            <td>{{ $row->video_link }}</td>
                            <td>{{ $row->category->title }}</td>
                            <td><a href="{{ route('video-edit',['id'=>$row->id]) }}" class="btn btn-outline-primary">Edit</a></td>
                            <td><a href="{{ route('video-delete',['id'=>$row->id]) }}" class ="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                            @empty
                          <tr><td colspan="2"><p>Nothing here*</p></td></tr>  
                        @endforelse
                        
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection