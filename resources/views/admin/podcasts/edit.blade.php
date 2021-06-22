@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.partials_admin.status')
    <div class="row">
        @include('layouts.partials_admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('podcast-edit-post',['id'=>$audio->id]) }}"
                        enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                          <label for="name"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                          <div class="col-md-6">
                              <input id="title" type="text"
                                     class="form-control @error('title') is-invalid @enderror"
                                     name="title" value="{{ $audio->title }}" required autocomplete="off"
                                     autofocus>

                              @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="name"
                                 class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                          <div class="col-md-6">
                              <textarea id="desc" type="text"
                                     class="form-control @error('desc') is-invalid @enderror"
                                     name="desc"  required
                                     autofocus>{{ $audio->desc }}</textarea>

                              @error('desc')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>


                      <div class="form-group row">
                        <label for="audio_link"
                               class="col-md-4 col-form-label text-md-right">{{ __('Audio Link') }}</label>

                        <div class="col-md-6">
                            <input id="audio_link" type="text"
                                   class="form-control @error('audio_link') is-invalid @enderror"
                                   name="audio_link" value="{{ $audio->audio_link }}" required autocomplete="off"
                                   autofocus>

                            @error('audio_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>




{{-- 
                      <div class="form-group row">
                        <label for="category"
                               class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>

                        <div class="col-md-6">
                            <select class="form-control @error('category') is-invalid @enderror role"
                                    name="category" required>

                                <option value=""> Select Category</option>
                                @foreach($categories as $cat)
                                    <option
                                        value="{{ $cat->id }}" @if($audio->cat_id ==$cat->id ) selected @endif> {{ $cat->title }} </option>
                                @endforeach
                            </select>

                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}
                      

                      <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file"
                                     class="form-control @error('image') is-invalid @enderror"
                                     name="image"   autocomplete="off"
                                     autofocus>
                      

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                 

                   
                     

                      

                      {{-- <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio"
                                         {{ ($category->status=="1")? "checked" : "" }} name="status"
                                         id="active" value="1">

                                  <label class="form-check-label" for="active">
                                      {{ __('Active') }}
                                  </label>
                                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                  <input class="form-check-input" type="radio" name="status" id="inactive"
                                         value="0" {{ ($category->status=="0")? "checked" : "" }} >

                                  <label class="form-check-label" for="inactive">
                                      {{ __('Inactive') }}
                                  </label>
                              </div>
                          </div>
                      </div> --}}
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Update') }}
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection