@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Kontak Kami</title>
    <meta content="WinMax Bali: Solusi komputer dan IT untuk rumah dan bisnis. Produk berkualitas, layanan cepat, dan dukungan teknis terpercaya di Bali" name="description">
    <meta content="Butuh teknisi komputer, jaringan, atau CCTV? Kami hadir dengan layanan service IT lengkap untuk rumah dan bisnis, langsung ke lokasi Anda" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="WinMax Bali : Solusi IT.">
    <meta property="og:image" content="{{ asset('assets/images/ogfoto.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection

@section('content')

<section class="section section-md">
    <div class="container">
        <!-- Profile Modern-->
        <article class="profile-modern">
            <div class="profile-modern-main">
                <div class="profile-modern-header">
                    <div class="profile-modern-header-item">
                        <h3>Kontak Kami</h3>
                        <p>WinMax Bali</p>
                    </div>
                    <div class="profile-modern-item">
                        <div class="group group-xs group-middle"><a class="icon icon-sm icon-creative mdi mdi-facebook" href="#"></a><a class="icon icon-sm icon-creative mdi mdi-twitter" href="#"></a><a class="icon icon-sm icon-creative mdi mdi-instagram" href="#"></a><a class="icon icon-sm icon-creative mdi mdi-google" href="#"></a><a class="icon icon-sm icon-creative mdi mdi-linkedin" href="#"></a></div>
                    </div>
                    </div>
                    <div class="row row-30">
                        <div class="col-lg-6">
                            <p>Kontak kami melalui tlp : +6281 8688114 </p>
                            <p>Melalui WA : 
                                <a href="https://wa.me/62818688114?text=Halo%20saya%20tertarik%20dengan%20layanan%20Anda" target="_blank" style="display:inline-flex;align-items:center;padding:10px 15px;background-color:#25D366;color:white;border-radius:5px;text-decoration:none;font-family:sans-serif;font-size:16px;">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width:24px;height:24px;margin-right:10px;">
  Chat via WhatsApp
</a>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <from action="" method="post">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Pesan</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </from>
                        </div>
                                    
                </div>
            </div>
        </article>
    </div>
</section>




<!--maps-->
<section id="maps" class="scrollto clearfix">
  <div class="row-maps clearfix">

  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15779.000096976235!2d115.1756207!3d-8.6199808!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x91058e289e7ebc3!2sWinMax%20Computer!5e0!3m2!1sen!2sid!4v1629275614666!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </div>
</section>
<!--End of maps-->
   

@stop