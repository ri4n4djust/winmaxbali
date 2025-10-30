@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Our Services</title>
    <meta content="WinMax Bali: Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali" name="description">
    <meta content="Butuh teknisi komputer, jaringan, atau CCTV? Kami hadir dengan layanan service IT lengkap untuk rumah dan bisnis, langsung ke lokasi Anda" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')


<section class="section section-lg bg-default">
  <div class="container">
    <div class="row row-50">
      <div class="col-12 text-center">
        <h3 class="section-title wow-outer"><span class="wow slideInUp">💻 Layanan IT Kami</span></h3>
      </div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                      
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">{{ $service->title }}</h3>
                        <a href="https://wa.me/62818688114?text=Halo%20saya%20tertarik%20dengan%20layanan%20Anda" target="_blank" style="display:inline-flex;align-items:center;padding:10px 15px;background-color:#25D366;color:white;border-radius:5px;text-decoration:none;font-family:sans-serif;font-size:16px;">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width:24px;height:24px;margin-right:10px;">
                          Chat via WhatsApp
                        </a>
                        <p class="text-gray-600 text-sm">{!! $service->content !!}</p>
                        <a href="#" class="mt-4 inline-block text-sm text-blue-600 hover:underline">
                            Lihat Detail →
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
      
      <div class="col-12 isotope-wrap">
        <div class="isotope offset-top-2" data-isotope-layout="masonry" data-lightgallery="group" data-lg-thumbnail="false">
          <div class="row row-30">
            @foreach($services as $service)
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="{{ asset('storage/service/'.$service->image) }}" alt="{{ $blog->title ?? 'Blog image' }}" width="370" height="264"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">{{ $service->title }}</a></p>
                    <a class="thumbnail-corporate-link" href="{{ asset('storage/service/'.$service->image) }}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>    
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Reviews & Star Ratings (paste here) -->
<style>
/* Simple, modern review UI */
.reviews-wrap { max-width: 980px; margin: 40px auto; font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; color:#333; }
.reviews-header { display:flex; gap:24px; align-items:center; margin-bottom:20px; }
.reviews-average { display:flex; flex-direction:column; align-items:center; justify-content:center; width:160px; padding:18px; border-radius:8px; background:#fff; box-shadow:0 6px 18px rgba(18,24,39,0.06); }
.reviews-average .big { font-size:40px; font-weight:700; color:#111; line-height:1; }
.reviews-average .sub { color:#666; font-size:13px; margin-top:6px; }
.reviews-list { flex:1; display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:16px; }

.card-review { background:#fff; padding:14px; border-radius:10px; box-shadow:0 6px 18px rgba(18,24,39,0.06); display:flex; gap:12px; align-items:flex-start; }
.avatar { width:48px; height:48px; border-radius:50%; background:linear-gradient(135deg,#6b7cff,#45e6a6); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:16px; }
.review-body { flex:1; }
.review-meta { display:flex; justify-content:space-between; align-items:center; gap:8px; margin-bottom:8px; }
.review-name { font-weight:600; font-size:14px; }
.review-date { color:#888; font-size:12px; }

.star-rating { position:relative; width:120px; height:22px; display:inline-block; vertical-align:middle; }
.star-back, .star-front { display:flex; gap:6px; align-items:center; position:absolute; left:0; top:0; height:100%; }
.star-back svg, .star-front svg { width:20px; height:20px; display:block; }
.star-back svg path { fill:#e4e5e9; }
.star-front { overflow:hidden; white-space:nowrap; pointer-events:none; }
.star-front svg path { fill:#ffc107; }

/* compact legend under average */
.ratings-breakdown { margin-top:10px; font-size:13px; color:#555; display:flex; gap:10px; flex-wrap:wrap; justify-content:center; }
.btn-rate { display:inline-block; margin-left:8px; padding:8px 12px; background:#0066ff; color:#fff; border-radius:8px; text-decoration:none; font-weight:600; }

/* interactive example */
.rate-widget { margin-top:18px; display:flex; gap:12px; align-items:center; }
.rate-widget .hint { color:#666; font-size:14px; }

/* small responsive tweaks */
@media (max-width:640px){ .reviews-header{ flex-direction:column; align-items:stretch } .reviews-average{ width:100%; flex-direction:row; justify-content:space-between; padding:12px } .reviews-list{ grid-template-columns:1fr } }
</style>

<div class="reviews-wrap">
  <!-- <div class="reviews-header">
    <div class="reviews-average">
      <div style="display:flex;flex-direction:column;align-items:center">
        <div class="big" id="avg-score">4.6</div>
        <div style="margin-top:6px;">
          <div class="star-rating" data-rating="4.6">
            <div class="star-back" aria-hidden="true">

            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
            </div>
            <div class="star-front" aria-hidden="true" style="width:0%">

            <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
              <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
            </div>
          </div>
        </div>
      </div>
      <div class="sub">based on <strong id="total-reviews">128</strong> reviews</div>
    </div>

    <div class="reviews-list" style="min-width:360px;">

    <div class="card-review">
        <div class="avatar">JS</div>
        <div class="review-body">
          <div class="review-meta">
            <div>
              <div class="review-name">Jessica Stone</div>
              <div class="review-date">April 12, 2025</div>
            </div>
            <div>
              <div class="star-rating" data-rating="5.0" aria-label="5 out of 5 stars">
                <div class="star-back">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
                <div class="star-front" style="width:100%">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
              </div>
            </div>
          </div>
          <div class="review-text">Excellent service and fast communication. Highly recommended!</div>
        </div>
      </div>

      <div class="card-review">
        <div class="avatar">AL</div>
        <div class="review-body">
          <div class="review-meta">
            <div>
              <div class="review-name">Alex Liu</div>
              <div class="review-date">March 3, 2025</div>
            </div>
            <div>
              <div class="star-rating" data-rating="4.2" aria-label="4.2 out of 5 stars">
                <div class="star-back">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
                <div class="star-front" style="width:0%">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
              </div>
            </div>
          </div>
          <div class="review-text">Great value. A little delay in delivery but overall a good experience.</div>
        </div>
      </div>

      <div class="card-review">
        <div class="avatar">MK</div>
        <div class="review-body">
          <div class="review-meta">
            <div>
              <div class="review-name">Maya K.</div>
              <div class="review-date">Feb 20, 2025</div>
            </div>
            <div>
              <div class="star-rating" data-rating="3.8" aria-label="3.8 out of 5 stars">
                <div class="star-back">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
                <div class="star-front" style="width:0%">
                  <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg><svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
                </div>
              </div>
            </div>
          </div>
          <div class="review-text">Good quality but packaging could be improved.</div>
        </div>
      </div>
    </div>
  </div> -->

  <!-- <div class="ratings-breakdown" aria-hidden="true">
    <div>5★ <strong>78%</strong></div>
    <div>4★ <strong>12%</strong></div>
    <div>3★ <strong>6%</strong></div>
    <div>2★ <strong>2%</strong></div>
    <div>1★ <strong>2%</strong></div>
    <a class="btn-rate" href="#maps">Leave a review</a>
  </div> -->

  <!-- Interactive example: live star input -->
  <!-- <div class="rate-widget" style="margin-top:22px;">
    <div class="hint">Rate this project:</div>
    <div id="interactive" class="star-rating" data-rating="0" aria-label="Rate">
      <div class="star-back" style="cursor:pointer;">
        <svg data-value="1" viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg data-value="2" viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg data-value="3" viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg data-value="4" viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg data-value="5" viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
      </div>
      <div class="star-front" style="width:0%; pointer-events:none;">
        <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 17.3l6.18 3.73-1.64-7.03L21 9.24l-7.19-.62L12 2 10.19 8.62 3 9.24l4.46 4.76L5.82 21z"/></svg>
      </div>
    </div>
    <div id="rate-value" style="font-weight:700;">0</div>
  </div> -->
</div>

<script>
// Utility: initialize star fronts from data-rating attributes
function initStarRatings(root=document){
  const wrappers = root.querySelectorAll('.star-rating');
  wrappers.forEach(w=>{
    const rating = parseFloat(w.getAttribute('data-rating')) || 0;
    const front = w.querySelector('.star-front');
    if(front){
      const pct = Math.max(0, Math.min(5, rating)) / 5 * 100;
      front.style.width = pct + '%';
    }
  });
}

// Interactive rating widget
(function(){
  initStarRatings();
  // set average display as example (could be computed server-side)
  const avgEl = document.getElementById('avg-score');
  const totalEl = document.getElementById('total-reviews');
  if(avgEl && totalEl){
    // example values already present; could update here if needed
  }

  // interactive star input
  const interactive = document.getElementById('interactive');
  if(interactive){
    const back = interactive.querySelector('.star-back');
    const front = interactive.querySelector('.star-front');
    const valueEl = document.getElementById('rate-value');
    let current = 0;

    function setValue(v){
      current = v;
      interactive.setAttribute('data-rating', v);
      front.style.width = (v/5*100) + '%';
      if(valueEl) valueEl.textContent = v.toFixed(1);
    }

    back.addEventListener('mousemove', function(e){
      const rect = back.getBoundingClientRect();
      const x = Math.max(0, Math.min(rect.width, e.clientX - rect.left));
      const pct = x / rect.width;
      const hoverRating = Math.ceil(pct * 5 * 2) / 2; // half-star steps
      front.style.width = (hoverRating/5*100) + '%';
    });

    back.addEventListener('mouseleave', function(){
      front.style.width = (current/5*100) + '%';
    });

    back.addEventListener('click', function(e){
      const rect = back.getBoundingClientRect();
      const x = Math.max(0, Math.min(rect.width, e.clientX - rect.left));
      const pct = x / rect.width;
      const selected = Math.ceil(pct * 5 * 2) / 2;
      setValue(selected);
      // Example: send selected to server via fetch/AJAX
      // fetch('/reviews', {method:'POST', body:JSON.stringify({rating:selected}), headers:{'Content-Type':'application/json'}})
    });
  }
})();
</script>




<!--maps-->
<!-- <section id="maps" class="scrollto clearfix">
  <div class="row-maps clearfix">

  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15779.000096976235!2d115.1756207!3d-8.6199808!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x91058e289e7ebc3!2sWinMax%20Computer!5e0!3m2!1sen!2sid!4v1629275614666!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>
</section> -->
<!--End of maps-->
   

@stop