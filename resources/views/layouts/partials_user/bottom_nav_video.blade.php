<div class="s-content__pagenav">
    <div class="s-content__nav">
        <div class="s-content__prev">
            <a id="titleprev" href="{{ route('posts.details.videos',['id'=>$post->id,'nextprev'=>1]) }}" rel="prev">
                <span>Previous Post</span>
               {{-- {{ $previouspost->title }} --}}
               
                
            </a>
        </div>
        <div class="s-content__next" >
            <a id="titlenext" href="{{ route('posts.details.videos',['id'=>$post->id,'nextprev'=>2]) }}" rel="next">
                <span >Next Post</span>
                
                {{-- {{ $nextpost->title }} --}}
            </a>
        </div>
    </div>
</div>