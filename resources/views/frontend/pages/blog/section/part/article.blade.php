



<article class="post-single">
  <div class="post-info">
    <h2><a href="#">{{$single_blog->title}}</a></h2>
    <h6 class="upper"><span>By</span><a href="#"> {{$single_blog->author->name}} </a><span class="dot"></span><span>{{date('F d,Y', strtotime($single_blog->create_at))}}</span><span class="dot"></span>
      @foreach ($single_blog->tagpost as $tag) 
      <a href="{{route('blog.single.page.index', $single_blog->slug)}}" class="post-tag">{{$single_blog->name}} @if ($loop->index+1 < count($single_blog->tagpost))
          -
      @endif</a>

    @endforeach

  </h6>
  </div>
  
  @php
      $media_type= json_decode($single_blog->featured_image);
      
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
    <p>{!! Str::of(htmlspecialchars_decode($single_blog->content)) !!}</p>
  
    </p>
  </div>
</article>