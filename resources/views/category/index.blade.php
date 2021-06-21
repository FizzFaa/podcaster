@extends('layouts.app')
@section('content')
<div class="container">
   @include('layouts.partials_admin.status')
   <div class="row">
    @include('layouts.partials_admin.sidebar')
    <div class="col-md-8">
        
        <div class="card">
            <div class="card-header">
                Categories List
                <a href="{{ route('category-add') }}" class="btn btn-outline-primary float-right"> <i class="fa fa-plus float-right"></i><span class="float-right">Add</span></a>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th colspan="2"> <div class="offset-3">Actions</div> </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $row )
                        <tr class="{{  $row->status == 0 ? 'disabled-record':''}}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            <td><a href="{{ route('categoy-edit',['id'=>$row->id]) }}" class="btn btn-outline-primary">Edit</a></td>
                            <td><a href="{{ route('category-delete',['id'=>$row->id]) }}" class ="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
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