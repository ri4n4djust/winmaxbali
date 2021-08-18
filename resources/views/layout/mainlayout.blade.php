<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layout.partials.head')

 </head>

 <body>


@include('layout.partials.nav')

@include('layout.partials.header')

@yield('content')

@include('layout.partials.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@include('layout.partials.footer-scripts')

 </body>

</html>