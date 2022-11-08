@extends('frontend.layout.app')

@section('frontend-content')

  <section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="{{ url('comet/images/bg/18.jpg') }}" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
              <h4>We have a few tips for you.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>

  @php
      if (isset($_GET['src'])) {
        $key= $_GET['src'];
        $post_data= App\Models\Post::where('title', 'Like', '%'.$key.'%')->get();
      }
  @endphp

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">

            @foreach ($post_data as $post)

            <article class="post-single">
                <div class="post-info">
                  <h2><a href="{{ route('blog.single.page.index', $post->slug) }}">{{$post->title}}</a></h2>
                  <h6 class="upper"><span>By</span><a href="#"> {{$post->author->name}} </a><span class="dot"></span><span>{{date('F d,Y', strtotime($post->create_at))}}</span><span class="dot"></span>
                    @foreach ($post->tagpost as $tag) 
                    <a href="{{route('blog.single.page.index', $post->slug)}}" class="post-tag">{{$tag->name}} @if ($loop->index+1 < count($post->tagpost))
                        -
                    @endif</a>

                  @endforeach

                </h6>
                </div>
                
                @php
                    $media_type= json_decode($post->featured_image);
                    
                @endphp
                @if ($media_type->project_type=="Gallery")
                <div class="post-media">
                  <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                    <ul class="slides">
                     @foreach (json_decode($media_type->gallery) as $gall)
                     <li>
                      <img style="height: 550px; width:700px" src="{{url('storage/post/gallery/' . $gall)}}" alt="">
                    </li>

                     @endforeach
                      
                      
                      
                  </div>
                </div>
                @endif

                @if ($media_type->project_type=='Video')
                <div class="post-media">
                  <div class="media-video">
                    <iframe src="{{ $media_type->video }}" frameborder="0"></iframe>
                  </div>
                </div>
                @endif

                @if ($media_type->project_type=='Audio')
                <div class="post-media">
                  <div class="media-audio">
                    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51057943&amp;amp;color=ff5500&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false"
                    frameborder="0"></iframe>
                  </div>
                </div>
                @endif

                @if ($media_type->project_type=='Quote')
                <div class="post-media">
                  <a href="#">
                    <img src="{{url('storage/post/featured/' . $media_type->photo)}}" alt="">
                  </a>
                </div>
                @endif

                @if ($media_type->project_type=='Standert')
                <div class="post-media">
                  <a href="#">
                    <img style="height: 550px; width:600px" src="{{url('storage/post/featured/' . $media_type->photo)}}" alt="">
                  </a>
                </div>
                @endif

              
                

                <div class="post-body">
                  <p>{!! Str::of(htmlspecialchars_decode($post->content))->words(30) !!}</p>
                  <p><a href="{{ route('blog.single.page.index', $post->slug) }}" class="btn btn-color btn-sm">Read More</a>
                  </p>
                </div>
            </article>
            @endforeach


          </div>
          <ul class="pagination">
            <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
            </li>
            <li class="active"><a href="#">1</a>
            </li>
            <li><a href="#">2</a>
            </li>
            <li><a href="#">3</a>
            </li>
            <li><a href="#">4</a>
            </li>
            <li><a href="#">5</a>
            </li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
            </li>
          </ul>
          <!-- end of pagination-->
        </div>
        
        {{-- blog sidebar template  --}}

        @include('frontend.pages.blog.section.blog-sidebar')



      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>






@endsection