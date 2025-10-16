@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Our Project</title>
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
        
            <div class="timeline">
                <div class="timeline-event left">
                    <div>
                        <h5>Phase 1: Research</h5>
                        <p><strong>Date:</strong> 01 May 2025</p>
                        <p>Gather information and data.</p>
                        <img src="https://via.placeholder.com/150" alt="Research Image" style="width:100%; margin-top:10px;">
                    </div>
                </div>
                <div class="timeline-event right">
                    <div>
                        <h5>Phase 2: Design</h5>
                        <p><strong>Date:</strong> 06 May 2025</p>
                        <p>Create templates and prototypes.</p>
                    </div>
                </div>
                <div class="timeline-event left">
                    <div>
                        <h5>Phase 3: Development</h5>
                        <p><strong>Date:</strong> 11 May 2025</p>
                        <p>Implement features and solutions.</p>
                    </div>
                </div>
                <div class="timeline-event right">
                    <div>
                        <h5>Phase 4: Testing</h5>
                        <p><strong>Date:</strong> 21 May 2025</p>
                        <p>Validate functionality and performance.</p>
                    </div>
                </div>
                <div class="timeline-event left">
                    <div>
                        <h5>Phase 5: Deployment</h5>
                        <p><strong>Date:</strong> 26 May 2025</p>
                        <p>Launch the project.</p>
                    </div>
                </div>
            </div>

            <style>
                .timeline {
                    position: relative;
                    max-width: 800px;
                    margin: 0 auto;
                }
                .timeline::after {
                    content: '';
                    position: absolute;
                    width: 6px;
                    background-color: #007bff;
                    top: 0;
                    bottom: 0;
                    left: 50%;
                    transform: translateX(-50%);
                }
                .timeline-event {
                    position: relative;
                    margin: 20px 0;
                    width: 50%;
                }
                .timeline-event.left {
                    left: 0;
                    text-align: right;
                }
                .timeline-event.right {
                    left: 50%;
                }
                .timeline-event div {
                    background-color: #ffffff;
                    padding: 10px 20px;
                    border-radius: 5px;
                    position: relative;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
                .timeline-event div::before {
                    content: "";
                    position: absolute;
                    width: 0;
                    height: 0;
                    border-style: solid;
                    top: 15px;
                }
                .timeline-event.left div::before {
                    border-width: 10px 10px 10px 0;
                    border-color: transparent #ffffff transparent transparent;
                    right: -10px;
                }
                .timeline-event.right div::before {
                    border-width: 10px 0 10px 10px;
                    border-color: transparent transparent transparent #ffffff;
                    left: -10px;
                }
                .timeline-event h3 {
                    margin: 0;
                    color: #007bff;
                }
                .timeline-event p {
                    margin: 5px 0 0;
                }
            </style>
    
    </div>
</section>

@stop