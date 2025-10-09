@extends('layouts.default')
@section('meta')
    <title>The Awan Villa - Seminyak</title>
    <meta content="best villa in bali" name="description">
    <meta content="bali room booking, car rental bali, bali management property" name="keywords">
@endsection

@section('content')

 
<!--Gallery-->
<aside id="gallery" class="row text-center scrollto clearfix" data-featherlight-gallery
      data-featherlight-filter="a">
      <div class="tengah">
          <div class="section-heading">
              <h2 style="font-family:'MAIAN';font-weight: bold;">- Foto Gallery -</h2>
          </div>

      </div>
      <div class="gallery-categories">
        <button class="button" onclick="filterGallery('all')">All</button>
        @foreach($albums as $item)
          <button class="button" onclick="filterGallery('{{$item->id}}')">{{ $item->nama_album }}</button>
        @endforeach
      </div>

      
      <div class="box-villas wow fadeInUp" data-wow-delay="0.1s">
        @foreach($galeries as $item)
          <a href="{{ asset('storage/images/' . $item->nama_foto) }}" data-featherlight="image" class="col-3 wow fadeIn {{$item->id_album}}"
            data-wow-delay="0.2s">
            <img src="{{ asset('storage/images/' . $item->nama_foto) }}" alt="{{ $item->nama_foto }}"/>
          </a>
        @endforeach
      </div>
</aside>

<script>
  function filterGallery(category) {
    var items = document.querySelectorAll('#gallery a');
    items.forEach(function(item) {
      if (category === 'all' || item.classList.contains(category)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }
</script>
  <!--End of Gallery-->


 
   

@stop