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
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('sitemap.xml') }}">
@endsection

@section('content')

<section class="section section-lg bg-default">
  <div class="container">
    <div class="row row-50">
      <div class="col-12 text-center">
        <h3 class="section-title wow-outer"><span class="wow slideInUp">💻 Running Project</span></h3>
      </div>
      
     
    </div>
  </div>
</section>

   <pre>{{ htmlentities($sitemap) }}</pre>

@stop