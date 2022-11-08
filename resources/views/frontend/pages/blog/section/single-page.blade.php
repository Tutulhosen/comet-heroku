@extends('frontend.layout.app')

@section('frontend-content')

<section class="page-title parallax">
  <div data-parallax="scroll" data-image-src="images/bg/15.jpg" class="parallax-bg"></div>
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

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @include('frontend.pages.blog.section.part.article')
        <!-- end of article-->
        @include('frontend.pages.blog.section.part.comment')
        <!-- end of comments-->
        @include('frontend.pages.blog.section.part.respond')
        <!-- end of comment form-->
      </div>
    </div>
  </div>
</section>






@endsection