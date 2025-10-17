@php $file = "" @endphp
@foreach ($slides as $slide)
    
    @php $file = $file.'"'.$slide->path.'"'.','; @endphp
@endforeach
@php $file = substr($file, 0, -1); @endphp

<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.html"><img src="{{asset('assets/images/logo-default-176x28.png')}}" alt="" width="176" height="28" srcset="{{asset('assets/images/logo-default-352x56.png')}} 2x"/></a>
            </div>
            <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="/">Home</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/blog/all">Blog</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/service">Services</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/projects">Projects</a>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/about-us">About Us</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/contact">Contacts</a></li>
                </ul>
                </div>
                <!-- RD Navbar Search-->
                
            </div>
        </div>
        </nav>
    </div>
</header>
<!-- Overlapping Screen-->
<section class="section section-overlap bg-decorate">
<div class="section-overlap-image" style="background-image: url(assets/images/screens-1-1046x720.jpg)"></div>
    <div class="section-overlap-content">
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4">
            </div>
            <div class="col-md-8 col-lg-7 col-xl-6">
            <h1 class="wow-outer"><span class="font-weight-bold wow-outer"><span class="wow slideInUp">WinMaxBali.id</span></span><span class="font-weight-exlight wow-outer"><span class="wow slideInUp" data-wow-delay=".1s"></span></span></h1>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 col-offset-1">
            <div class="wow-outer">
                <h5 class="font-weight-light wow slideInUp" data-wow-delay=".2s">Spesialis service komputer, laptop, jaringan, dan CCTV di Bali. Teknisi ramah, solusi cepat, dan hasil memuaskan.</h5>
            </div>
            <div class="wow-outer button-outer"><a class="button button-lg button-primary button-winona wow slideInUp" href="#" data-wow-delay=".3s">View Portfolio</a></div>
            </div>
        </div>
        </div>
    </div>
</section>