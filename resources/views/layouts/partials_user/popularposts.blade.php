 <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts" id="article-parent">
                    
                        
                    
                   
                   
                    {{-- <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/shutterbug-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-18">Dec 18, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/cookies-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/beetle-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-16">Dec 16, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/tulips-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">10 Interesting Facts About Caffeine.</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-14">Dec 14, 2017</time></span>
                        </section>
                    </article>
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="images/thumbs/small/salad-150.jpg" alt="">
                        </a>
                        <h5><a href="#0">Healthy Mediterranean Salad Recipes</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-12">Dec 12, 2017</time></span>
                        </section>
                    </article> --}}
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <h3>About Philosophy</h3>

                <p>
                Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p>

                <ul class="about__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    <a href="#0">Salad</a>
                    <a href="#0">Recipe</a>
                    <a href="#0">Places</a>
                    <a href="#0">Tips</a>
                    <a href="#0">Friends</a>
                    <a href="#0">Travel</a>
                    <a href="#0">Exercise</a>
                    <a href="#0">Reading</a>
                    <a href="#0">Running</a>
                    <a href="#0">Self-Help</a>
                    <a href="#0">Vacation</a>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->
    <script type="text/javascript">
    var html_option='';
    var nexttitle=
        document.addEventListener('DOMContentLoaded', function () {
                 ///code
            
              // Your jquery code
              jQuery.noConflict();
              jQuery(document).ready(function(){
           
          
          jQuery.ajax({
          type : 'get',
          url : '{{URL::to('/user/getprevioustitle')}}',
          data:{'id':@php echo $post->id @endphp},
          
          success:function(data){
              
            
            jQuery('#titleprev').html('<span>Next Post </span> '+data.title)
   
         
          }
          });
          
          });
           jQuery.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            //end code
            ///code
            
              // Your jquery code
              jQuery.noConflict();
              jQuery(document).ready(function(){
           
          
          jQuery.ajax({
          type : 'get',
          url : '{{URL::to('/user/getnexttitle')}}',
          data:{'id':@php echo $post->id @endphp},
          
          success:function(data){
              
              jQuery('#titlenext').html('<span>Next Post </span> '+data.title)
           
   
         
          }
          });
          
          });
           jQuery.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            //end code
          // Your jquery code
           jQuery.noConflict();
          jQuery(document).ready(function(){
       
      
      jQuery.ajax({
      type : 'get',
      url : '{{URL::to('/user/popularposts')}}',
      
      success:function(data){
          
          
        jQuery.map(data, function(val, key) {
          html_option+="  <article class='col-block popular__post' id='art'><a href='#0' class='popular__thumb'><img class='post_image' src='"+val.image+"' alt=''></a><h5><a href='#0' class='post_title'>"+val.title+".</a></h5><section class='popular__meta'><span class='popular__author'><span>By</span> <a href='#0'> John Doe</a></span>                <span class='popular__date'><span>on</span> <time datetime='2017-12-19' class='created_at'>'"+val.created_at+"'</time></span></section></article>"

  
});
jQuery('#article-parent').html(html_option);
     
      }
      });
      
      });
       jQuery.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
      });
      
      
      </script>
      