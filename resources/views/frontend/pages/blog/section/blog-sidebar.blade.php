
@php
    $category_data=App\Models\CategoryPost::where('status', true)->latest()->get();
    $tag_data=App\Models\TagPost::where('status', true)->latest()->get();
@endphp





<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>
        <form >
          <input name="src" type="text" placeholder="Search.." class="form-control">
        </form>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">
          @foreach ($category_data as $cat)
          <li><a href="{{ route('blog.post.category', $cat->slug)  }}">{{ $cat->name }}</a>
          </li>
          @endforeach
          
          
        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">
          @foreach ($tag_data as $tag)
          <a href="{{ route('blog.post.tag', $tag->slug )}}">{{ $tag->name }}</a>
          @endforeach
          
        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">
          
          @foreach ($post_data as $post)
          <li><a href="#">{{ $post->title }}<i class="ti-arrow-right"></i><span>{{ date('d F, Y', strtotime($post->created_at)) }}</span></a>
          </li>
          @endforeach
          
        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>