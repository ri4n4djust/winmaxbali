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
                <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="/"><img src="{{asset('assets/images/logo-default-176x28.png')}}" alt="" width="176" height="28" srcset="{{asset('assets/images/logo-default-352x56.png')}} 2x"/></a>
            </div>
            <div class="rd-navbar-main-element">
                <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/">HOME</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/blog/all">BLOG</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/products/all">PRODUCTS</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/service">SERVICES</a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/projects">PROJECTS</a>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="/about-us">ABOUT US</a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </nav>
    </div>
</header>
<!-- Breadcrumbs-->
<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{asset('assets/images/'.$banner)}});">
    <div class="breadcrumbs-custom-inner">
        <div class="container breadcrumbs-custom-container">
        <div class="breadcrumbs-custom-main">
            <h6 class="breadcrumbs-custom-subtitle title-decorated">{{ $judul }}</h6>
        </div>
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Home</a></li>
            <li class="active">Detail</li>
        </ul>
        </div>
    </div>
</section>