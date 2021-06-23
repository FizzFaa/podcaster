@extends('layouts.default')
@section( 'content')
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{ $post->title }}
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">{{ $post->created_at }}</li>
                <li class="cat">
                    In 
                    <a href="#0">{{ $post->category->title??'No Category' }}</a>
                    
                </li>
            </ul>
        </div> <!-- end s-content__header -->
        @if (isset($post->video_link))
        <div class="s-content__media col-full">
            <div class="video-container">
              
                
                <iframe width="560" height="315" src="{{ $post->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
        </div> <!-- end s-content__media -->
        
        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="{{ $post->image }}" 
                    
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
            </div>
        </div> <!-- end s-content__media -->
          @elseif (isset($post->audio_link))
          <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="{{ $post->image }}" 
                   
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="" >

                <div class="audio-wrap">
                    <audio id="player2" src="{{ $post->audio_link }}" width="100%" height="42" controls="controls"></audio>
                </div>
            </div>
        </div> <!-- end s-content__media -->
        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="{{ $post->image }}" 
                    
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
            </div>
        </div> <!-- end s-content__media -->
          @else  
             <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="{{ $post->image }}" 
                    
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
            </div>
        </div> <!-- end s-content__media -->
        @endif

     

        <div class="col-full s-content__main">

            <p class="lead">{!! $post->desc !!}.</p>
    
{{-- 
            <div class="s-content__author">
                <img src="images/avatars/user-03.jpg" alt="">

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="#0">Jonathan Doe</a>
                    </h4>
                
                    <p>Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>

                    <ul class="s-content__author-social">
                       <li><a href="#0">Facebook</a></li>
                       <li><a href="#0">Twitter</a></li>
                       <li><a href="#0">GooglePlus</a></li>
                       <li><a href="#0">Instagram</a></li>
                    </ul>
                </div>
            </div> --}}
            @if (isset($post->video_link))
            @include('layouts.partials_user.bottom_nav_video')
            @elseif(isset($post->audio_link))
            @include('layouts.partials_user.bottom_nav_audio')  
            @else
 @include('layouts.partials_user.bottom_nav_blog')
            @endif
           
            <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>
    
 


    @include('layouts.partials_user.popularposts')
    

</section> 
@endsection