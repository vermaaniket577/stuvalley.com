@extends('layouts.app')

@section('title', $blog->title . ' - Stuvalley Technology')

@section('content')
    <style>
        :root {
            --blog-accent: #f36f21;
            --blog-primary: #2563eb;
            --blog-dark: #0f172a;
            --text-color: #334155;
            --heading-color: #0f172a;
        }

        /* SPACIOUS HERO SECTION */
        .blog-hero {
            position: relative;
            background: #0f172a;
            width: 100%;
            display: flex;
            align-items: center;
            margin-top: -120px;
            padding-top: 220px;
            /* More space from header */
            padding-bottom: 150px;
            /* More space at bottom */
            min-height: 80vh;
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 70% 30%, rgba(37, 99, 235, 0.15) 0%, transparent 60%),
                linear-gradient(135deg, #0f172a 0%, #172033 100%);
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
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        .blog-hero-content {
            color: #fff;
            text-align: left;
        }

        .back-nav {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            transition: all 0.3s;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .back-nav:hover {
            color: var(--blog-accent);
            transform: translateX(-5px);
        }

        .blog-category-badge {
            background: var(--blog-primary);
            color: #fff;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px;
            display: inline-block;
        }

        .blog-title {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 35px;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -1px;
            color: #fff;
        }

        .blog-meta-minimal {
            display: flex;
            gap: 30px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            font-weight: 500;
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
            border-radius: 24px;
            box-shadow: 0 50px 100px -20px rgba(0, 0, 0, 0.5);
            display: block;
            object-fit: contain;
            /* SHOWS ENTIRE IMAGE ORIGINAL SIZE */
        }

        /* CONTENT LAYOUT */
        .blog-container {
            max-width: 900px;
            margin: 60px auto 120px;
            /* Removed negative margin to prevent hiding image */
            position: relative;
            z-index: 10;
            padding: 0 20px;
        }

        .blog-card-wrapper {
            background: #fff;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
        }

        .entry-content {
            font-size: 1.15rem;
            line-height: 1.85;
            color: var(--text-color);
            font-family: 'Manrope', sans-serif;
        }

        .author-box {
            display: flex;
            gap: 25px;
            align-items: center;
            margin-top: 60px;
            padding: 40px;
            background: #f8fafc;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
        }

        .author-avatar {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            flex-shrink: 0;
        }

        @media (max-width: 992px) {
            .blog-hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }

            .blog-hero {
                padding-top: 160px;
                padding-bottom: 80px;
            }

            .blog-hero-content {
                text-align: center;
            }

            .blog-meta-minimal {
                justify-content: center;
            }

            .blog-container {
                margin-top: 40px;
            }

            .blog-card-wrapper {
                padding: 30px;
            }

            .author-box {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="blog-hero">
        <div class="blog-hero-overlay"></div>
        <div class="blog-hero-container">
            <div class="blog-hero-content reveal">
                <a href="{{ route('blog') }}" class="back-nav">
                    <i class="fas fa-arrow-left"></i> Back to Insights
                </a>
                <br>
                <span class="blog-category-badge">{{ $blog->category }}</span>
                <h1 class="blog-title">{{ $blog->title }}</h1>
                <div class="blog-meta-minimal">
                    <span><i class="far fa-calendar-alt"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                    <span><i class="far fa-clock"></i> {{ $blog->reading_time }} min read</span>
                    <span><i class="far fa-user"></i> {{ $blog->author }}</span>
                </div>
            </div>
            <div class="hero-image-wrapper reveal delay-200">
                <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}">
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="blog-container">
        <div class="blog-card-wrapper reveal delay-100">
            <div class="entry-content">
                {!! $blog->content !!}
            </div>

            <!-- Author Box -->
            <div class="author-box">
                <div class="author-avatar">
                    {{ substr($blog->author, 0, 1) }}
                </div>
                <div class="author-info">
                    <span style="font-size: 0.8rem; font-weight: 700; color: #3b82f6; text-transform: uppercase;">Written
                        By</span>
                    <h4 style="margin: 5px 0 10px; font-size: 1.3rem;">{{ $blog->author }}</h4>
                    <p style="margin: 0; color: #64748b;">Tech Enthusiast & Industry Expert at Stuvalley Technology.</p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <section style="padding: 100px 0; background: #f8fafc;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <h3 style="text-align: center; margin-bottom: 50px; font-size: 2.2rem; font-weight: 800; color: #0f172a;">
                    Related Articles</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 35px;">
                    @foreach($relatedPosts as $r)
                        <a href="{{ route('blog.show', $r->slug) }}"
                            style="text-decoration: none; background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.05); transition: 0.3s; display: flex; flex-direction: column;">
                            <div style="height: 220px; overflow: hidden;">
                                <img src="{{ $r->featured_image_url }}" alt="{{ $r->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 30px; flex-grow: 1;">
                                <span
                                    style="font-size: 0.75rem; color: #3b82f6; font-weight: 800; text-transform: uppercase;">{{ $r->category }}</span>
                                <h4 style="margin: 12px 0; color: #0f172a; line-height: 1.4; font-size: 1.25rem;">{{ $r->title }}
                                </h4>
                                <span style="color: #2563eb; font-weight: 700; font-size: 0.9rem;">Read Full Story <i
                                        class="fas fa-arrow-right" style="margin-left: 5px;"></i></span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            const revealOnScroll = () => {
                reveals.forEach(reveal => {
                    if (reveal.getBoundingClientRect().top < window.innerHeight - 100) {
                        reveal.style.opacity = '1';
                        reveal.style.transform = 'translateY(0)';
                    }
                });
            };
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll();
        });
    </script>
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .delay-100 {
            transition-delay: 0.1s;
        }

        .delay-200 {
            transition-delay: 0.2s;
        }
    </style>
@endsection