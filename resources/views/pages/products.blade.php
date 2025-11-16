@extends('layouts.default')

@section('meta')
    <title>WinMax Bali - Produk Kami</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form id="productSearch" class="form-inline" method="GET" action="{{ route('products', 'cari') }}">
                <div class="input-group">
                    <input id="searchInput" type="search" name="q" class="form-control" placeholder="Cari produk..." value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <script>
                (function() {
                    const form = document.getElementById('productSearch');
                    const containerSelector = 'section.section-md .container';
                    const productRowSelector = `${containerSelector} > .row`;
                    const paginationSelector = `${containerSelector} > .d-flex.justify-content-center`;

                    function getCurrentProductRow() {
                        return document.querySelector(productRowSelector);
                    }
                    function getCurrentPagination() {
                        return document.querySelector(paginationSelector);
                    }

                    async function fetchAndReplace(url, pushHistory = true) {
                        try {
                            const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                            const text = await res.text();
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(text, 'text/html');

                            const newRow = doc.querySelector(productRowSelector);
                            const newPagination = doc.querySelector(paginationSelector);

                            const oldRow = getCurrentProductRow();
                            const oldPagination = getCurrentPagination();

                            if (newRow && oldRow) oldRow.replaceWith(newRow);
                            if (newPagination && oldPagination) oldPagination.replaceWith(newPagination);

                            // keep category filter's hidden q in sync
                            const catQ = document.querySelector('form#categoryFilter input[name="q"]');
                            const searchQ = form.querySelector('input[name="q"]');
                            if (catQ && searchQ) catQ.value = searchQ.value;

                            if (pushHistory) history.pushState(null, '', url);
                        } catch (err) {
                            console.error(err);
                            // fallback to full navigation on error
                            window.location.href = url;
                        }
                    }

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const params = new URLSearchParams(new FormData(form)).toString();
                        const url = form.action + (params ? ('?' + params) : '');
                        fetchAndReplace(url);
                    });

                    // handle pagination links (delegated)
                    document.addEventListener('click', function(e) {
                        const link = e.target.closest('.pagination a');
                        if (!link) return;
                        const href = link.getAttribute('href');
                        if (!href) return;
                        e.preventDefault();
                        fetchAndReplace(href);
                    });

                    // handle back/forward browser buttons
                    window.addEventListener('popstate', function() {
                        // load the current location and replace content (no push)
                        fetchAndReplace(window.location.href, false);
                    });
                })();
            </script>

            <form id="categoryFilter" method="GET" action="{{ route('products', 'cari') }}">
                <div class="form-group mb-0">
                    <select name="category" class="form-control" onchange="onCategoryChange(this.form)">
                        <option value="all">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->code_cat }}" {{ (string)$cat->id === request('category') ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    {{-- preserve search query when switching category --}}
                    <input type="hidden" name="q" value="{{ request('q') }}">
                </div>
            </form>

            <script>
                function onCategoryChange(form) {
                    // keep search query in sync
                    const searchInput = document.getElementById('searchInput');
                    const qInput = form.querySelector('input[name="q"]');
                    if (searchInput && qInput) qInput.value = searchInput.value;

                    const params = new URLSearchParams(new FormData(form)).toString();
                    const url = form.action + (params ? ('?' + params) : '');

                    const containerSelector = 'section.section-md .container';
                    const productRowSelector = containerSelector + ' > .row';
                    const paginationSelector = containerSelector + ' > .d-flex.justify-content-center';

                    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                        .then(res => res.text())
                        .then(text => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(text, 'text/html');

                            const newRow = doc.querySelector(productRowSelector);
                            const newPagination = doc.querySelector(paginationSelector);

                            const oldRow = document.querySelector(productRowSelector);
                            const oldPagination = document.querySelector(paginationSelector);

                            if (newRow && oldRow) oldRow.replaceWith(newRow);
                            if (newPagination && oldPagination) oldPagination.replaceWith(newPagination);

                            history.pushState(null, '', url);
                        })
                        .catch(err => {
                            console.error(err);
                            window.location.href = url; // fallback
                        });
                }
            </script>
        </div>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <a href="{{ route('product.detail', $product->slug) }}">
                            @php
                                $firstImage = collect(explode(',', $product->image ?? ''))
                                ->map('trim')
                                ->filter()
                                ->first() ?: 'default.jpg';
                            @endphp

                            <img src="{{ asset('storage/product/'.$firstImage) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit:cover;height:200px;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">
                                <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                            </h5>
                            <small class="text-muted mb-2">{{ optional($product->category_id)->name }}</small>
                            <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit(strip_tags($product->description), 50) }}</p>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Stock: {{ $product->stock ?? 0 }}</span>
                                <strong class="text-primary">Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}</strong>
                                
                            </div>
                            <div >
                                <a href="https://api.whatsapp.com/send?phone=62818688114&text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}" target="_blank" class="btn btn-sm">
                                    <img src="{{asset('assets/images/tombol-wa.webp')}}" alt="WhatsApp" style="width: 120px;" />
                                </a>
                                <a href="#" class="btn btn-sm">
                                    <img src="{{asset('assets/images/cart.webp')}}" alt="WhatsApp" style="width: 50px;" />
                                </a>
                                <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-sm btn-outline-primary mt-2 w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Tidak ada produk ditemukan.</div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products instanceof \Illuminate\Pagination\LengthAwarePaginator ? $products->appends(request()->query())->links('pagination::bootstrap-4') : '' }}
        </div>
    </div>
</section>


@stop