@extends('layouts.default')
@php
    $raw = $blogDetail[0]->image ?? '';
    $parts = array_values(array_filter(array_map('trim', explode(',', $raw))));
    $first = $parts[0] ?? null;
    $second = $parts[1] ?? null;
@endphp
@section('meta')
    <title>WinMax Bali - {{ $blogDetail[0]->slug }}</title>
    <meta content="{!! $blogDetail[0]->meta_description !!}" name="description">
    <meta content="{{ $blogDetail[0]->meta_keywords }}" name="keywords">
    <meta property="og:title" content="WinMax Bali">
    <meta property="og:description" content="{{ $blogDetail[0]->title ?? 'WinMax Bali : Solusi IT.' }}">
    <meta property="og:image" content="{{ asset('storage/blog/'.$first) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endsection
@section('content')
    

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <h3>{{ $blogDetail[0]->title }}</h3>
            <!-- <p>Learn More </p> -->
            </div>

            <div class="row row-30">
                <div class="col-lg-12 position-relative about-img" style="border:1px solid #ddd; padding:10px;" data-aos="fade-up" data-aos-delay="150">
                    <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
                    <hr>
                    Iklan
                iklan
                </div>
            </div>

            <div class="row row-30">
                <div class="col-lg-8" >
                    
                    <div class="position-relative mt-4">

                        @if($second)
                            <img src="{{ asset('storage/blog/'.$second) }}" class="img-fluid" alt="{{ $blogDetail[0]->title ?? 'image' }}">
                        @endif

                        <div >
                            @php
                            $html = $blogDetail[0]->content ?? '';
                            libxml_use_internal_errors(true);
                            $doc = new \DOMDocument();
                            $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
                            $xpath = new \DOMXPath($doc);
                            $nodes = $xpath->query('//h1|//h2|//h3|//h4|//h5|//h6');

                            $toc = [];
                            $ids = [];

                            foreach ($nodes as $node) {
                                $level = intval(substr($node->nodeName, 1));
                                $text = trim($node->textContent);
                                if ($text === '') {
                                    continue;
                                }

                                // slugify / create id
                                $slug = preg_replace('/[^a-z0-9\-]+/i', '-', trim($text));
                                $slug = strtolower(trim($slug, '-'));
                                if ($slug === '') {
                                    $slug = 'section';
                                }
                                $base = $slug;
                                $i = 1;
                                while (in_array($slug, $ids)) {
                                    $slug = $base . '-' . $i++;
                                }
                                $ids[] = $slug;

                                $node->setAttribute('id', $slug);
                                $toc[] = ['id' => $slug, 'text' => $text, 'level' => $level];
                            }

                            // serialize modified HTML back to string and overwrite original content so the later {!! $blogDetail[0]->content !!} renders anchors
                            $newHtml = '';
                            $body = $doc->getElementsByTagName('body')->item(0);
                            if ($body) {
                                foreach ($body->childNodes as $child) {
                                    $newHtml .= $doc->saveHTML($child);
                                }
                            } else {
                                $newHtml = $html;
                            }
                            $blogDetail[0]->content = $newHtml;

                            // render TOC
                            if (count($toc) > 0) {
                                // add a small script that injects a Show/Hide button into the TOC header and toggles the .list-group
                                echo <<<'JS'
                                <script>
                                document.addEventListener("DOMContentLoaded", function(){
                                    var header = document.querySelector('.toc-card .card-header');
                                    var list = document.querySelector('.toc-card .list-group');
                                    if (!header || !list) return;

                                    // ensure header is flex to place button to the right
                                    header.style.display = 'flex';
                                    header.style.alignItems = 'center';
                                    header.style.gap = '0.5rem';

                                    var btn = document.createElement('button');
                                    btn.type = 'button';
                                    btn.className = 'btn btn-sm btn-light';
                                    btn.setAttribute('aria-expanded', 'true');
                                    btn.setAttribute('aria-label', 'Toggle table of contents');
                                    btn.textContent = 'Hide';

                                    // append button to header
                                    header.appendChild(btn);

                                    btn.addEventListener('click', function(){
                                        var expanded = btn.getAttribute('aria-expanded') === 'true';
                                        if (expanded) {
                                            list.style.display = 'none';
                                            btn.textContent = 'Show';
                                            btn.setAttribute('aria-expanded', 'false');
                                        } else {
                                            list.style.display = '';
                                            btn.textContent = 'Hide';
                                            btn.setAttribute('aria-expanded', 'true');
                                        }
                                    });
                                });
                                </script>
                                JS;
                                $output = '<aside class="card toc-card mb-3" style="position:sticky;top:90px;max-height:420px;overflow:auto;">';
                                $output .= '<div class="card-header bg-primary text-white"><strong>Daftar Isi</strong></div>';
                                $output .= '<div class="list-group list-group-flush">';

                                foreach ($toc as $item) {
                                    $level = max(1, intval($item['level']));
                                    $indent = ($level - 1) * 12; // pixels indentation per level
                                    $output .= '<a href="#' . e($item['id']) . '" class="list-group-item list-group-item-action d-flex align-items-start" style="padding-left:' . $indent . 'px">';
                                    $output .= '<span class="toc-item-text">' . e($item['text']) . '</span>';
                                    $output .= '</a>';
                                }

                                $output .= '</div></aside>';

                                // Inline styles & small JS for smooth scrolling and nicer hover states
                                $output .= '<style>
                                    .toc-card .list-group-item{border:0;padding-top:.5rem;padding-bottom:.5rem;color:#212529;}
                                    .toc-card .list-group-item:hover{background:#f8f9fa;}
                                    .toc-card .card-header{font-size:1rem;}
                                    @media (max-width:767px){ .toc-card{position:relative;top:auto;max-height:300px;} }
                                </style>';

                                $output .= '<script>
                                    document.addEventListener("DOMContentLoaded", function(){
                                        document.querySelectorAll(".toc-card a").forEach(function(a){
                                            a.addEventListener("click", function(e){
                                                e.preventDefault();
                                                var id = this.getAttribute("href").slice(1);
                                                var el = document.getElementById(id);
                                                if (el) {
                                                    var offset = 80; // adjust to match fixed header height
                                                    var top = el.getBoundingClientRect().top + window.pageYOffset - offset;
                                                    window.scrollTo({ top: top, behavior: "smooth" });
                                                }
                                            });
                                        });
                                    });
                                </script>';

                                echo $output;
                            }
                            @endphp
                        </div>
                        @php
                        $html = $blogDetail[0]->content ?? '';
                        libxml_use_internal_errors(true);
                        $doc = new \DOMDocument();
                        $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
                        $body = $doc->getElementsByTagName('body')->item(0);

                        $sections = [];
                        if ($body) {
                            $current = ['id' => 'intro', 'title' => null, 'level' => 0, 'content' => ''];
                            for ($i = 0; $i < $body->childNodes->length; $i++) {
                                $node = $body->childNodes->item($i);
                                if ($node->nodeType === XML_ELEMENT_NODE && preg_match('/^h([1-6])$/i', $node->nodeName, $m)) {
                                    // push previous section if it has content
                                    if ($current['title'] !== null || trim($current['content']) !== '') {
                                        $sections[] = $current;
                                    }
                                    $id = $node->getAttribute('id') ?: 'section-' . count($sections);
                                    $title_html = $doc->saveHTML($node);
                                    $level = intval($m[1]);
                                    $current = ['id' => $id, 'title' => $title_html, 'level' => $level, 'content' => ''];
                                } else {
                                    $current['content'] .= $doc->saveHTML($node);
                                }
                            }
                            // push last
                            if ($current['title'] !== null || trim($current['content']) !== '') {
                                $sections[] = $current;
                            }
                        }
                        @endphp

                        @if(!empty($sections))
                            <div class="blog-slices">

                                @foreach($sections as $index => $slice)
                                    @php
                                        // images in $parts: 0 => first image, 1 => second (shown above). start slices from index 2
                                        $imgIndex = $index + 2;
                                        $second = $parts[$imgIndex] ?? null;
                                    @endphp

                                    <article id="{{ $slice['id'] }}" class="blog-slice mb-4">
                                        @if($slice['title'])
                                            {!! $slice['title'] !!}
                                        @endif

                                        {!! $slice['content'] !!}

                                        @if($second)
                                            <img src="{{ asset('storage/blog/'.$second) }}" class="img-fluid" alt="{{ $blogDetail[0]->title ?? 'image' }}">
                                        @endif

                                        <span class="ms-2 anchor-permalink" style="font-size:.95rem;">
                                            <!-- <a href="#{{ $slice['id'] }}" class="text-decoration-none text-muted" aria-label="Permalink to this section" title="Permalink to this section">
                                                iklan
                                            </a> -->
                                            iklan
                                        </span>
                                    </article>
                                @endforeach
                            </div>

                            <style>
                                .blog-slice + .blog-slice { border-top: 1px solid #eee; padding-top: 1rem; }
                                .blog-slice h1, .blog-slice h2, .blog-slice h3, .blog-slice h4, .blog-slice h5, .blog-slice h6 {
                                    margin-top: .5rem;
                                    margin-bottom: .5rem;
                                }
                            </style>
                        @endif
                    
                        <p>
                        Posted on {{ optional($blogDetail[0]->created_at)->format('F d, Y') ?? '-' }} by admin                   
                        </p>
                    </div>
                    <!-- <img src="assets/img/about.jpg" class="img-fluid" alt=""> -->
                </div>

                <div class="col-lg-3 ">
                    <div class="progress-linear-outer wow-outer">
                        <div class="sidebar-section">
                            <h4 class="text-lg font-semibold mb-4">📂 Kategori</h4>
                            <ul class="space-y-2">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('blog', $category->slug) }}" class="text-blue-600 hover:underline">
                                            {{ $category->slug }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    </div>

                    <div class="progress-linear-outer wow-outer">
                        <div class="section-header">
                            <h4>Iklan</h4>
                        </div>
                        
                    </div>
                    <div class="progress-linear-outer wow-outer">
                        <div class="sidebar-section">
                            <h4 class="text-lg font-semibold mb-4">🔥 Popular Posts</h4>
                            <ul class="space-y-3">
                                @foreach($popularPosts as $post)
                                    <li>
                                        <a href="{{ route('blog.detail', $post->slug) }}" class="text-blue-600 hover:underline">
                                            {{ $post->title }}
                                        </a>
                                        <div class="text-sm text-gray-500">
                                            {{ $post->type }} views
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        

        </div>
    </section><!-- End About Section -->
   

@stop