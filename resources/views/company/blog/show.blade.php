@extends('layouts.app')

@section('title', $blog->title . ' - Stuvalley Insights')

@section('content')
    <style>
        /* Premium Blog Detail Styles */
        :root {
            --blog-accent: #3b82f6;
            --blog-dark: #0f172a;
            --text-color: #334155;
            --heading-color: #1e293b;
        }

        /* Hero Section */
        .blog-hero {
            position: relative;
            height: 60vh;
            min-height: 400px;
            width: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -80px;
            /* Offset fixed header if transparent, assuming standard layout */
            padding-top: 80px;
            /* Compensation */
        }

        .blog-hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            z-index: 0;
            transform: scale(1);
            transition: transform 10s ease;
            /* Subtle zoom effect */
        }

        .blog-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(15, 23, 42, 0.3) 0%, rgba(15, 23, 42, 0.8) 100%);
            z-index: 1;
        }

        .blog-hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            text-align: center;
            padding: 20px;
            color: #fff;
        }

        .blog-meta {
            display: inline-flex;
            gap: 15px;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .blog-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            /* Or system serif */
            letter-spacing: -0.5px;
        }

        /* Content Layout */
        .blog-container {
            max-width: 800px;
            margin: -80px auto 0;
            /* Overlap hero */
            position: relative;
            z-index: 5;
            padding: 0 20px 100px;
        }

        .blog-card-wrapper {
            background: #fff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .entry-content {
            font-size: 1.15rem;
            line-height: 1.9;
            color: var(--text-color);
            font-family: 'Inter', sans-serif;
            /* Modern sans */
        }

        .entry-content h2,
        .entry-content h3,
        .entry-content h4 {
            color: var(--heading-color);
            font-weight: 700;
            margin-top: 40px;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .entry-content h2 {
            font-size: 2rem;
        }

        .entry-content h3 {
            font-size: 1.6rem;
        }

        .entry-content p {
            margin-bottom: 25px;
        }

        .entry-content ul {
            margin-bottom: 25px;
            padding-left: 20px;
        }

        .entry-content li {
            margin-bottom: 10px;
            list-style-type: disc;
            padding-left: 10px;
        }

        .entry-content blockquote {
            border-left: 4px solid var(--blog-accent);
            padding-left: 25px;
            margin: 40px 0;
            font-size: 1.4rem;
            font-style: italic;
            color: #555;
        }

        /* Author Box */
        .author-box {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            background: #eee;
        }

        .author-info h4 {
            margin: 0 0 5px;
            font-size: 1.2rem;
            color: var(--heading-color);
        }

        .author-info p {
            margin: 0;
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Related Section */
        .related-section {
            background: #f8fafc;
            padding: 80px 0;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Back Button */
        .back-nav {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
            transition: transform 0.3s;
        }

        .back-nav:hover {
            transform: translateX(-5px);
            color: var(--blog-accent);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .blog-hero {
                height: 50vh;
            }

            .blog-title {
                font-size: 2.2rem;
            }

            .blog-card-wrapper {
                padding: 30px 20px;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }

            .blog-container {
                margin-top: -50px;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="blog-hero">
        <div class="blog-hero-bg"
            style="background-image: url('{{ $blog->featured_image ? asset($blog->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=1200' }}');">
        </div>
        <div class="blog-hero-overlay"></div>
        <div class="blog-hero-content reveal">
            <a href="{{ url('/#blogs') }}" class="back-nav">
                <i class="fas fa-arrow-left"></i> Back to Blogs
            </a>
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <div class="blog-meta">
                <span><i class="far fa-calendar-alt"></i> {{ $blog->published_at->format('M d, Y') }}</span>
                <span style="width:1px; height:15px; background:rgba(255,255,255,0.4);"></span>
                <span><i class="far fa-folder"></i> {{ $blog->category }}</span>
                <span style="display:none; width:1px; height:15px; background:rgba(255,255,255,0.4);"></span>
                <!-- Optional Reading Time hidden on small screens -->
                <span class="md:inline hidden"><i class="far fa-clock"></i> {{ $blog->reading_time }}</span>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="blog-container">
        <div class="blog-card-wrapper reveal delay-100">
            <!-- Post Content -->
            <div class="entry-content">
                {!! $blog->content !!}
            </div>

            <!-- Social Share (Static Demo) -->
            <div style="margin-top: 50px; display: flex; gap: 15px; align-items: center;">
                <span style="font-weight: 700; font-size: 0.9rem; text-transform: uppercase; color: #94a3b8;">Share:</span>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #0077b5; transition: 0.3s;"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #000000; transition: 0.3s;"><i
                        class="fa-brands fa-x-twitter"></i></a>
                <a href="#"
                    style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #25d366; transition: 0.3s;"><i
                        class="fa-brands fa-whatsapp"></i></a>
            </div>

            <!-- Author Box -->
            <div class="author-box">
                <!-- Initials or Placeholder Avatar -->
                <div class="author-avatar"
                    style="background: #3b82f6; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold;">
                    {{ substr($blog->author, 0, 1) }}
                </div>
                <div class="author-info">
                    <h4>{{ $blog->author }}</h4>
                    <p>{{ $blog->author_bio ?? 'Tech Enthusiast & Industry Expert at Stuvalley.' }}</p>
                </div>
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
                            <img src="{{ $r->featured_image ? asset($r->featured_image) : 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?w=600' }}" alt="{{ $r->title }}"
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