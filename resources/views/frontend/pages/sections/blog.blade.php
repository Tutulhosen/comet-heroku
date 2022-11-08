<section>
    <div class="container">
      <div class="title center">
        <h4 class="upper">We have a few tips for you.</h4>
        <h2>The Blog<span class="red-dot"></span></h2>
        <hr>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

            @php
                $blog_data= App\Models\Post::where('status', true)->take(2)->latest()->get();
                
            @endphp

            @foreach ($blog_data as $blog)
            <div class="blog-post">
              <div class="post-body">
                <h3 class="serif"><a href="#">{{ $blog->title }}</a></h3>
                <hr>
                <p class="serif">{!! Str::of(htmlspecialchars_decode($blog->content))->words(20) !!} </p>
                <div class="post-info upper"><a href="#">Read More</a><span class="pull-right black-text">November 16, 2015</span>
                </div>
              </div>
              <!-- end of blog post-->
            </div>
            @endforeach

            
           

          </div>
        </div>
        <!-- end of row-->
        <div class="clearfix"></div>
        <div class="mt-25">
          <p class="text-center"><a href="{{ route('blog.page.index') }}" class="btn btn-color-out">View Full Blog          </a>
          </p>
        </div>
      </div>
      <!-- end of container-->
    </div>
</section>