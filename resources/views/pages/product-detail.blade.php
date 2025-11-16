@extends('layouts.default')
@php
    $raw = $productDetail[0]->image ?? '';
    $parts = array_values(array_filter(array_map('trim', explode(',', $raw))));
    $first = $parts[0] ?? null;
    $second = $parts[1] ?? null;
@endphp
@section('meta')
    <title>WinMax Bali - {{ $productDetail[0]->slug }}</title>
    <meta content="{!! $productDetail[0]->meta_description !!}" name="description">
    <meta content="{{ $productDetail[0]->meta_keywords }}" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="{{ $productDetail[0]->name ?? 'WinMax Bali : Solusi IT.' }}">
    <meta property="og:image" content="{{ asset('storage/product/'.$first) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection
@section('content')
    

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <h3>{{ $productDetail[0]->name }}</h3>
            <!-- <p>Learn More </p> -->
            </div>

            <div class="row row-30">
                <div class="col-lg-8" >
                    
                    <div class="position-relative mt-4">

                        
                        <!-- <img src="{{ asset('storage/product/'.$first) }}" class="img-fluid" alt="{{ $productDetail[0]->name ?? 'image' }}"> -->
                        
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                            @php $gmbra = explode(",",$productDetail[0]->image) ; @endphp
                            @php $gmbr = array_slice($gmbra, 0, -1) ; @endphp
                            @foreach($gmbr as $value)
                        
                            <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            <!-- {{ count($gmbr) }} -->

                            @endforeach
                            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                            
                            </ol>
                            <div class="carousel-inner">
                            
                            @foreach($gmbra as $key => $slider)
                            <!-- {{ $key }} -->
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                @php
                                    $img = trim($slider);
                                    $storagePath = 'product/'.$img;
                                @endphp

                                @if($img && \Illuminate\Support\Facades\Storage::disk('product')->exists($slider))
                                    <img src="{{ asset('storage/product/'.$slider) }}" class="d-block w-100" alt="">
                                @else
                                    <img src="{{ asset('storage/product/default.jpg') }}" class="d-block w-100" alt="">
                                @endif
                            </div>
                            @endforeach
                            
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>

                            <!-- Thumbnails -->
                            <div class="carousel-indicators" style="margin-bottom: 10px;width:100px">
                                @foreach($gmbra as $key => $slider)
                                    <button type="button" data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{$loop->first ? 'active' : ''}}" aria-current="true" aria-label="Slide 1" >
                                    <img class="d-block w-100" src="{{ asset('storage/product/'.$slider) }}" class="img-fluid" />
                                    </button>
                                @endforeach   
                            </div>
                            <!-- Thumbnails -->
                            
                            
                        </div>
                        
                        {!! $productDetail[0]->description !!}

                        
                    
                    </div>
                    <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
                </div>

                <div class="col-lg-3 ">
                    <div class="progress-linear-outer wow-outer">
                        <div class="sidebar-section">
                            <h4 class="text-lg font-semibold mb-4">📂 Kategori</h4>
                            <ul class="space-y-2">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('blog', $category->slug) }}" class="text-blue-600 hover:underline">
                                            {{ $category->slug }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>

                    <div class="progress-linear-outer wow-outer">
                        <div class="section-header">
                            <h4>Iklan</h4>
                        </div>
                    </div>
                    <div class="progress-linear-outer wow-outer">
                        <div class="sidebar-section">
                            <h4 class="text-lg font-semibold mb-4">🔥 Popular Posts</h4>
                            @if($popularPosts && count($popularPosts) > 0)
                                <ul class="list-unstyled space-y-3">
                                    @foreach($popularPosts as $post)
                                        <li class="mb-3">
                                            <a href="{{ route('blog.detail', $post->slug) }}" 
                                               class="text-decoration-none">
                                                <div class="small fw-bold text-primary">{{ $post->title }}</div>
                                                <div class="text-muted small">
                                                    <i class="bi bi-eye"></i> {{ number_format($post->views ?? 0) }} views
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No popular posts yet.</p>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
            
            
        

        </div>
    </section><!-- End About Section -->
   

@stop