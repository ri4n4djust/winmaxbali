@extends('layouts.default')


@section('meta')
    <title>WinMax Bali - Latest Blog Post</title>
    <meta content="WinMax Bali: Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali" name="description">
    <meta content="Butuh teknisi komputer, jaringan, atau CCTV? Kami hadir dengan layanan service IT lengkap untuk rumah dan bisnis, langsung ke lokasi Anda" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="WinMax Bali : Solusi IT.">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')

<!-- Latest Blog Posts-->
<section class="section section-lg bg-gray-100 text-center">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInDown">Latest Blog Post</span></h3>
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
              <li><a class="button-winona {{ $blog->category_class ?? '' }}" href="#">
              @php
                $typeName = null;
                if (isset($blogtypes)) {
                  if (is_object($blogtypes) && method_exists($blogtypes, 'firstWhere')) {
                    $found = $blogtypes->firstWhere('id', $blog->type);
                    $typeName = data_get($found, 'name', $found);
                  } elseif (is_array($blogtypes) && array_key_exists($blog->type, $blogtypes)) {
                    $typeName = $blogtypes[$blog->type];
                  } else {
                    $typeName = data_get($blogtypes, $blog->type);
                  }
                }
                $typeName = $typeName ?? ($blog->type_name ?? $blog->type ?? 'News');
              @endphp
              {{ $typeName }}
              </a></li>
              <li>
              <time datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y, H:i') ?? '2019' }}">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y, H:i') ?? 'Apr 21, 2019 at 12:05 pm' }}</time>
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