@extends('layouts.default')

@section('meta')
    <title>WinMax Bali</title>
    <meta content="WinMax Bali: Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali" name="description">
    <meta content="Butuh teknisi komputer, jaringan, atau CCTV? Kami hadir dengan layanan service IT lengkap untuk rumah dan bisnis, langsung ke lokasi Anda" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="WinMax Bali : Solusi IT.">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')
<!-- Advantages and Achievements-->
<section class="section section-lg text-center bg-default">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInUp">Tentang Kami</span></h3>
    <p class="wow-outer"><span class="text-width-1 wow slideInDown">Berdiri sejak Tahun 2014 kami terus berkomitmen untuk mejadi vendor dan partner yang terbaik bagi client kami.</p>
    <p>  Setelah melewati masa ke masa, perubahan terus terjadi didunia teknologi dan sistem informasi, kami WinMaxBali terus berinovasi dan mengiringi kemajuan teknoligi tersebut dengan mengedepankan service kepada client membuat kami bertahan dan berkembang sampai saat ini.</span>
    </p>
    <div class="row row-50">
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-mustache-glasses"></div>
          <div class="counter-minimal-main">
            <div class="counter">365</div>
          </div>
          <h5 class="counter-minimal-title">Proyek selesai</h5>
        </article>
      </div>
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-camera2"></div>
          <div class="counter-minimal-main">
            <div class="counter">4</div>
          </div>
          <h5 class="counter-minimal-title">Proyek berlangsung</h5>
        </article>
      </div>
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-shutter"></div>
          <div class="counter-minimal-main">
            <div class="counter">10</div>
          </div>
          <h5 class="counter-minimal-title">Pengalaman</h5>
        </article>
      </div>
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal -->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-picture"></div>
          <div class="counter-minimal-main">
            <div class="counter">392</div>
          </div>
          <h5 class="counter-minimal-title">Annual Clients</h5>
        </article>
      </div>
    </div>
  </div>
</section>
<section class="section section-lg">
  <div class="container">
    <div class="row row-50 justify-content-lg-between offset-top-1">
      <div class="col-12">
        <h3 class="section-title text-center wow-outer"><span class="wow slideInDown">Frequently Asked Questions</span></h3>
      </div>
      <div class="col-lg-7 col-xl-6">
        <!-- Bootstrap collapse-->
        <div class="card-group-custom card-group-corporate wow-outer" id="accordion1" role="tablist" aria-multiselectable="false">
            
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".1s">
              <div class="card-header" id="accordion1-heading-2" role="tab">
                <div class="card-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-2" aria-controls="accordion1-collapse-2" aria-expanded="false">
                  Apakah WinMaxBali bisa On Call Service PC / laptop ?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse show" id="accordion1-collapse-2" role="tabpanel" aria-labelledby="accordion1-heading-2">
                <div class="card-body">
                  <p>Ya, Bisa. Kami juga melayani service panggilan untuk perbaikin PC, Laptop dan Printer anda dirumah / kantor. </p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".15s">
              <div class="card-header" id="accordion1-heading-3" role="tab">
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-3" aria-controls="accordion1-collapse-3" aria-expanded="false">
                  Ketika saya ada project apakah bersedia untuk datang dan survei dulu sebelum deal?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-3" role="tabpanel" aria-labelledby="accordion1-heading-3">
                <div class="card-body">
                  <p>Siap, Kami datang dengan segala persiapan, sampai perhitungan cost project nya nanti sehingga bisa anda pertimbangkan. Dan yang paling penting proses ini TIDAK KENA BIAYA SAMA SEKALI, untuk area badung, denpasar, gianyar dan Tabanan. </p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".2s">
              <div class="card-header" id="accordion1-heading-4" role="tab">
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-4" aria-controls="accordion1-collapse-4" aria-expanded="false">
                  Brapa lama waktu yang di butuhkan untuk membuat website standar?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-4" role="tabpanel" aria-labelledby="accordion1-heading-4">
                <div class="card-body">
                  <p>2 Minggu, Kami mengerjakan website dalam waktu 2 minggu dengan template standar. Namun jika ingin custome tempalte enggine akan selesai dalam 4 minggu terhitung dari kesepakatan template. </p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".05s">
              <div class="card-header" id="accordion1-heading-1" role="tab">
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-1" aria-controls="accordion1-collapse-1" aria-expanded="true">
                  Bisa buat applikasi untuk IOS dan Android?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-1" role="tabpanel" aria-labelledby="accordion1-heading-1">
                <div class="card-body">
                  <p>Kami mengerjakan web dan mobile app, untuk ios dan Android.</p>
                </div>
              </div>
            </article>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="progress-linear-outer wow-outer">
                    <!-- Linear progress bar-->
                    <article class="progress-linear wow slideInDown" data-wow-delay=".05s">
                      <div class="progress-header">
                        <p>Service Komputer & Laptop </p><span class="progress-value">95</span>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear"></div>
                      </div>
                    </article>
        </div>
        <div class="progress-linear-outer wow-outer">
                    <!-- Linear progress bar-->
                    <article class="progress-linear wow slideInDown" data-wow-delay=".1s">
                      <div class="progress-header">
                        <p>CCTV</p><span class="progress-value">100</span>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear progress-red"></div>
                      </div>
                    </article>
        </div>
        <div class="progress-linear-outer wow-outer">
                    <!-- Linear progress bar-->
                    <article class="progress-linear wow slideInDown" data-wow-delay=".15s">
                      <div class="progress-header">
                        <p>Jaringan, WIFI dan Server</p><span class="progress-value">95</span>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear progress-blue"></div>
                      </div>
                    </article>
        </div>
        <div class="progress-linear-outer wow-outer">
                    <!-- Linear progress bar-->
                    <article class="progress-linear wow slideInDown" data-wow-delay=".2s">
                      <div class="progress-header">
                        <p>PABX dan Telephone</p><span class="progress-value">95</span>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear progress-black"></div>
                      </div>
                    </article>
        </div>
        <div class="progress-linear-outer wow-outer">
                    <!-- Linear progress bar-->
                    <article class="progress-linear wow slideInDown" data-wow-delay=".2s">
                      <div class="progress-header">
                        <p>Bahasa Pemrograman ( PHP, Vue, Javascript)</p><span class="progress-value">95</span>
                      </div>
                      <div class="progress-bar-linear-wrap">
                        <div class="progress-bar-linear progress-green"></div>
                      </div>
                    </article>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section section-xs bg-gray-700 text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10 col-md-12">
        <div class="box-cta-thin">
          <h4 class="wow-outer"><span class="wow slideInRight">Sedang mencari  <span class="text-italic">desain jaringan data server, wifi dan CCTV?</span> </span></h4>
          <div class="wow-outer button-outer"><a class="button button-primary button-winona wow slideInLeft" href="#">Hubungi kami</a></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Projects - Modern Layout-->
<section class="section section-lg bg-default">
  <div class="container">
    <div class="row row-50">
      <div class="col-12 text-center">
        <h3 class="section-title wow-outer"><span class="wow slideInUp">Ongoing Projects</span></h3>
      </div>
      <div class="col-12 isotope-wrap">
        <div class="isotope offset-top-2" data-isotope-layout="masonry" data-lightgallery="group" data-lg-thumbnail="false">
          <div class="row row-30">
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-1-370x256.jpg')}}" alt="" width="370" height="256"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="/project-detail">Project 1</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-1.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-2-370x464.jpg')}}" alt="" width="370" height="464"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Project 2</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-2.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInUp"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-3-370x256.jpg')}}" alt="" width="370" height="256"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Project 3</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-3.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInUp"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-4-370x464.jpg')}}" alt="" width="370" height="464"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Project 4</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-4.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
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

<section class="section section-lg bg-gray-100">
  <div class="container">
    <h3 class="section-title text-center wow-outer"><span class="wow slideInUp">Valued Customers</span></h3>
    <p class="text-center wow-outer"><span class="wow slideInDown">Trusted by businesses and homeowners across Bali — thank you to our clients for their continued support.</span></p>

    <!-- Client logos -->
    <div class="row row-30 justify-content-center align-items-center offset-top-2 wow-outer">
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/awan.webp') }}" alt="Client 1" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/amalfi.webp') }}" alt="Client 2" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/aria.webp') }}" alt="Client 3" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/wkn.webp') }}" alt="Client 4" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/asa bali.webp') }}" alt="Client 5" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
      <div class="col-6 col-sm-4 col-md-2 text-center">
        <figure class="mb-0">
          <img src="{{ asset('storage/client/awandari.webp') }}" alt="Client 6" class="img-fluid" style="max-height:64px; filter:grayscale(60%); transition:filter .3s;">
        </figure>
      </div>
    </div>

    <!-- Testimonials carousel -->
    <div class="row justify-content-center offset-top-3 wow-outer">
      <div class="col-lg-8">
        <div id="valuedCustomersCarousel" class="carousel slide" data-ride="carousel" data-interval="6000" aria-label="Valued customer testimonials">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card border-0 shadow-sm p-4">
                <div class="d-flex align-items-start">
                  <img src="{{ asset('storage/client/awandari.webp') }}" alt="Client 1" class="rounded mr-3" style="width:56px;height:56px;object-fit:cover;">
                  <div class="text-left">
                    <p class="mb-2" style="font-style:italic;">"Layanan cepat dan teknisi sangat berpengalaman. Semua masalah jaringan kantor kami tuntas dalam satu hari."</p>
                    <!-- <div class="small text-muted">- Putu Santosa, Owner @ BaliFoods</div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card border-0 shadow-sm p-4">
                <div class="d-flex align-items-start">
                  <img src="{{ asset('storage/client/asa bali.webp') }}" alt="Client 2" class="rounded mr-3" style="width:56px;height:56px;object-fit:cover;">
                  <div class="text-left">
                    <p class="mb-2" style="font-style:italic;">"Pasang CCTV cepat, rapi kabelnya, dan penjelasan sangat jelas. Sangat direkomendasikan."</p>
                    <!-- <div class="small text-muted">- Nyoman Arya, Manager @ VillaMimpi</div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="card border-0 shadow-sm p-4">
                <div class="d-flex align-items-start">
                  <img src="{{ asset('storage/client/awan.webp') }}" alt="Client 3" class="rounded mr-3" style="width:56px;height:56px;object-fit:cover;">
                  <div class="text-left">
                    <p class="mb-2" style="font-style:italic;">"Buat website company profile kami sangat profesional, komunikasi jelas dan after-sales bagus."</p>
                    <!-- <div class="small text-muted">- Made Putri, Director @ SurfBali Co.</div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a class="carousel-control-prev" href="#valuedCustomersCarousel" role="button" data-slide="prev" aria-label="Previous testimonial">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#valuedCustomersCarousel" role="button" data-slide="next" aria-label="Next testimonial">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </div>

    <style>
      /* small hover polish for logos */
      .section .row img:hover { filter: none !important; transform: translateY(-4px); transition: transform .25s ease; }
      .carousel .card { background: #fff; }
    </style>
  </div>
</section>


<!-- Latest Blog Posts-->
<!-- <section class="section section-lg bg-gray-100 text-center">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInDown">Latest Finish Projects</span></h3>
    <div class="row row-50">
      <div class="col-sm-6 col-lg-4 wow-outer">
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
      <div class="col-sm-6 col-lg-4 wow-outer">
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
      <div class="col-sm-6 col-lg-4 wow-outer">
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
    </div>
  </div>
</section> -->


@stop