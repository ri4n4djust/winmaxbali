@extends('layouts.default')
@section('meta')
    <title>WinMax Bali - {{ $blogDetail[0]->slug }}</title>
    <meta content="{!! $blogDetail[0]->content !!}" name="description">
    <meta content="{{ $blogDetail[0]->slug }}" name="keywords">
@endsection
@section('content')
    
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Hotel Detail</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>{{ $blogDetail[0]->title }}</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <!-- <h2>About Us</h2> -->
            <!-- <p>Learn More </p> -->
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img" data-aos="fade-up" data-aos-delay="150">
                    
                    <div class="position-relative mt-4">
                        
                        <h4>{{ $blogDetail[0]->title }}</h4>
                            @php 
                                $rata2 = 0 ; 
                                $count = 0;
                            @endphp
                        
                    

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">

                        @php $gmbra = explode(";",$blogDetail[0]->image) ; @endphp
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
                        
                        @foreach($gmbr as $key => $slider)
                        <!-- {{ $key }} -->
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img src="{{ asset('assets/img/rooms/'. $slider) }}" class="d-block w-100" alt="">
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
                        <div class="carousel-indicators" style="margin-bottom: -20px;width:100px">
                            @foreach($gmbr as $key => $slider)
                                <button type="button" data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{$loop->first ? 'active' : ''}}" aria-current="true" aria-label="Slide 1" >
                                <img class="d-block w-100" src="{{ asset('assets/img/rooms/'. $slider) }}" class="img-fluid" />
                                </button>
                            @endforeach   
                        </div>
                        <!-- Thumbnails -->
                        
                        
                    </div>
                    
                    

                    <div style="margin-top:40px;"></div>
                    <div class="row">
                    </div>
                    
                    <p>{!! $blogDetail[0]->content !!}</p>
                    <p>
                    <!-- <iframe src="https://www.airbnb.co.id/calendar/ical/1008390716123586176.ics?s=cf056deabfae92dc6d2000654b37a31e" height="200" width="300" title="Iframe Example"></iframe>  -->
                   
                    </p>
                    </div>
                    <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
                </div>
                <div class="col-lg-5 d-flex" data-aos="fade-up" data-aos-delay="300">
                
                    <div class="content ps-0 ps-lg-5" >
                        <div class="section-header">
                            <h4>Booking Detail</h4>
                            <!-- <p>Learn More </p> -->
                        </div>
                        
                    

                
                    <div class="row">
                        <div class="section-header">
                            <h4>Most interesting In Bali</h4>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="section-header">
                            <h4>Bali Activities</h4>
                        </div>
                        
                    </div>
                    
                    
                    
                    
                    
                    
                </div>
            </div>
            
            
            
        

        </div>
    </section><!-- End About Section -->
   

@stop