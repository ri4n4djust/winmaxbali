<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
@include('includes.head')
@yield('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="p:domain_verify" content="7578cb927a0053e2090f6a129b6d3a93"/>
@yield('media')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1004826206">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1004826206');
</script>

</head>


<body>

  

  <!-- <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
      <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
      <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
      <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
      <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
  </div> -->

  <div class="page">
    <!-- ======= Header ======= -->


    @if (Route::is('home'))
      @include('includes.headmenu')
    @elseif (Route::is('blog') || Route::is('blog.detail'))
      @include('includes.headmenudetail', ['banner' => '1.webp' ?? null, 'judul' => 'Blog' ?? null])
    @elseif (Route::is('about-us'))
      @include('includes.headmenudetail', ['banner' => '2.webp' ?? null, 'judul' => 'About Us' ?? null])
    @elseif (Route::is('service'))
      @include('includes.headmenudetail', ['banner' => '3.webp' ?? null, 'judul' => 'Our Services' ?? null])
    @elseif (Route::is('projects'))
      @include('includes.headmenudetail', ['banner' => '4.webp' ?? null, 'judul' => 'Our Projects' ?? null])
    @elseif (Route::is('project-detail'))
      @include('includes.headmenudetail', ['banner' => '4.webp' ?? null, 'judul' => 'Project Detail' ?? null])
    @elseif (Route::is('contact'))
      @include('includes.headmenudetail', ['banner' => '5.webp' ?? null, 'judul' => 'Contact us' ?? null])
    @endif 

    <main id="content">
      <!-- @include('pages.notification') -->
      <!-- ======= About Section ======= -->
      @yield('content')
      @yield('scripts')
      <div class="popup-container" id="popupContainer">
            <a href="https://api.whatsapp.com/send?phone=62818688114&text=Hello&source=&data=" class="whatsApp" target="_blank">
            <img src="{{asset('assets/images/whatsapp.png')}}" />
            </a>
            <div class="popup-content" id="popupContent">
                <img src="{{asset('assets/images/wa.png')}}" /><br />
                Scan Me
            </div>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="landing-footer" class="clearfix">
    @include('includes.footer')

    </footer><!-- End Footer -->
    <!-- End Footer -->
 
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <div class="preloader-logo"><img src="{{asset('assets/images/logo-default-176x28.png')}}" alt="" width="176" height="28" srcset="{{asset('assets/images/logo-default-352x56.png')}} 2x"/>
    </div>
    <div class="preloader-body">
      <div id="loadingProgressG">
        <div class="loadingProgressG" id="loadingProgressG_1"></div>
      </div>
    </div>
  </div>
  <!--End of Preloader-->
  <div class="snackbars" id="form-output-global"></div>
  @include('includes.footerjs')

</body>

</html>