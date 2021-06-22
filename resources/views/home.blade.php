@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.partials_admin.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome: {{ Auth::user()->first_name }}
                        <br> {{ __('You are logged in!') }}
                    {{-- <form action="{{ url('cke') }}" method="post" enctype="multipart/form-data">
                     <textarea name="description" id="summary-ckeditor" cols="30" rows="10"></textarea>
                     <input class="btn btn-primary" type="submit" value="done">
                    </form>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
