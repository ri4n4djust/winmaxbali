@extends('layouts.default')
@section('meta')
    <title>The Awan Villa - Seminyak</title>
    <meta content="best villa in bali" name="description">
    <meta content="bali room booking, car rental bali, bali management property" name="keywords">
@endsection

@section('content')

<style>

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<!--Content Section-->
<div id="services" class="scrollto clearfix">

  <div class="row no-padding-bottom clearfix">

      <div class="tengah">
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';font-weight: bold;">- Provided Services -</h2>
          </div>

      </div>

      <!--Content of the Right Side-->
      <div class="col-2 wow fadeInLeft">
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	In-Villa Spa</h2>
              <p class="section-subtitle">Indulge in the ultimate relaxation experience with our In-Villa Spa services. Enjoy rejuvenating treatments in the comfort and privacy of your own villa.</p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>
      <!--End Content Right Side-->

      <div class="col-2 wow fadeInRight slideshow-container">
        @php
            $getImage = $galeries->where('id_album', 4);
        @endphp
        @foreach($getImage as $service)
        <div class="mySlides fade">
            <img src="{{ asset('storage/images/' . $service->nama_foto) }}" >
        </div>
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

      </div>

    <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
      </script>
      <!--Content of the Right Side-->
      <div class="col-3 wow fadeInLeft">
      <img src="{{asset('assets/images/floating.jpg')}}" alt="Dancer"/>
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	Floating Breakfast</h2>
              <p class="section-subtitle">Start your day in paradise with our signature Floating Breakfast experience. Indulge in a Delicious Breakfast Enjoy a mouth-watering breakfast, carefully prepared by our chefs, and served to you in the comfort of your own private pool.
              </p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>
      <!--End Content Right Side-->

      <!-- <div class="col-6 wow fadeInRight">
          <img src="{{asset('assets/images/dining.jpg')}}" alt="Dancer"/>
      </div> -->

      <div class="col-3 wow fadeInLeft">
      <img src="{{asset('assets/images/romantic.jpg')}}" alt="Dancer"/>
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	Romantic Dinner</h2>
              <p class="section-subtitle">Celebrate love and romance with a unforgettable dinner experience under the stars.</p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>

      <div class="col-3 wow fadeInLeft">
      <img src="{{asset('assets/images/honeymoon.jpg')}}" alt="Dancer"/>
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	Honeymoon Decoration</h2>
              <p class="section-subtitle">Make your dream honeymoon even more unforgettable with our romantic decoration packages. Transform your villa into a love nest with our beautifully crafted decoration packages
              </p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>

      <div class="col-3 wow fadeInLeft">
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	Airport Pickup</h2>
              <p class="section-subtitle">Pickup transfer and drop.</p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>

      <div class="col-3 wow fadeInLeft">
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';">●	Motorbike Rental</h2>
              <p class="section-subtitle"></p>
          </div>
          <!-- Just replace the Video ID "UYJ5IjBRlW8" with the ID of your video on YouTube (Found within the URL) -->
      </div>


  </div>


</div>
<!--End of Content Section-->


   

@stop