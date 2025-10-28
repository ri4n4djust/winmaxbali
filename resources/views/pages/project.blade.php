@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Our Project</title>
    <meta content="WinMax Bali: Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali" name="description">
    <meta content="Butuh teknisi komputer, jaringan, atau CCTV? Kami hadir dengan layanan service IT lengkap untuk rumah dan bisnis, langsung ke lokasi Anda" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="WinMax Bali : Solusi IT.">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')

<section class="section section-lg bg-default">
  <div class="container">
    <div class="row row-50">
      <div class="col-12 text-center">
        <h3 class="section-title wow-outer"><span class="wow slideInUp">💻 Running Project</span></h3>
      </div>
      
      <div class="col-12 isotope-wrap">
        <div class="isotope offset-top-2" data-isotope-layout="masonry" data-lightgallery="group" data-lg-thumbnail="false">
          <div class="row row-30">
            
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/penarikan-kabel-jaringan.webp')}}" alt="" width="370" height="256"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="/project-detail">Penarikan kabel jaringan</a></p>
                    <p>Penarikan kabel jaringan untuk penambahan akses point .</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/penarikan-kabel-jaringan.webp')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/pasang-kamera.webp')}}" alt="" width="370" height="464"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Pemasangan kamera cctv</a></p>
                    <p>Pemasangan kamear cctv 16 channel di villa.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/pasang-kamera.webp')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInUp"><img class="thumbnail-corporate-image" src="{{asset('assets/images/perbaikan-pc.webp')}}" alt="" width="370" height="256"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Maintenance PC Office</a></p>
                    <p>Perawatan 6 unit komputer office .</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/perbaikan-pc.webp')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

   

@stop