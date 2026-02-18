@extends('layouts.app')
@section('header_class', '')

@section('content')
    <div class="blog-page-wrapper">

        <!-- Hero Section -->
        <section class="blog-hero">
            <div class="hero-bg-glow"></div>
            <div class="container relative z-10 text-center">
                <div class="hero-badges">
                    <span class="badge-pill">
                        Insights & News
                    </span>
                </div>
                <h1 class="hero-title">
                    Latest from <span class="text-gradient">Stuvalley</span>
                </h1>
                <p class="hero-subtitle">
                    Industry insights, tech trends, and expert perspectives
                </p>

                <!-- Optional: Search or Filter (Visual only for now) -->
                <div class="hero-search-visual">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search articles, topics, or trends..." disabled
                            style="cursor: default;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Grid Section -->
        <section class="blog-grid-section">
            <div class="container">
                @if($posts->count() > 0)
                    <div class="blog-grid">
                        @foreach($posts as $index => $post)
                            <article class="blog-card reveal delay-{{ ($index % 3) * 100 }}">
                                <a href="{{ route('blog.show', $post->slug) }}" class="card-link-wrapper">
                                    <div class="card-image-wrapper">
                                        @if($post->featured_image_url)
                                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="card-image"
                                                onerror="this.style.display='none'">
                                            <!-- Fallback if image fails -->
                                            <div class="card-image-fallback">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @else
                                            <div class="card-placeholder-gradient"></div>
                                        @endif
                                        <div class="card-overlay">
                                            <span class="read-more-btn">Read Article</span>
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <div class="card-meta">
                                            @if($post->category)
                                                <span class="meta-badge">{{ $post->category }}</span>
                                            @endif
                                            <span class="meta-time">
                                                <i class="far fa-clock"></i> {{ $post->reading_time }} min
                                            </span>
                                        </div>

                                        <h3 class="card-title">{{ $post->title }}</h3>

                                        @if($post->excerpt)
                                            <p class="card-excerpt">{{ \Illuminate\Support\Str::limit($post->excerpt, 100) }}
                                            </p>
                                        @endif

                                        <div class="card-footer">
                                            <div class="author-info">
                                                <div class="author-avatar">
                                                    {{ substr($post->author, 0, 1) }}
                                                </div>
                                                <span>{{ $post->author }}</span>
                                            </div>
                                            <div class="date-info">
                                                {{ $post->published_at->format('M d, Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="blog-pagination">
                        {{ $posts->links('partials.pagination') }}
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon-wrapper">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3>No Articles Found</h3>
                        <p>We're currently crafting new content. Check back soon!</p>
                    </div>
                @endif
            </div>
        </section>

    </div>

    <!-- Styles -->
    <style>
        /* CSS Variables for This Page - UPDATED TO WHITE THEME */
        :root {
            --bg-dark: #ffffff;
            /* White Background */
            --bg-card: #f8fafc;
            /* Slight off-white/gray for cards if needed, or white with shadow */
            --primary: #38bdf8;
            --secondary: #818cf8;
            --text-main: #0f172a;
            /* Dark Text */
            --text-muted: #64748b;
            /* Slate Gray */
        }

        /* --- Page Wrapper --- */
        .blog-page-wrapper {
            background-color: var(--bg-dark);
            min-height: 100vh;
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* --- Container Fix for Alignment --- */
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            /* Provides margin from screen edges */
        }



        /* --- Hero Section --- */
        .blog-hero {
            position: relative;
            padding: 220px 0 60px;
            /* More top padding for fixed header */
            background: #ffffff;
            /* border-bottom: 1px solid #e2e8f0; */
            margin-bottom: 0;
            text-align: center;
        }

        .hero-bg-glow {
            display: none;
            /* Removed for clean white look */
        }

        .hero-badges {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
        }

        .badge-pill {
            background: #dbeafe;
            /* Light Blue */
            color: #2563eb;
            /* Dark Blue Text */
            padding: 8px 24px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            border: none;
            box-shadow: none;
        }

        .hero-title {
            font-size: clamp(3rem, 6vw, 4.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #020617 !important;
            /* Force Dark Color */
            letter-spacing: -1.5px;
        }

        .text-gradient {
            background: none;
            -webkit-text-fill-color: initial;
            color: #3b82f6;
            /* Solid Blue as per screenshot */
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            /* Slate 500 */
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Search Visual */
        .hero-search-visual {
            display: none;
            /* Hiding search to match clean screenshot */
        }

        margin: 0 auto;
        position: relative;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }

        .search-box:hover {
            border-color: rgba(56, 189, 248, 0.4);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.1);
        }

        .search-box i {
            color: var(--text-muted);
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .search-box input {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1rem;
            width: 100%;
            outline: none;
        }

        .search-box input::placeholder {
            color: rgba(148, 163, 184, 0.6);
        }


        /* --- Blog Grid --- */
        .blog-grid-section {
            padding: 80px 0 120px;
            background: var(--bg-dark);
            position: relative;
            z-index: 2;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 40px;
        }

        /* Card Styles */
        /* Card Styles - Updated for White Theme */
        .blog-card {
            background-color: #ffffff;
            /* Explicit White */
            border: 1px solid #e2e8f0;
            /* Subtle border */
            border-radius: 30px;
            /* Very rounded corners as per image */
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
            /* Lighter shadow */
            color: #334155;
        }

        .card-link-wrapper {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            border-color: rgba(56, 189, 248, 0.3);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
        }

        /* Image Wrapper */
        .card-image-wrapper {
            height: 240px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background: #0f172a;
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-image-wrapper:hover .card-image {
            transform: scale(1.1);
        }

        /* Image Fallback */
        .card-image-fallback {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: rgba(255, 255, 255, 0.1);
            font-size: 3rem;
            z-index: 0;
        }

        /* Fallback Gradient if no image at all */
        .card-placeholder-gradient {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        /* Ensure img hides fallback if loaded */
        .card-image:not([src=""])~.card-image-fallback {
            display: none;
        }


        .card-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(2px);
        }

        .blog-card:hover .card-overlay {
            opacity: 1;
        }

        .read-more-btn {
            background: white;
            color: #0f172a !important;
            /* Force dark text for visibility */
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.9rem;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .blog-card:hover .read-more-btn {
            transform: translateY(0);
        }

        /* Content */
        .card-content {
            padding: 30px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .meta-badge {
            background: rgba(56, 189, 248, 0.1);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }

        .meta-time {
            font-size: 0.85rem;
            color: #64748b !important;
            /* Force Slate 500 */
            font-weight: 500;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1e293b !important;
            /* Force Dark Slate */
            margin-bottom: 12px;
            line-height: 1.4;
            transition: color 0.3s;
        }

        .blog-card:hover .card-title {
            color: var(--primary);
        }

        .card-excerpt {
            font-size: 0.95rem;
            color: #475569 !important;
            /* Force Slate 600 */
            margin-bottom: 25px;
            line-height: 1.6;
            flex-grow: 1;
        }

        .card-footer {
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #64748b !important;
            /* Force Slate 500 */
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .author-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.75rem;
        }

        /* --- Empty State --- */
        .empty-state {
            text-align: center;
            padding: 100px 0;
            color: var(--text-muted);
        }

        .empty-icon-wrapper {
            font-size: 4rem;
            margin-bottom: 25px;
            color: #e2e8f0;
        }

        .empty-state h3 {
            font-size: 2rem;
            color: var(--text-main);
            margin-bottom: 10px;
        }

        /* --- Pagination --- */
        .blog-pagination {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        /* Force Pagination Dark Mode */
        .blog-pagination .pagination {
            display: flex;
            gap: 10px;
        }

        .blog-pagination .page-item .page-link {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            color: var(--text-main);
            border-radius: 12px;
            padding: 12px 18px;
            transition: all 0.3s;
        }

        .blog-pagination .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            font-weight: 700;
        }

        .blog-pagination .page-item .page-link:hover {
            background: #f1f5f9;
        }

        /* --- Animations --- */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .delay-0 {
            animation-delay: 0s;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .blog-hero {
                padding: 140px 0 60px;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection