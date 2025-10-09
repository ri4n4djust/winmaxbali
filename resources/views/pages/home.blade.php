@extends('layouts.default')

@section('meta')
    <title>WinMax Bali</title>
    <meta content="Duaraka mep cunstructions service" name="description">
    <meta content="Industrial MEP services, Best MEP contractors for hotels, HVAC installation and maintenance" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="Duaraka mep cunstructions service.">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')

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
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate thumbnail-corporate-lg wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-6-370x464.jpg')}}" alt="" width="370" height="464"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Project 5</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-6.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
                  </div>
                  <div class="thumbnail-corporate-dummy"></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                <!-- Thumbnail Corporate-->
                <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="{{asset('assets/images/gallery-masonry-5-370x256.jpg')}}" alt="" width="370" height="256"/>
                  <div class="thumbnail-corporate-caption">
                    <p class="thumbnail-corporate-title"><a href="#">Project 6</a></p>
                    <p>I offer high-quality photography &amp; retouch services to individual and corporate clients all over the US.</p><a class="thumbnail-corporate-link" href="{{asset('assets/images/gallery-original-5.jpg')}}" data-lightgallery="item"><span class="icon mdi mdi-magnify"></span><span class="icon mdi mdi-magnify"></span></a>
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
<!-- Advantages and Achievements-->
<section class="section section-lg text-center bg-default">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInUp">About Us</span></h3>
    <p class="wow-outer"><span class="text-width-1 wow slideInDown">With over 10 years of experience in the industry, we have successfully completed projects ranging from commercial buildings to industrial facilities. Our team consists of highly skilled engineers and technicians dedicated to delivering high-quality MEP systems.</span></p>
    <div class="row row-50">
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-mustache-glasses"></div>
          <div class="counter-minimal-main">
            <div class="counter">365</div>
          </div>
          <h5 class="counter-minimal-title">Finish Project</h5>
        </article>
      </div>
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-camera2"></div>
          <div class="counter-minimal-main">
            <div class="counter">156</div>
          </div>
          <h5 class="counter-minimal-title">Ongoing Projects</h5>
        </article>
      </div>
      <div class="col-6 col-md-3 wow-outer">
        <!-- Counter Minimal-->
        <article class="counter-minimal wow slideInUp" data-wow-delay=".1s">
          <div class="counter-minimal-icon linearicons-shutter"></div>
          <div class="counter-minimal-main">
            <div class="counter">10</div>
          </div>
          <h5 class="counter-minimal-title">Years of Experience</h5>
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
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-2" aria-controls="accordion1-collapse-2" aria-expanded="false">Do you provide engineering design services?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-2" role="tabpanel" aria-labelledby="accordion1-heading-2">
                <div class="card-body">
                  <p>Yes, our team includes experienced engineers who design efficient and cost-effective MEP systems tailored to your project needs.</p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".15s">
              <div class="card-header" id="accordion1-heading-3" role="tab">
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-3" aria-controls="accordion1-collapse-3" aria-expanded="false">How do you ensure compliance with local regulations?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-3" role="tabpanel" aria-labelledby="accordion1-heading-3">
                <div class="card-body">
                  <p>We strictly adhere to industry standards and local building codes, ensuring all installations meet safety and efficiency requirements.</p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".2s">
              <div class="card-header" id="accordion1-heading-4" role="tab">
                <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-4" aria-controls="accordion1-collapse-4" aria-expanded="false">Can you provide a detailed cost estimate?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse" id="accordion1-collapse-4" role="tabpanel" aria-labelledby="accordion1-heading-4">
                <div class="card-body">
                  <p>Absolutely! We offer transparent pricing and detailed cost breakdowns to help you plan your budget effectively.</p>
                </div>
              </div>
            </article>
            <!-- Bootstrap card-->
            <article class="card card-custom card-corporate wow fadeInDown" data-wow-delay=".05s">
              <div class="card-header" id="accordion1-heading-1" role="tab">
                <div class="card-title"><a role="button" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-collapse-1" aria-controls="accordion1-collapse-1" aria-expanded="true">Do you offer value engineering solutions?
                    <div class="card-arrow"></div></a></div>
              </div>
              <div class="collapse show" id="accordion1-collapse-1" role="tabpanel" aria-labelledby="accordion1-heading-1">
                <div class="card-body">
                  <p>Yes, we analyze alternative designs and materials to optimize cost without compromising quality.</p>
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
                        <p>Electricity</p><span class="progress-value">95</span>
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
                        <p>Plumbing</p><span class="progress-value">95</span>
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
                        <p>Electronics</p><span class="progress-value">95</span>
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
                        <p>IT Support</p><span class="progress-value">95</span>
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
          <h4 class="wow-outer"><span class="wow slideInRight">Looking for  <span class="text-italic">Quality MEP Desaining?</span> </span></h4>
          <div class="wow-outer button-outer"><a class="button button-primary button-winona wow slideInLeft" href="#">Get in Touch</a></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Latest Blog Posts-->
<section class="section section-lg bg-gray-100 text-center">
  <div class="container">
    <h3 class="section-title wow-outer"><span class="wow slideInDown">Latest Finish Projects</span></h3>
    <div class="row row-50">
      <div class="col-sm-6 col-lg-4 wow-outer">
        <!-- Post Classic-->
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
        <!-- Post Classic-->
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
        <!-- Post Classic-->
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
</section>


@stop