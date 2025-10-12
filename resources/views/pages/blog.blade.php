@extends('layouts.default')


@section('meta')
    <title>WinMax Bali</title>
    <meta content="Duaraka mep cunstructions service" name="description">
    <meta content="Industrial MEP services, Best MEP contractors for hotels, HVAC installation and maintenance" name="keywords">
    <meta property="og:title" content="Dua Raka">
    <meta property="og:description" content="WinMax Bali">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')

<!-- Latest Blog Posts-->
<section class="section section-lg bg-gray-100 text-center">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInDown">Blog</span></h3>
    <div class="row row-50">

      @foreach($blogs as $blog)
        <div class="col-sm-4 col-lg-3 wow-outer">
          <article class="post-classic wow slideInLeft" @if($loop->index > 0) data-wow-delay="{{ sprintf('%.2fs', $loop->index * 0.05) }}" @endif>
            <a class="post-classic-media" href="{{ url('/blog-detail', $blog->slug ?? $blog->id) }}">
              @php
                $firstImage = collect(explode(',', $blog->image ?? ''))
                  ->map('trim')
                  ->filter()
                  ->first() ?: 'assets/images/sidebar-blog-1-370x264.jpg';
              @endphp
              <img src="{{ asset('storage/blog/'.$firstImage) }}" alt="{{ $blog->title ?? 'Blog image' }}" width="370" height="264"/>
            </a>
            <ul class="post-classic-meta">
              <li><a class="button-winona {{ $blog->category_class ?? '' }}" href="#">{{ $blog->category->name ?? ($blog->category ?? 'News') }}</a></li>
              <li>
                <time datetime="{{ optional($blog->created_at)->format('Y') ?? '2019' }}">{{ optional($blog->created_at)->format('M d, Y \a\t h:i a') ?? 'Apr 21, 2019 at 12:05 pm' }}</time>
              </li>
            </ul>
            <h4 class="post-classic-title"><a href="{{ url('/blog-detail', $blog->slug ?? $blog->id) }}">{{ $blog->title ?? 'Untitled' }}</a></h4>
          </article>
        </div>
      @endforeach

      <!-- <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-1-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona" href="#">News</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="/blog-detail/blog-yg-bagus">Top 10 Essential Photography Tips for Beginners</a></h4>
        </article>
      </div>
      <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft" data-wow-delay=".05s"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-2-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona text-red" href="#">Innovations</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="/blog-detail/blog-yg-bagu">Benefits of Using Drones in Aerial Photography</a></h4>
        </article>
      </div>
      <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft" data-wow-delay=".1s"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-3-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona text-green" href="#">Tips</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="#">5 Ways to Get Great Photos Outside of the Studio</a></h4>
        </article>
      </div>
      <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-1-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona" href="#">News</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="#">Top 10 Essential Photography Tips for Beginners</a></h4>
        </article>
      </div>
      <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft" data-wow-delay=".05s"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-2-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona text-red" href="#">Innovations</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="#">Benefits of Using Drones in Aerial Photography</a></h4>
        </article>
      </div>
      <div class="col-sm-4 col-lg-3 wow-outer">
        <article class="post-classic wow slideInLeft" data-wow-delay=".1s"><a class="post-classic-media" href="#"><img src="{{asset('assets/images/sidebar-blog-3-370x264.jpg')}}" alt="" width="370" height="264"/></a>
          <ul class="post-classic-meta">
            <li><a class="button-winona text-green" href="#">Tips</a></li>
            <li>
              <time datetime="2019">Apr 21, 2019 at 12:05 pm</time>
            </li>
          </ul>
          <h4 class="post-classic-title"><a href="#">5 Ways to Get Great Photos Outside of the Studio</a></h4>
        </article>
      </div> -->
    </div>
  </div>
</section>


@stop