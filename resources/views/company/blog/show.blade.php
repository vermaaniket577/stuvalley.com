@extends('layouts.app')

@section('title', $blog->title . ' - Stuvalley Technology')

@section('content')
    <style>
        :root {
            --blog-accent: #f36f21;
            --blog-primary: #2563eb;
            --blog-dark: #0f172a;
        }

        /* SPACIOUS HERO SECTION */
        .blog-hero {
            position: relative;
            background: #0f172a;
            width: 100%;
            display: flex;
            align-items: center;
            margin-top: -120px;
            padding-top: 280px; /* Increased padding to ensure 'Back to Insights' is fully visible */
            padding-bottom: 180px;
            min-height: 85vh;
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #0f172a 0%, #172033 100%);
            z-index: 1;
        }

        .blog-hero-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .blog-hero-content {
            color: #fff;
        }

        .blog-title {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 800;
            line-height: 1.1;
            margin: 20px 0 30px;
            color: #fff;
        }

        /* IMAGE WRAPPER - NO CLIPPING */
        .hero-image-wrapper {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.4);
            display: block;
            object-fit: contain;
            /* SHOWS ENTIRE IMAGE */
        }

        /* CONTENT AREA - UNIVERSAL DARK TEXT FIX */
        .blog-main-content {
            max-width: 900px;
            margin: 60px auto 120px;
            background: #ffffff;
            padding: 60px;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
            line-height: 1.8;
            font-size: 1.15rem;
            color: #1e293b !important;
        }

        /* Targets every single element inside to override white text from editors */
        .blog-main-content *, 
        .blog-main-content span, 
        .blog-main-content p, 
        .blog-main-content div,
        .blog-main-content h1,
        .blog-main-content h2,
        .blog-main-content h3,
        .blog-main-content h4,
        .blog-main-content h5,
        .blog-main-content h6 {
            color: #1e293b !important;
            background-color: transparent !important;
        }

        .blog-main-content h1,
        .blog-main-content h2,
        .blog-main-content h3,
        .blog-main-content h4,
        .blog-main-content h5,
        .blog-main-content h6 {
            color: #0f172a !important;
            font-weight: 800;
            margin-top: 1.5em;
            margin-bottom: 0.8em;
        }

        .blog-main-content a {
            color: #2563eb !important;
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .blog-hero-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .blog-hero {
                padding-top: 150px;
                padding-bottom: 80px;
            }

            .blog-main-content {
                padding: 30px;
                margin-top: 40px;
            }
        }
    </style>

    <div class="blog-hero">
        <div class="blog-hero-overlay"></div>
        <div class="blog-hero-container">
            <div class="blog-hero-content">
                <a href="{{ route('blog') }}"
                    style="color:rgba(255,255,255,0.6); text-decoration:none; font-weight:700; display:inline-flex; align-items:center; gap:8px; margin-bottom:25px;">
                    <i class="fas fa-arrow-left"></i> BACK TO INSIGHTS
                </a>
                <br>
                <span
                    style="background:var(--blog-primary); padding:8px 18px; border-radius:50px; color:#fff; font-size:0.75rem; font-weight:800; text-transform:uppercase;">{{ $blog->category }}</span>
                <h1 class="blog-title">{{ $blog->title }}</h1>
                <div style="color:rgba(255,255,255,0.6); font-size:0.95rem; display:flex; gap:25px;">
                    <span><i class="far fa-calendar-alt"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                    <span><i class="far fa-user"></i> {{ $blog->author }}</span>
                </div>
            </div>

            <div class="hero-image-wrapper">
                <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}">
            </div>
        </div>
    </div>

    <div class="blog-main-content">
        {!! $blog->content !!}
    </div>
@endsection