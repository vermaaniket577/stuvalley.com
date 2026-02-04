@extends('layouts.app')

@section('title', $blog->title . ' - Stuvalley Technology')

@section('content')
    <style>
        /* Premium Blog Detail Styles */
        :root {
            --blog-accent: #2563eb;
            --blog-dark: #0f172a;
            --text-color: #334155;
            --heading-color: #0f172a;
        }

        /* Hero Section - Cleaner Magazine Style */
        .blog-hero {
            position: relative;
            background: #0f172a;
            width: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -120px;
            padding-top: 180px;
            padding-bottom: 220px;
            text-align: center;
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(37, 99, 235, 0.15) 0%, transparent 70%);
            z-index: 1;
        }

        .blog-hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 0 20px;
            color: #fff;
        }

        .blog-category-badge {
            background: var(--blog-accent);
            color: #fff;
            padding: 6px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
        }

        .blog-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 30px;
            font-family: 'Outfit', sans-serif;
            letter-spacing: -1.5px;
        }

        .blog-meta-minimal {
            display: flex;
            justify-content: center;
            gap: 25px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .blog-meta-minimal span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Content Layout */
        .blog-container {
            max-width: 1000px;
            margin: -160px auto 0;
            position: relative;
            z-index: 5;
            padding: 0 20px 120px;
        }

        .blog-card-wrapper {
            background: #fff;
            padding: 60px;
            border-radius: 32px;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
        }

        /* Professional Featured Image - No Cropping */
        .featured-image-wrapper {
            margin: 0 0 50px; /* Reset margins to fit perfectly within the card padding */
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Allow natural image flow */
            min-height: 200px;
            max-height: 600px;
            border: 1px solid #f1f5f9;
        }

        /* Subtle Background Blur Effect for different aspect ratios */
        .featured-image-blur-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            filter: blur(40px) opacity(0.2);
            z-index: 1;
            transform: scale(1.1);
        }

        .featured-image-wrapper img {
            max-width: 100%;
            max-height: 600px;
            width: auto;
            height: auto;
            display: block;
            position: relative;
            z-index: 2;
            transition: transform 0.5s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .featured-image-wrapper:hover img {
            transform: scale(1.01);
        }

        .entry-content {
            font-size: 1.15rem;
            line-height: 1.85;
            color: var(--text-color);
            font-family: 'Manrope', sans-serif;
        }

        .entry-content p {
            margin-bottom: 25px;
        }

        .entry-content h2 {
            font-size: 2rem;
            color: var(--heading-color);
            font-weight: 800;
            margin-top: 50px;
            margin-bottom: 25px;
            font-family: 'Outfit', sans-serif;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .blog-hero {
                padding-top: 140px;
                padding-bottom: 160px;
            }

            .blog-card-wrapper {
                padding: 35px 20px;
                border-radius: 24px;
            }

            .featured-image-wrapper {
                margin: 0 0 35px;
                min-height: 150px;
                max-height: 400px;
                border-radius: 16px;
            }

            .featured-image-wrapper img {
                max-height: 400px;
            }

            .blog-title {
                font-size: 2.2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="blog-hero">
        <div class="blog-hero-overlay"></div>
        <div class="blog-hero-content reveal">
            <a href="{{ route('blog') }}" class="back-nav">
                <i class="fas fa-arrow-left"></i> Back to Blogs
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
    </div>

    <!-- Content Section -->
    <div class="blog-container">
        <div class="blog-card-wrapper reveal delay-100">
            <!-- Professional Featured Image -->
            <div class="featured-image-wrapper">
                @php
                    $imageUrl = filter_var($blog->featured_image, FILTER_VALIDATE_URL) ? $blog->featured_image : ($blog->featured_image ? asset('storage/' . $blog->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1200');
                @endphp
                <div class="featured-image-blur-bg" style="background-image: url('{{ $imageUrl }}');"></div>
                <img src="{{ $imageUrl }}" alt="{{ $blog->title }}">
            </div>

            <!-- Post Content -->
            <div class="entry-content">
                {!! $blog->content !!}
            </div>

            <!-- Social Share -->
            <div style="margin-top: 60px; padding-top: 40px; border-top: 1px solid #f1f5f9; display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                <span style="font-weight: 800; font-size: 0.85rem; text-transform: uppercase; color: #94a3b8; letter-spacing: 1px;">Share this Story:</span>
                <div style="display: flex; gap: 10px;">
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
                        style="width: 45px; height: 45px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: #0077b5; transition: 0.3s; border: 1px solid #e2e8f0;"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank"
                        style="width: 45px; height: 45px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: #000000; transition: 0.3s; border: 1px solid #e2e8f0;"><i
                            class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . request()->fullUrl()) }}" target="_blank"
                        style="width: 45px; height: 45px; border-radius: 12px; background: #f8fafc; display: flex; align-items: center; justify-content: center; color: #25d366; transition: 0.3s; border: 1px solid #e2e8f0;"><i
                            class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Author Box -->
            <div class="author-box">
                <div class="author-avatar"
                    style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);">
                    {{ substr($blog->author, 0, 1) }}
                </div>
                <div class="author-info">
                    <span style="font-size: 0.8rem; font-weight: 700; color: #3b82f6; text-transform: uppercase; letter-spacing: 1px;">Written By</span>
                    <h4>{{ $blog->author }}</h4>
                    <p>{{ $blog->author_bio ?? 'Tech Enthusiast & Industry Expert at Stuvalley Technology.' }}</p>
                </div>
            </div>

            <!-- Blog CTA -->
            <div style="margin-top: 80px; padding: 50px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 24px; text-align: center; border: 1px solid #e2e8f0;">
                <h3 style="margin-top: 0; margin-bottom: 15px; font-size: 1.8rem; color: #0f172a; font-weight: 800; font-family: 'Outfit', sans-serif;">Build the Future with Stuvalley</h3>
                <p style="color: #64748b; margin-bottom: 30px; font-size: 1.1rem; max-width: 600px; margin-left: auto; margin-right: auto;">Our engineering experts can help you transform your digital ideas into industry-leading products.</p>
                <a href="{{ route('contact') }}" class="btn-primary-tech" style="display: inline-flex; align-items: center; gap: 12px; background: #2563eb; color: #fff; padding: 16px 40px; border-radius: 50px; text-decoration: none; font-weight: 700; transition: 0.3s; box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);">
                    Book a Free Strategy Session <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Related Articles -->
    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <section class="related-section">
            <div class="container" style="max-width: 1000px; margin: 0 auto; text-align: center; margin-bottom: 40px;">
                <h3 style="font-size: 2rem; font-weight: 700; color: #1e293b;">Related Articles</h3>
            </div>
            <div class="related-grid">
                @foreach($relatedPosts as $r)
                    <a href="{{ route('blog.show', $r->slug) }}" class="related-card"
                        style="display: block; text-decoration: none; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: 0.3s;">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ filter_var($r->featured_image, FILTER_VALIDATE_URL) ? $r->featured_image : ($r->featured_image ? asset('storage/' . $r->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=600') }}" alt="{{ $r->title }}"
                                style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                        </div>
                        <div style="padding: 25px;">
                            <span
                                style="font-size: 0.8rem; font-weight: 600; color: #3b82f6; text-transform: uppercase;">{{ $r->category }}</span>
                            <h4 style="font-size: 1.2rem; font-weight: 700; color: #1e293b; margin: 10px 0; line-height: 1.4;">
                                {{ $r->title }}
                            </h4>
                            <span style="color: #64748b; font-size: 0.9rem;">Read Article →</span>
                        </div>
                    </a>
                    <style>
                        .related-card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.1);
                        }

                        .related-card:hover img {
                            transform: scale(1.05);
                        }
                    </style>
                @endforeach
            </div>
        </section>
    @endif

    <script>
        // Reveal animation on scroll (simple implementation if original js not present)
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                const elementVisible = 150;
                reveals.forEach(reveal => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                        reveal.style.opacity = '1';
                        reveal.style.transform = 'translateY(0)';
                    }
                });
            };
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Trigger once on load
        });
    </script>
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 {
            transition-delay: 0.1s;
        }
    </style>
@endsection