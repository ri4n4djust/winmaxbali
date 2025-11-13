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
    <div class="row row-30">
      <div class="col-12">
        <style>
          .search-card {
            max-width: 920px;
            margin: 0 auto 30px;
            background: #fff;
            padding: 14px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(16,24,40,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
          }
          .search-form .search-inner {
            width: 100%;
            display: flex;
            gap: 10px;
            align-items: center;
          }
          .search-form input[type="text"] {
            flex: 1;
            padding: 12px 14px;
            font-size: 15px;
            border: 1px solid #e6e9ef;
            border-radius: 10px;
            outline: none;
            transition: box-shadow .18s ease, border-color .18s ease;
          }
          .search-form input[type="text"]:focus {
            border-color: #4f46e5;
            box-shadow: 0 6px 18px rgba(79,70,229,0.12);
          }
          .search-form button[type="submit"] {
            background: linear-gradient(90deg,#4f46e5,#06b6d4);
            color: #fff;
            border: none;
            padding: 11px 18px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 18px rgba(79,70,229,0.12);
            transition: transform .12s ease, opacity .12s ease;
          }
          .search-form button[type="submit"]:active { transform: translateY(1px); }
          .search-form .reset-btn {
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid transparent;
            background: transparent;
          }
          .search-form .reset-btn:hover {
            color: #111827;
            text-decoration: underline;
          }
          @media (max-width: 576px) {
            .search-card { padding: 10px; }
            .search-form button[type="submit"] { padding: 10px 12px; }
            .search-form .reset-btn { padding: 6px 8px; }
          }
          .sr-only {
            position: absolute !important;
            width: 1px; height: 1px;
            padding: 0; margin: -1px;
            overflow: hidden; clip: rect(0,0,0,0);
            white-space: nowrap; border: 0;
          }
        </style>

        <div class="search-card">
          <form action="{{ route('blog', 'cari') }}" method="GET" class="search-form" role="search" aria-label="Cari blog">
            <label class="sr-only" for="blog-search">Cari sesuatu</label>
            <div class="search-inner">
              <input id="blog-search" type="text" name="query" placeholder="Cari artikel, topik, atau kata kunci..." value="{{ request('query') }}" autocomplete="off" required />
              <button type="submit" aria-label="Cari">🔍 Cari</button>
              <a href="{{ route('blog', 'all') }}" class="reset-btn" aria-label="Reset pencarian">⟲ Reset</a>
            </div>
          </form>
        </div>
      </div>
      

      
    </div>
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