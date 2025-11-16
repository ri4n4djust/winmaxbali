@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Sitemap</title>
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


  @php
    libxml_use_internal_errors(true);
    $xml = null;
    try {
      $xml = simplexml_load_string($sitemap);
    } catch (\Throwable $e) {
      $xml = null;
    }
    $urls = [];
    $sitemaps = [];
    if ($xml) {
      if (isset($xml->url)) {
        foreach ($xml->url as $u) {
          $urls[] = [
            'loc' => (string) $u->loc,
            'lastmod' => (string) $u->lastmod,
            'changefreq' => (string) $u->changefreq,
            'priority' => (string) $u->priority,
          ];
        }
      } elseif (isset($xml->sitemap)) {
        foreach ($xml->sitemap as $s) {
          $sitemaps[] = [
            'loc' => (string) $s->loc,
            'lastmod' => (string) $s->lastmod,
          ];
        }
      }
    }
  @endphp

  <section class="section section-sm">
    <div class="container">
    <div class="row mb-4">
      <div class="col-12 text-center">
      <h4 class="section-title"><span>📍 Sitemap Preview</span></h4>
      <p class="text-muted">A friendly, visual representation of the sitemap contents.</p>
      </div>
    </div>

    @if(!$xml)
      <div class="row">
      <div class="col-12">
        <div class="alert alert-warning">Unable to parse sitemap. Showing raw output above.</div>
      </div>
      </div>
    @else
      @if(count($urls))
      <div class="row g-3">
        @foreach($urls as $item)
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
          <div class="card-body d-flex flex-column">
            <a href="{{ $item['loc'] }}" target="_blank" rel="noopener" class="text-decoration-none mb-2">
            <h6 class="mb-1 text-truncate" style="max-width:100%;">{{ $item['loc'] }}</h6>
            </a>
            <p class="mb-2 text-muted small">
            <strong>Last modified:</strong>
            {{ $item['lastmod'] ?: '—' }}
            </p>
            <div class="mt-auto d-flex justify-content-between align-items-center">
            <span class="badge bg-outline-secondary">{{ $item['changefreq'] ?: '—' }}</span>
            </div>
          </div>
          </div>
        </div>
        @endforeach
      </div>
      @elseif(count($sitemaps))
      <div class="row g-3">
        @foreach($sitemaps as $sm)
        <div class="col-12 col-md-6">
          <div class="card shadow-sm">
          <div class="card-body">
            <a href="{{ $sm['loc'] }}" target="_blank" rel="noopener" class="text-decoration-none">
            <h6 class="mb-1 text-truncate">{{ $sm['loc'] }}</h6>
            </a>
            <p class="mb-0 text-muted small">Last modified: {{ $sm['lastmod'] ?: '—' }}</p>
          </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="row">
        <div class="col-12">
        <div class="alert alert-info">Sitemap parsed but contains no URL entries.</div>
        </div>
      </div>
      @endif
    @endif
    </div>
  </section>

@stop