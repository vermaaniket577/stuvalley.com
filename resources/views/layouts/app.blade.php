<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        // Determine current page ID based on route name or URI
        $current_route = Route::currentRouteName();
        $page_id = 'home'; // default
        if ($current_route == 'about')
            $page_id = 'about';
        if ($current_route == 'services.index')
            $page_id = 'services';
        if ($current_route == 'services.show')
            $page_id = 'services-' . request('slug'); // dynamic services
        // ... add more logic for contact etc.

        // Fetch SEO data directly (since we didn't add a Composer yet, this is direct injection for speed)
        $seo_meta = \App\Models\SeoPage::where('page_identifier', $page_id)->first();
    @endphp

    <title>
        @if(isset($service) && isset($service->title))
            {{ $service->title }} | Stuvalley Technology
        @else
            {{ $seo_meta->title ?? $global_settings['seo_home_title'] ?? 'Stuvalley Technology - Empowering Digital Innovation' }}
        @endif
    </title>
    <meta name="description"
        content="@if(isset($service) && isset($service->subtitle)) {{ $service->subtitle }} @else {{ $seo_meta->description ?? $global_settings['seo_home_desc'] ?? 'Stuvalley Technology delivers cutting-edge solutions in academia, research, training, and recruitment.' }} @endif">
    <meta name="keywords" content="{{ $seo_meta->keywords ?? '' }}">

    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="{{ $seo_meta->title ?? 'Stuvalley Technology' }}">
    <meta property="og:description" content="{{ $seo_meta->description ?? '' }}">
    @if(isset($seo_meta->image))
        <meta property="og:image" content="{{ asset('storage/' . $seo_meta->image) }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="{{ asset('favicon.jpg') }}?v={{ time() }}" type="image/jpeg">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Manrope', sans-serif;
            scroll-behavior: smooth;
            background-color: #0b1120;
            /* Ensure dark bg behind everything */
            min-height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Standard Section Spacing */
        section {
            position: relative;
            background: #0b1120;
        }

        main {
            flex: 1;
            /* Pushes footer down */
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        /* Footer Reset */
        footer,
        #main-footer {
            position: relative;
            z-index: 100;
            background: #0b1120;
            margin-top: 0;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.4);
            z-index: 10000;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .whatsapp-float:hover {
            transform: scale(1.1) translateY(-5px);
            background: linear-gradient(135deg, #128c7e 0%, #25d366 100%);
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.6);
            color: #fff;

        }

        .whatsapp-float::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            border: 2px solid #25d366;
            animation: ripple-wa 2s linear infinite;
            z-index: -1;
            box-shadow: 0 0 10px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-float:hover::before {
            animation: none;
        }

        .whatsapp-float i {
            /* No animation on icon itself */
        }

        @keyframes ripple-wa {
            0% {
                transform: scale(1);
                opacity: 0.8;
            }

            100% {
                transform: scale(1.6);
                opacity: 0;
            }
        }

        /* Premium Navbar Icons */
        .nav-icon {
            margin-right: 8px;
            font-size: 0.9em;
            color: inherit;
            transition: all 0.3s ease;
            opacity: 0.85;
        }

        .nav-links a:hover .nav-icon,
        .dropbtn:hover .nav-icon {
            color: #3b82f6;
            transform: scale(1.1);
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
            opacity: 1;
        }

        @media (max-width: 992px) {
            .nav-icon {
                margin-right: 12px;
                font-size: 1.1em;
            }
        }

        /* Fix Navbar Alignment - Icon & Text always inline */
        .nav-links li a,
        .dropbtn {
            display: flex !important;
            align-items: center;
            gap: 5px;
            /* Ensure small gap if margin fails */
        }

        /* Global Modal Base Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .premium-modal {
            background: rgba(255, 255, 255, 0.95);
            width: 90%;
            max-width: 480px;
            padding: 40px;
            border-radius: 24px;
            text-align: center;
            transform: scale(0.9);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
        }

        .modal-overlay.active .premium-modal {
            transform: scale(1);
        }

        .modal-icon-wrapper {
            width: 80px;
            height: 80px;
            background: #dcfce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #16a34a;
            font-size: 2.5rem;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .modal-text {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .voice-btn {
            background: #f1f5f9;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            color: #475569;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .voice-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .voice-btn.active {
            color: #2563eb;
            background: #eff6ff;
        }

        .voice-ripple {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #2563eb;
            border-radius: 50%;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        .btn-modal-close {
            background: #0f172a;
            color: #fff;
            border: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s;
            width: 100%;
        }

        .btn-modal-close:hover {
            transform: translateY(-2px);
            background: #1e293b;
        }

        /* Essential Button Fix */
        .btn-shiny-cta {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #22d3ee 0%, #a855f7 100%);
            color: #ffffff !important;
            padding: 10px 24px;
            /* Optimized padding */
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none !important;
            box-shadow: 0 8px 20px rgba(34, 211, 238, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.2);
            white-space: nowrap !important;
            position: relative;
            overflow: hidden;
            z-index: 10;
        }

        .btn-shiny-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(168, 85, 247, 0.5);
            background: linear-gradient(135deg, #22d3ee 20%, #a855f7 100%);
            color: #ffffff !important;
        }

        .btn-shiny-cta::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-shiny-cta:hover::after {
            left: 100%;
        }

        /* Layout core relies on app.css */

        .hero {
            position: relative;
            min-height: 85vh;
            /* Reduced height for better visibility of next section */
            display: flex !important;
            align-items: center;
            justify-content: center;
            background: #000;
            overflow: hidden;
            z-index: 10;
            padding: 130px 0 60px;
            /* Balanced padding to clear header */
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(2, 6, 23, 1) 0%,
                    rgba(2, 6, 23, 0.85) 40%,
                    rgba(2, 6, 23, 0.82) 65%,
                    rgba(2, 6, 23, 0.98) 100%) !important;
            /* Maximum contrast for professional clarity */
            z-index: 1;
            pointer-events: none;
        }

        .hero-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 5;
        }

        .hero-grid {
            display: grid !important;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .hero-bg-text {
            position: absolute;
            top: 50%;
            right: 0%;
            transform: translateY(-50%);
            font-size: 10rem;
            font-weight: 950;
            line-height: 0.8;
            color: transparent;
            -webkit-text-stroke: 1px rgba(34, 211, 238, 0.05);
            /* Extremely subtle */
            z-index: 1;
            pointer-events: none;
            text-transform: uppercase;
            font-family: 'Outfit', sans-serif !important;
            filter: drop-shadow(0 0 15px rgba(34, 211, 238, 0.03));
            white-space: nowrap;
            letter-spacing: -2px;
            opacity: 0.3;
            /* Subtle depth only */
        }

        .hero-title {
            font-size: 3.5rem !important;
            /* Reduced from 4.8rem */
            line-height: 1.1 !important;
            font-weight: 800 !important;
            /* Slightly less heavy */
            color: #fff !important;
            margin-bottom: 25px !important;
            letter-spacing: -1px !important;
            font-family: 'Outfit', sans-serif !important;
            text-transform: none !important;
        }

        .hero-left {
            position: relative;
            z-index: 10;
            padding-right: 50px;
        }

        .hero-right {
            position: relative;
            z-index: 10;
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-end !important;
            justify-content: center !important;
        }

        .text-blue {
            color: #fff !important;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.4);
        }

        .text-orange {
            color: #fff !important;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.4);
        }

        .hero-description {
            font-size: 1.1rem !important;
            /* Reduced from 1.3rem */
            color: rgba(255, 255, 255, 0.85) !important;
            max-width: 600px;
            line-height: 1.6 !important;
            margin-bottom: 40px !important;
            font-family: 'Inter', sans-serif !important;
        }

        .hero-btns {
            display: flex !important;
            gap: 20px;
            margin-bottom: 60px;
        }

        .btn-primary-tech,
        .btn-mini-tech {
            display: inline-flex !important;
            align-items: center;
            gap: 12px;
            background: #0071e3 !important;
            color: #fff !important;
            padding: 18px 45px !important;
            border-radius: 10px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(0, 113, 227, 0.4);
        }

        .btn-primary-tech:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(0, 113, 227, 0.6);
        }

        .btn-outline-tech {
            display: inline-flex !important;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.95) !important;
            color: #000 !important;
            padding: 18px 45px !important;
            border-radius: 10px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            text-decoration: none !important;
            transition: 0.3s;
        }

        .hero-stats-glass {
            display: flex !important;
            background: rgba(15, 23, 42, 0.3) !important;
            backdrop-filter: blur(60px) !important;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 30px 0;
            width: fit-content;
            margin-top: 65px;
            /* More room for buttons */
        }

        .stat-item {
            padding: 0 45px;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-val {
            font-size: 3.2rem;
            color: #4fc3f7 !important;
            font-weight: 900;
            line-height: 1;
            display: block;
            font-family: 'Outfit', sans-serif;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 8px;
            display: block;
        }

        .hero-features-list {
            display: flex !important;
            flex-direction: column;
            gap: 50px;
        }

        .hero-feature-item {
            border-left: 4px solid #1e88e5;
            padding-left: 25px;
            max-width: 350px;
        }

        .hero-feature-item.orange {
            border-left-color: #ff7043;
        }

        .hero-feature-item.cyan {
            border-left-color: #4fc3f7;
        }

        .feat-num {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 800;
            margin-bottom: 5px;
            display: block;
        }

        .feat-title {
            font-size: 1.4rem;
            color: #fff;
            font-weight: 800;
            margin-bottom: 10px;
            font-family: 'Outfit', sans-serif;
        }

        .feat-desc {
            font-size: 1rem;
            color: #ffffff !important;
            /* Forced White */
            line-height: 1.5;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            /* Added shadow for readability */
        }

        .btn-explore-sol {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 15px 35px;
            border-radius: 50px;
            color: #fff !important;
            text-decoration: none !important;
            font-weight: 700;
            display: flex !important;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
            backdrop-filter: blur(10px);
        }

        @media (max-width: 991px) {

            /* Fix Grid Stacking */
            .hero-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 40px;
                padding-top: 40px;
            }

            .hero-left {
                order: 1;
                text-align: center;
                padding-right: 0;
            }

            .hero-right {
                order: 2;
                align-items: center !important;
                /* Center features on mobile */
                width: 100%;
            }

            .hero-btns {
                justify-content: center;
                margin: 0 20px;
            }

            .hero-title {
                font-size: 2.8rem !important;
                /* Smaller on mobile */
            }
        }

        /* Scroll behavior and Top Bar social moved to app.css */

        .hero-badge-wrapper {
            margin-bottom: 30px;
        }

        .hero-badge {
            background: rgba(56, 189, 248, 0.1) !important;
            color: #38bdf8 !important;
            border: 1px solid rgba(56, 189, 248, 0.2) !important;
            padding: 10px 24px !important;
            border-radius: 50px !important;
            font-size: 0.85rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 12px !important;
            backdrop-filter: blur(10px) !important;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #38bdf8;
            border-radius: 50%;
            box-shadow: 0 0 10px #38bdf8;
            animation: techPulse 2s infinite;
        }

        @keyframes techPulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .header-flex-container {
            display: flex !important;
            justify-content: flex-start !important;
            /* Changed from space-between */
            align-items: center !important;
            width: 100% !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
            padding: 0 30px !important;
            height: 100% !important;
            gap: 5px !important;
        }

        /* Ensure Navbar wrapper pushes right for layout */
        .nav-center-wrapper {
            margin-left: auto !important;
            /* Forces nav to the right */
            margin-right: 20px !important;
            /* Spacing from CTA */
            padding: 0 !important;
            flex: 0 1 auto !important;
            /* Stop taking full width */
            width: auto !important;
        }

        .logo-wrapper {
            flex-shrink: 0;
            margin-right: auto;
            /* Push against nav if needed, but nav margin-left covers it */
        }

        .logo img {
            height: 44px !important;
            /* Larger professional scale */
            width: auto !important;
            display: block !important;
            transition: 0.3s ease;
        }

        .nav-links {
            display: flex !important;
            gap: 36px !important;
            /* Wider professional spacing */
            margin: 0 !important;
            padding: 0 !important;
            list-style: none !important;
            align-items: center !important;
        }

        .nav-links li {
            margin: 0 !important;
            padding: 0 !important;
            display: flex !important;
            align-items: center !important;
        }

        /* Header right group and logo scaled in app.css */


        .header-right-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }


        /* FIX: Ensure Mega Menu Links are Visible - High Specificity */
        /* FIX: Unified Premium Link Styling for Mega Menus */
        .mega-dropdown-content .mega-links li a,
        .mega-dropdown-content .ind-link-col a {
            color: #0f172a !important;
            font-weight: 600 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 8px 12px !important;
            font-size: 0.95rem !important;
            text-transform: none !important;
            border-radius: 6px;
            transition: all 0.2s ease-in-out !important;
            background: transparent;
        }

        /* Hover Effect - Unified */
        .mega-dropdown-content .mega-links li a:hover,
        .mega-dropdown-content .ind-link-col a:hover {
            color: #2563eb !important;
            /* Premium Blue */
            background: rgba(37, 99, 235, 0.05);
            /* Subtle Blue Bg */
            transform: translateX(5px);
            padding-left: 18px !important;
            /* Dynamic Indent */
        }

        /* Arrow Icon Styling */
        .mega-dropdown-content .mega-links li a i,
        .mega-dropdown-content .ind-link-col a i {
            font-size: 0.8em;
            color: #94a3b8;
            /* Muted slate */
            transition: all 0.2s;
            margin-left: 15px !important;
            /* Force gap between text and arrow */
            flex-shrink: 0;
            /* Prevent icon from shrinking */
        }

        .mega-dropdown-content .mega-links li a:hover i,
        .mega-dropdown-content .ind-link-col a:hover i {
            color: #2563eb;
            transform: translateX(2px);
        }

        .mega-links li a:hover,
        .ind-link-col a:hover {
            color: #3b82f6 !important;
            transform: translateX(5px);
        }

        .mega-cat-title {
            color: #1e293b !important;
            /* Darker for headers */
            font-weight: 800 !important;
        }

        /* Ensure dropdown background is white */
        .mega-dropdown-content,
        .industries-mega {
            background: #ffffff !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1) !important;
            border-top: 3px solid #3b82f6 !important;
        }

        /* --- RESPONSIVE HEADER & MOBILE MENU --- */

        /* Desktop: Hide Mobile Toggle */
        .mobile-nav-toggle {
            display: none !important;
        }

        /* Mobile Breakpoint (Tablet Portrait & below) */
        @media (max-width: 1024px) {

            /* 1. Header Layout Adjustments */
            .header-flex-container {
                padding: 0 20px !important;
                justify-content: space-between !important;
            }

            .nav-center-wrapper {
                margin: 0 !important;
                padding: 0 !important;
                /* Ensure no extra spacing pushes the CTA away */
                position: fixed;
                top: 0;
                right: -100%;
                /* Hidden by default */
                width: 280px;
                height: 100vh;
                background: #0f172a;
                z-index: 9999;
                padding: 80px 20px 40px;
                transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.5);
                display: block !important;
                /* Ensure it's a block for sidebar */
                overflow-y: auto;
            }

            /* Active Mobile Menu */
            body.mobile-nav-active .nav-center-wrapper {
                right: 0;
            }

            .nav-links {
                display: flex !important;
                /* Forced Flex */
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 0 !important;
                width: 100%;
                opacity: 1 !important;
                visibility: visible !important;
                margin-top: 10px;
            }

            .nav-links li {
                width: 100%;
                margin: 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            .nav-links li a {
                padding: 15px 0 !important;
                font-size: 1rem !important;
                display: flex !important;
                justify-content: space-between;
                width: 100%;
                color: #fff !important;
                /* Ensure mobile links are white */
                color: #fff !important;
                /* Ensure mobile links are white */
            }

            .mobile-info-section {
                display: block !important;
            }

            .nav-links li a:hover {
                color: #38bdf8 !important;
            }

            /* Show Hamburger */
            .mobile-nav-toggle {
                display: block !important;
                cursor: pointer;
                z-index: 10000;
                /* Above sidebar */
                width: 30px;
                height: 24px;
                position: relative;
            }

            .hamburger-inner,
            .hamburger-inner span {
                display: block;
                width: 100%;
                height: 2px;
                background: #fff;
                position: relative;
                transition: 0.3s;
                border-radius: 2px;
            }

            .hamburger-inner span {
                position: absolute;
            }

            .hamburger-inner span:nth-child(1) {
                top: 0;
            }

            .hamburger-inner span:nth-child(2) {
                top: 10px;
            }

            .hamburger-inner span:nth-child(3) {
                top: 20px;
            }

            /* Hamburger Animation when Active */
            body.mobile-nav-active .hamburger-inner span:nth-child(1) {
                top: 10px;
                transform: rotate(45deg);
                background: #38bdf8;
            }

            body.mobile-nav-active .hamburger-inner span:nth-child(2) {
                opacity: 0;
            }

            body.mobile-nav-active .hamburger-inner span:nth-child(3) {
                top: 10px;
                transform: rotate(-45deg);
                background: #38bdf8;
            }

            /* Backdrop */
            .mobile-nav-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                backdrop-filter: blur(4px);
                z-index: 9000;
                display: none;
                opacity: 0;
                transition: opacity 0.3s;
            }

            body.mobile-nav-active .mobile-nav-backdrop {
                display: block;
                opacity: 1;
            }

            /* Hide Desktop CTA in Header to save space if needed, or adjust */
            .header-right-group {
                gap: 15px;
            }

            .btn-shiny-cta {
                padding: 8px 16px !important;
                font-size: 0.8rem !important;
            }
        }

        /* Mobile Extra Small */
        @media (max-width: 768px) {
            .top-bar {
                display: flex !important;
                /* Always show top bar */
            }

            /* Fix Top Bar Overflow ("Hide Beside It") */
            .tb-flex {
                padding: 0 10px !important;
            }

            .tb-contact {
                gap: 10px !important;
            }

            .tb-contact span:first-child {
                font-size: 0.8rem !important;
            }

            .tb-contact span:nth-child(2) {
                display: none !important;
                /* Hide email on mobile to prevent cutoff */
            }

            .tb-social {
                gap: 12px !important;
            }

            .tb-social a {
                font-size: 0.95rem !important;
            }

            /* Spacing adjustments moved to app.css */

            .cta-btn-wrapper {
                display: none !important;
                /* Hide CTA button on mobile, put in menu if needed */
            }
        }
        }

        /* Mega Menu Mobile Behavior */
        @media (max-width: 1024px) {

            .mega-dropdown-content,
            .industries-mega {
                position: static !important;
                visibility: visible !important;
                opacity: 1 !important;
                transform: none !important;
                width: 100% !important;
                box-shadow: none !important;
                padding: 0 0 0 15px !important;
                background: transparent !important;
                display: none;
                /* Hidden by default, toggle via JS */
                border: none !important;
            }

            .mega-dropdown.mobile-open .mega-dropdown-content,
            .dropdown-wrapper.mobile-open .industries-mega {
                display: block !important;
                animation: slideDown 0.3s ease;
            }

            .mega-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 20px !important;
            }

            .mega-grid::before {
                display: none !important;
            }

            .mega-col-left {
                display: none !important;
                /* Hide promotional left col on mobile */
            }

            .mega-col-right-grid {
                grid-template-columns: 1fr !important;
                gap: 15px !important;
            }

            .mega-cat-col {
                border: none !important;
                padding: 0 !important;
            }

            .mega-cat-title {
                color: #94a3b8 !important;
                /* White text for dark mobile menu */
                font-size: 0.9rem !important;
                opacity: 0.8;
                margin-top: 15px;
            }

            .mega-links a,
            .ind-link-col a {
                color: rgba(255, 255, 255, 0.7) !important;
                padding: 8px 0 !important;
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-drawer-header {
            display: none;
        }

        /* REFINED MOBILE NAVIGATION DRAWER */
        @media (max-width: 991px) {
            #nav-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(2, 6, 23, 0.85);
                backdrop-filter: blur(8px);
                z-index: 8500;
                opacity: 0;
                visibility: hidden;
                transition: all 0.4s ease;
            }

            .mobile-nav-active #nav-backdrop {
                opacity: 1;
                visibility: visible;
            }

            .nav-center-wrapper {
                position: fixed;
                top: 0;
                right: 0;
                width: 85%;
                max-width: 320px;
                height: 100vh;
                background: #020617;
                padding: 0 !important;
                z-index: 9000 !important;
                box-shadow: -20px 0 60px rgba(0, 0, 0, 0.6);
                transform: translateX(100%);
                visibility: hidden;
                transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.5s;
                overflow-y: auto;
                display: flex !important;
                flex-direction: column !important;
            }

            .mobile-nav-active .nav-center-wrapper {
                transform: translateX(0);
                visibility: visible;
            }

            /* Drawer Header */
            .mobile-drawer-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 25px 20px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                margin-bottom: 20px;
            }

            .drawer-close {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(56, 189, 248, 0.1);
                border: 1px solid rgba(56, 189, 248, 0.2);
                border-radius: 50%;
                color: #38bdf8;
                font-size: 1.2rem;
                cursor: pointer;
            }

            .nav-links {
                padding: 0 20px !important;
                display: flex !important;
                flex-direction: column !important;
                gap: 5px !important;
            }

            .nav-links li {
                width: 100% !important;
                display: block !important;
                height: auto !important;
            }

            .nav-links li a {
                display: flex !important;
                align-items: center !important;
                justify-content: flex-start !important;
                gap: 15px !important;
                padding: 16px 0 !important;
                font-size: 0.95rem !important;
                color: rgba(255, 255, 255, 0.8) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
                text-align: left !important;
                letter-spacing: 1px;
                height: auto !important;
            }

            .nav-links li a i {
                width: 25px;
                text-align: center;
                color: #38bdf8;
                font-size: 1.1rem;
            }

            /* Fix Dropdown Arrows */
            .nav-arrow {
                margin-left: auto !important;
                /* Push arrow to far right */
                color: rgba(255, 255, 255, 0.4);
            }
        }
    </style>
    <!-- GSAP & ScrollTrigger for Cinematic Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const drawerClose = document.getElementById('drawer-close');
            if (drawerClose) {
                drawerClose.addEventListener('click', () => {
                    document.body.classList.remove('mobile-nav-active');
                });
            }
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body
    style="background-color: #000 !important; margin: 0; padding: 0; min-height: 100vh; display: flex; flex-direction: column; overflow-x: hidden;">

    <!-- Tech Loader -->
    <div id="tech-loader">
        <div class="loader-content">
            <div class="tech-circle-outer"></div>
            <div class="tech-circle-inner"></div>
            <div class="tech-text">STUVALLEY</div>
        </div>
    </div>

    <!-- Mobile Nav Backdrop -->
    <div id="nav-backdrop"></div>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="tb-flex">
            <div class="tb-contact">
                <span>
                    <img src="https://flagcdn.com/w20/in.png" alt="India"
                        style="height: 14px; margin-right: 8px; vertical-align: middle;">
                    {{ $global_settings['phone_india'] ?? '+91 9643802216' }}
                </span>
                <span>
                    <i class="fas fa-envelope" style="color: #F4C430; margin-right: 8px;"></i>
                    {{ $global_settings['email_primary'] ?? 'info@stuvalley.com' }}
                </span>
            </div>
            <div class="tb-social">
                <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube" style="color: #ff0000;"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"
                        style="color: #0077b5;"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"
                        style="color: #e1306c;"></i></a>
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"
                        style="color: #1877f2;"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-x-twitter" style="color: #fff;"></i></a>
            </div>
        </div>
    </div>
    <header class="@yield('header_class')">
        <div class="container header-flex-container">

            <!-- 1. LEFT: Logo -->
            <div class="logo-wrapper"> <!-- Push everything else right -->
                <a href="/" class="logo">
                    @if(isset($global_settings['site_logo']))
                        <img src="{{ asset('storage/' . $global_settings['site_logo']) }}"
                            alt="Stuvalley Technology Pvt. Ltd.">
                    @else
                        <img src="{{ asset('images/stuvalley_logo.png') }}" alt="Stuvalley Technology Pvt. Ltd.">
                    @endif
                </a>
            </div>

            <!-- 2. CENTER: Navigation -->
            <!-- 2. CENTER: Navigation (Now Right Aligned) -->
            <!-- 2. CENTER: Navigation (Right Aligned Group) -->
            <!-- 2. CENTER: Navigation (Right Aligned Group) -->
            <nav class="nav-center-wrapper">
                <!-- Mobile Only Header in Drawer -->
                <div class="mobile-drawer-header">
                    <div class="drawer-logo">
                        @if(isset($global_settings['site_logo']))
                            <img src="{{ asset('storage/' . $global_settings['site_logo']) }}"
                                style="height: 35px; filter: brightness(1.2);">
                        @else
                            <img src="{{ asset('images/stuvalley_logo.png') }}"
                                style="height: 35px; filter: brightness(1.2);">
                        @endif
                    </div>
                    <div class="drawer-close" id="drawer-close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>

                <ul class="nav-links">
                    <li><a href="/"><i class="fas fa-home nav-icon"></i> HOME</a></li>
                    <li><a href="/about"><i class="fas fa-user-circle nav-icon"></i> ABOUT</a></li>

                    <!-- Mega Menu Trigger -->
                    <li class="dropdown mega-dropdown">
                        <a href="{{ route('services.index') }}" class="dropbtn">
                            <i class="fas fa-briefcase nav-icon"></i> SERVICES <span class="nav-arrow">▼</span>
                        </a>
                        <!-- Mega Menu Content -->
                        <div class="mega-dropdown-content">
                            <div class="mega-grid">
                                <!-- Left Column: Intro & Highlight -->
                                <div class="mega-col-left">
                                    <div class="mega-intro-content">
                                        <span class="mega-badge">SERVICES</span>
                                        <h3 class="mega-intro-title">We transform your ideas into scalable digital
                                            products with expert development.</h3>
                                        <a href="{{ route('services.index') }}" class="mega-cta-btn">
                                            View All Services <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                    <div class="mega-highlight-card">
                                        <div class="mhc-bg-glow"></div>
                                        <div class="mhc-inner">
                                            <h4 class="mhc-count">500+</h4>
                                            <p class="mhc-label">Successful Projects</p>
                                            <div class="mhc-tags">
                                                <span class="mhc-tag"><i class="fas fa-rocket"></i> Startups</span>
                                                <span class="mhc-tag"><i class="fas fa-building"></i> Enterprises</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column: Service Categories -->
                                <div class="mega-col-right-grid">
                                    <!-- Cat 1: Web Dev -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-laptop-code"></i> Website
                                            Development</h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'business-website') }}">Business
                                                    Website <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'custom-web-development') }}">Custom
                                                    Web Dev <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'wordpress-development') }}">WordPress
                                                    development <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'website-redesign') }}">Website
                                                    redesign <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Cat 2: Ecommerce -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-shopping-cart"></i> Ecommerce
                                            Solutions</h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'ecommerce-website') }}">Ecommerce
                                                    website <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'shopify-development') }}">Shopify
                                                    development <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'woocommerce') }}">WooCommerce store
                                                    <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'payment-gateway') }}">Payment
                                                    gateway <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Cat 3: App Dev -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-mobile-alt"></i> App Development
                                        </h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'android-app-development') }}">Android
                                                    app <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'ios-app-development') }}">iOS app <i
                                                        class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'hybrid-app-development') }}">Hybrid
                                                    app development <i class="fas fa-chevron-right arrow-anim"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Cat 4: Digital Marketing -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-chart-line"></i> Digital Marketing
                                        </h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'digital-marketing') }}">Digital
                                                    Marketing <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'seo-services') }}">SEO services <i
                                                        class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'google-ads') }}">Google Ads
                                                    management <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'social-media') }}">Social media
                                                    marketing <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Cat 5: Branding -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-palette"></i> Branding & Design</h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'logo-design') }}">Logo design <i
                                                        class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'ui-ux-design') }}">UI/UX design <i
                                                        class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'graphic-design') }}">Graphic design
                                                    <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Cat 6: Support -->
                                    <div class="mega-cat-col">
                                        <h4 class="mega-cat-title"><i class="fas fa-tools"></i> Support & Hosting</h4>
                                        <ul class="mega-links">
                                            <li><a href="{{ route('services.show', 'website-maintenance') }}">Maintenance
                                                    <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'hosting-domain') }}">Hosting &
                                                    domain <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                            <li><a href="{{ route('services.show', 'website-security') }}">Website
                                                    security <i class="fas fa-chevron-right arrow-anim"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown mega-dropdown industries-menu">
                        <a href="{{ route('industries.index') }}" class="dropbtn">
                            <i class="fas fa-layer-group nav-icon"></i> INDUSTRIES <span class="nav-arrow">▼</span>
                        </a>
                        <div class="mega-dropdown-content industries-mega">
                            <div class="ind-wrapper">
                                <!-- Col 1: Info -->
                                <div class="ind-info-col">
                                    <h3 class="ind-title">Industries</h3>
                                    <div class="ind-divider"></div>
                                    <p class="ind-desc">We focus on each domain's unique risks and opportunities,
                                        delivering agile and effective digital solutions tailored to your business
                                        needs.
                                    </p>
                                    <a href="{{ route('industries.index') }}" class="ind-view-all">View all <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>

                                <!-- Col 2: Links Grid -->
                                <!-- Col 2: Links Grid -->
                                <div class="ind-links-grid">
                                    <div class="ind-link-col">
                                        <a href="{{ route('industries.show', 'on-demand') }}">On-Demand <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'enterprise') }}">Enterprise <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'finance') }}">Finance <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'e-commerce') }}">E-commerce <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'game') }}">Game <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                    <div class="ind-link-col">
                                        <a href="{{ route('industries.show', 'healthcare') }}">Healthcare <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'travel') }}">Travel <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'logistics') }}">Logistics <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'start-up') }}">Start-Up <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'entertainment') }}">Entertainment <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                    <div class="ind-link-col">
                                        <a href="{{ route('industries.show', 'real-estate') }}">Real Estate <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'education') }}">Education <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'electric-vehicle') }}">Electric Vehicle <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'automotive') }}">Automotive <i
                                                class="fas fa-chevron-right"></i></a>
                                        <a href="{{ route('industries.show', 'wearable') }}">Wearable <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>

                                <!-- Col 3: Image -->
                                <div class="ind-image-col">
                                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                                        alt="Industries Team">
                                </div>
                            </div>
                        </div>
                    </li>

                    <style>
                        /* --- INDUSTRIES LIGHT MEGA MENU SPECIFIC --- */

                        /* Override base mega styles for this specific menu to match schematic in Light Mode */
                        .mega-dropdown-content.industries-mega {
                            background: #ffffff !important;
                            /* White Background */
                            color: #1e293b !important;
                            /* Dark Slate Text */
                            border: 1px solid #e2e8f0 !important;
                            border-top: 4px solid #3b82f6 !important;
                            box-shadow: 0 20px 40px -5px rgba(0, 0, 0, 0.1), 0 10px 20px -5px rgba(0, 0, 0, 0.04) !important;
                        }

                        .ind-wrapper {
                            display: grid;
                            grid-template-columns: 1.2fr 2.5fr 1.5fr;
                            gap: 60px;
                            padding: 30px;
                        }

                        /* Left Info */
                        .ind-title {
                            font-size: 1.5rem;
                            font-weight: 700;
                            color: #0f172a;
                            /* Dark Title */
                            margin-bottom: 15px;
                            font-family: 'Manrope', sans-serif;
                        }

                        .ind-divider {
                            height: 2px;
                            width: 100%;
                            background: #e2e8f0;
                            /* Light Gray */
                            margin-bottom: 20px;
                            position: relative;
                        }

                        .ind-divider::after {
                            content: '';
                            position: absolute;
                            left: 0;
                            top: 0;
                            height: 100%;
                            width: 60px;
                            background: #0f172a;
                            /* Dark Active Line */
                        }

                        .ind-desc {
                            font-size: 0.9rem;
                            line-height: 1.6;
                            color: #64748b;
                            /* Slate 500 */
                            margin-bottom: 25px;
                        }

                        .ind-view-all {
                            display: inline-flex;
                            align-items: center;
                            gap: 8px;
                            color: #0f172a;
                            font-weight: 700;
                            text-decoration: none;
                            text-transform: uppercase;
                            font-size: 0.8rem;
                            transition: var(--transition);
                        }

                        .ind-view-all:hover {
                            color: #38bdf8;
                            gap: 12px;
                        }

                        /* Middle Links */
                        .ind-links-grid {
                            display: grid;
                            grid-template-columns: repeat(3, 1fr);
                            gap: 30px;
                        }

                        .ind-link-col {
                            display: flex;
                            flex-direction: column;
                            gap: 12px;
                        }

                        /* Specificity Override: REMOVED - Using Global Unified Style */
                        /* The logic has been moved to the shared block around line 872 for consistency */
                        .ind-links-grid .ind-link-col a {
                            /* Inherits from global block */
                        }

                        .ind-links-grid .ind-link-col a:hover {
                            /* Inherits */
                        }

                        /* Fix for inherited line-cross issue */
                        .ind-link-col a::after,
                        .ind-link-col a::before {
                            display: none !important;
                        }

                        /* Right Image */
                        .ind-image-col img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            border-radius: 12px;
                            min-height: 250px;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                        }

                        /* Mobile Industries - Simple Stack */
                        @media (max-width: 991px) {
                            .ind-wrapper {
                                display: flex;
                                flex-direction: column;
                                gap: 30px;
                            }

                            .ind-links-grid {
                                grid-template-columns: 1fr 1fr;
                            }

                            .ind-image-col {
                                display: none;
                                /* Hide image on mobile to save space */
                            }
                        }
                    </style>
                    <li><a href="{{ route('blog') }}"><i class="fas fa-blog nav-icon"></i> BLOG</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fas fa-envelope nav-icon"></i> CONTACT</a></li>

                </ul>
            </nav>

            <!-- 3. RIGHT: CTA + Mobile Toggle -->
            <div class="header-right-group">
                <div class="cta-btn-wrapper">
                    <a href="javascript:void(0)" onclick="openContactModal(event)" class="btn-shiny-cta">
                        GET A FREE CONSULTATION! <i class="fas fa-paper-plane"
                            style="margin-left: 8px; font-size: 0.9em;"></i>
                    </a>
                </div>

                <!-- Mobile Nav Toggle -->
                <div class="mobile-nav-toggle" id="mobile-toggle">
                    <div class="hamburger-inner">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <style>
                /* --- RE-DESIGNED MEGA DROPDOWN (PREMIUM LIGHT THEME) --- */

                /* Static parent for mega alignment */
                .mega-dropdown {
                    position: static !important;
                }

                .mega-dropdown-content {
                    /* Layout & Centering */
                    visibility: hidden;
                    opacity: 0;
                    position: absolute;
                    left: 50%;
                    top: 100%;
                    width: 95vw;
                    max-width: 1320px;
                    transform: translateX(-50%) translateY(20px);
                    z-index: 9999;
                    margin-top: 15px;

                    /* Premium Light Layout */
                    background: #ffffff;
                    /* Pure White */
                    padding: 32px;
                    border-radius: 16px;
                    border: 1px solid rgba(0, 0, 0, 0.08);
                    /* Subtle border */
                    box-shadow:
                        0 20px 60px -10px rgba(0, 0, 0, 0.1),
                        /* Soft diffuse shadow */
                        0 0 0 1px rgba(0, 0, 0, 0.03);

                    /* Transitions */
                    transition:
                        opacity 240ms ease-out,
                        transform 240ms ease-out,
                        visibility 240ms;
                    transition-delay: 120ms;
                    pointer-events: none;
                }

                /* Invisible Bridge - ROBUST FIX */
                .mega-dropdown-content::before {
                    content: '';
                    position: absolute;
                    top: -40px;
                    /* Increased to cover larger gap */
                    left: 0;
                    width: 100%;
                    height: 50px;
                    /* Increased height */
                    background: transparent;
                    z-index: -1;
                    /* Ensure checking this doesn't block clicks on parent if needed, but usually fine for hover */
                }

                .mega-dropdown:hover .mega-dropdown-content,
                /* Added industries-menu specific selector just in case */
                .industries-menu:hover .mega-dropdown-content {
                    visibility: visible;
                    opacity: 1;
                    transform: translateX(-50%) translateY(0);
                    transition-delay: 0s;
                    pointer-events: auto;
                }

                .mega-grid {
                    display: grid;
                    grid-template-columns: 280px 1fr;
                    /* Slightly wider left col */
                    gap: 40px;
                    position: relative;
                }

                /* Vertical Separator */
                .mega-grid::before {
                    content: '';
                    position: absolute;
                    left: 280px;
                    top: 0;
                    bottom: 0;
                    width: 1px;
                    background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.06) 20%, rgba(0, 0, 0, 0.06) 80%, transparent);
                }

                .mega-col-left {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .mega-badge {
                    display: inline-block;
                    font-size: 0.7rem;
                    color: #0ea5e9;
                    /* Sky blue */
                    background: rgba(14, 165, 233, 0.1);
                    border: 1px solid rgba(14, 165, 233, 0.2);
                    padding: 6px 14px;
                    border-radius: 100px;
                    font-weight: 800;
                    letter-spacing: 1px;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                }

                .mega-intro-title {
                    font-size: 1.35rem;
                    color: #1e293b;
                    /* Slate 800 */
                    line-height: 1.35;
                    font-weight: 800;
                    margin-bottom: 20px;
                    letter-spacing: -0.5px;
                }

                .mega-cta-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    gap: 10px;
                    background: #0f172a;
                    /* Dark Navy Button for Contrast */
                    color: #fff;
                    text-decoration: none;
                    padding: 14px 24px;
                    border-radius: 8px;
                    font-weight: 700;
                    font-size: 0.9rem;
                    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
                }

                .mega-cta-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 10px 20px rgba(15, 23, 42, 0.25);
                    background: #1e293b;
                    color: #fff;
                }

                .mega-highlight-card {
                    margin-top: 30px;
                    background: #f8fafc;
                    /* Very light gray/slate */
                    border-radius: 12px;
                    border: 1px solid #e2e8f0;
                    padding: 20px;
                    position: relative;
                    overflow: hidden;
                }

                /* Highlight Card Light Theme */
                .mhc-bg-glow {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 150px;
                    height: 150px;
                    background: rgba(37, 99, 235, 0.05);
                    /* Very faint blue */
                    filter: blur(50px);
                    pointer-events: none;
                }

                .mhc-count {
                    font-size: 2rem;
                    color: #1e293b;
                    /* Dark Slate */
                    font-weight: 900;
                    margin-bottom: 4px;
                }

                .mhc-label {
                    font-size: 0.85rem;
                    color: #64748b;
                    /* Slate 500 */
                    margin-bottom: 16px;
                    font-weight: 600;
                }

                .mhc-tags {
                    display: flex;
                    gap: 10px;
                }

                .mhc-tag {
                    font-size: 0.75rem;
                    background: #f1f5f9;
                    /* Light Gray */
                    padding: 4px 10px;
                    border-radius: 6px;
                    color: #475569;
                    /* Slate 600 */
                    border: 1px solid #e2e8f0;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                }

                /* Right Column Grid Layout */
                .mega-col-right-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 24px;
                    position: relative;
                }

                /* Vertical dividers */
                .mega-cat-col:not(:nth-child(3n)) {
                    border-right: 1px solid rgba(0, 0, 0, 0.06);
                    padding-right: 20px;
                }

                .mega-cat-title {
                    font-size: 0.9rem;
                    color: #000000 !important;
                    /* Pure Black for headers */
                    font-weight: 800;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    margin-bottom: 12px;
                    letter-spacing: 0.5px;
                }

                .mega-cat-title i {
                    color: #2563eb;
                    font-size: 1.1em;
                }

                .mega-links {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    gap: 2px;
                }

                .mega-links li {
                    width: 100%;
                }

                .mega-links a {
                    width: 100% !important;
                    /* Force full width for alignment */
                    display: flex !important;
                    align-items: center !important;
                    justify-content: space-between !important;
                    /* Push arrow to right */
                    padding: 8px 10px;
                    color: #0f172a !important;
                    /* Darker Slate/Black for links */
                    text-decoration: none;
                    font-size: 0.9rem;
                    /* Slightly larger */
                    border-radius: 6px;
                    transition: all 0.2s ease-out;
                    font-weight: 600;
                    /* Bolder weight */
                    line-height: 1.3;
                }

                .mega-links a:hover {
                    background: #f1f5f9;
                    /* Light Hover */
                    color: #0284c7;
                    /* Sky 600 */
                    transform: translateX(4px);
                }

                /* Active State */
                .mega-links a.active {
                    background: #eff6ff;
                    color: #2563eb;
                    font-weight: 700;
                }

                .arrow-anim {
                    font-size: 0.7rem;
                    opacity: 0;
                    transform: translateX(-10px);
                    transition: all 0.3s ease;
                    color: #0284c7;
                }

                .mega-links a:hover .arrow-anim {
                    opacity: 1;
                    transform: translateX(0);
                }

                /* Fix Hover Line for Mega Menu Links */
                .nav-links .mega-links a::after {
                    display: none;
                    /* Remove the header's underline effect for dropdown items */
                }
            </style>


            </nav>
        </div>
        <!-- Mobile Nav Backdrop -->
        <div class="mobile-nav-backdrop" id="nav-backdrop"></div>
    </header>

    <main class="main-content">
        @yield('content')
        {{-- @include('partials.contact-form') --}}
    </main>

    <footer id="main-footer">
        <div class="footer-glow"></div>
        <div class="footer-border-top"></div>

        <div class="footer-container">

            <!-- Top Section: 3-Col Layout -->
            <div class="footer-top-grid">

                <!-- 1. Brand & Identity (Balanced) -->
                <div class="ft-col-brand">
                    <div class="brand-content-wrapper" style="padding: 0 0 20px 0;">
                        <a href="/" class="ft-logo">
                            @if(isset($global_settings['site_logo']))
                                <img src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Stuvalley"
                                    style="height: 50px; width: auto;">
                            @else
                                <img src="{{ asset('images/stuvalley_logo.png') }}" alt="Stuvalley"
                                    style="height: 50px; width: auto;">
                            @endif
                        </a>

                        <div class="tagline-wrapper">
                            <p class="ft-tagline">Transforming idea to e-nnovation</p>
                            <div class="tagline-accent"></div>
                        </div>

                        <!-- Partner Logos -->
                        <div class="ft-partners-row">
                            <i class="fab fa-google" title="Google Partner"></i>
                            <i class="fab fa-meta" title="Meta Business Partner"></i>
                            <i class="fas fa-ad" title="Google Ads"></i>
                            <i class="fab fa-shopify" title="Shopify Partner"></i>
                        </div>

                        <!-- Trusted By Badge -->
                        <div class="trusted-badge-enhanced">
                            <span class="tb-label">TRUSTED BY LEADING COMPANIES</span>
                            <div class="tb-logos">
                                @php
                                    $footer_partners = \App\Models\Partner::where('is_active', true)->orderBy('sort_order')->take(4)->get();
                                @endphp
                                @foreach($footer_partners as $partner)
                                    @if(Str::startsWith($partner->logo, 'http'))
                                        <img src="{{ $partner->logo }}" alt="{{ $partner->name }}">
                                    @else
                                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Interactive Contact Card (Refined Spacing) -->
                <div class="ft-col-contact">
                    <div class="glass-card contact-card">
                        <h4 class="card-heading">Contact Us</h4>

                        <ul class="contact-list">
                            <li>
                                <a href="mailto:{{ $global_settings['email_support'] ?? 'info@stuvalley.com' }}">
                                    <div class="c-icon"><i class="fas fa-envelope"></i></div>
                                    <span>{{ $global_settings['email_support'] ?? 'info@stuvalley.com' }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $global_settings['website_url'] ?? '#' }}">
                                    <div class="c-icon"><i class="fas fa-globe"></i></div>
                                    <span>{{ $global_settings['website_url'] ?? 'www.stuvalley.com' }}</span>
                                </a>
                            </li>
                            <li>
                                <div class="c-item">
                                    <div class="c-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <span
                                        class="address-text">{!! e($global_settings['address_india'] ?? 'M 13, Sector 14, near SBI, Block M, Old DLF, Gurugram, India') !!}</span>
                                </div>
                            </li>
                            <li>
                                <a href="tel:{{ $global_settings['phone_india_landline'] ?? '0124-4252-196' }}">
                                    <div class="c-icon"><i class="fas fa-phone-alt"></i></div>
                                    <span>{{ $global_settings['phone_india_landline'] ?? '0124-4252-196' }}</span>
                                </a>
                            </li>
                        </ul>

                        <div class="mini-cta">
                            <span>Let’s discuss your project</span>
                            <a href="{{ route('contact') }}" class="btn-mini-tech">Get Quote <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="social-row">
                            @if(isset($global_social_links))
                                @foreach($global_social_links as $link)
                                    <a href="{{ $link->url }}" target="_blank" class="s-btn"><i
                                            class="{{ $link->icon }}"></i></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- 3. Tech Map Card (Centered Title) -->
                <div class="ft-col-map">
                    <div class="glass-card map-card">
                        <div class="map-header">
                            <i class="fas fa-map-pin map-pin-anim"></i>
                            <span class="map-title-text">Find Us on Google Maps</span>
                        </div>
                        <div class="map-frame-wrapper">
                            <iframe
                                src="{{ $global_settings['google_map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14030.765692019864!2d77.0456187!3d28.4713915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d190479d5057d%3A0xe54eaf95542289!2zTCAxMywgU2VjdG9yIDE0LCBHdXJ1Z3JhbSwgSGFyeWFuYSAxMjIwMDE!5e0!3m2!1sen!2sin!4v1706256000000!5m2!1sen!2sin' }}"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            <!-- Removed overlay to keep map fully interactive and bright -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Links Grid: 4 Columns -->
            <div class="footer-links-grid">
                <!-- Col 1 -->
                <div class="fl-col">
                    <h5>SERVICES</h5>
                    <ul>
                        <li><a href="{{ route('services.show', 'web-development') }}">Web Development</a></li>
                        <li><a href="{{ route('services.show', 'mobile-app-development') }}">Mobile App Development</a>
                        </li>
                        <li><a href="{{ route('services.show', 'custom-application') }}">Custom Application</a></li>
                        <li><a href="{{ route('services.show', 'web-design') }}">Web Design</a></li>
                        <li><a href="{{ route('services.show', 'brand-design') }}">Brand Design</a></li>
                        <li><a href="{{ route('services.show', 'api-development') }}">API Development</a></li>
                        <li><a href="{{ route('services.show', 'saas-application') }}">SaaS Application</a></li>
                        <li><a href="{{ route('services.show', 'seo-services') }}">SEO Services</a></li>
                    </ul>
                </div>
                <!-- Col 2 -->
                <div class="fl-col">
                    <h5>SOLUTIONS</h5>
                    <ul>
                        <li><a href="{{ route('solutions.show', 'erp-solution') }}">ERP Solution</a></li>
                        <li><a href="{{ route('solutions.show', 'cms-solution') }}">CMS Solution</a></li>
                        <li><a href="{{ route('solutions.show', 'crm-solution') }}">CRM Solution</a></li>
                        <li><a href="{{ route('solutions.show', 'lms-solution') }}">LMS Solution</a></li>
                        <li><a href="{{ route('solutions.show', 'hrm-solution') }}">HRM Solution</a></li>
                        <li><a href="{{ route('solutions.show', 'pos-solution') }}">POS Solution</a></li>
                    </ul>
                </div>
                <!-- Col 3 -->
                <div class="fl-col">
                    <h5>INDUSTRIES</h5>
                    <ul>
                        <li><a href="{{ route('industries.show', 'e-commerce-multi-vendor') }}">E-commerce &
                                Multi-Vendor</a></li>
                        <li><a href="{{ route('industries.show', 'real-estate-construction') }}">Real Estate &
                                Construction</a></li>
                        <li><a href="{{ route('industries.show', 'travel-hospitality') }}">Travel & Hospitality</a></li>
                        <li><a href="{{ route('industries.show', 'medical-healthcare') }}">Medical & Healthcare</a></li>
                        <li><a href="{{ route('industries.show', 'edtech-e-learning') }}">EdTech & E-Learning</a></li>
                        <li><a href="{{ route('industries.show', 'finance-insurance') }}">Finance & Insurance</a></li>
                        <li><a href="{{ route('industries.show', 'manufacturing') }}">Manufacturing</a></li>
                    </ul>
                </div>
                <!-- Col 4 -->
                <div class="fl-col">
                    <h5>COMPANY</h5>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('careers') }}">Careers</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom Bar (Polished) -->
            <div class="footer-bottom-bar">
                <div class="copyright-text">
                    &copy; 2026 Stuvalley Technology Pvt Ltd. All rights reserved.
                </div>
                <div class="secure-payments">
                    <span>Secure Payments</span>
                    <div class="pay-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-stripe"></i>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* --- FOOTER MAIN STYLES --- */
            #main-footer {
                background: linear-gradient(180deg, #0a0a0d 0%, #000000 100%);
                position: relative;
                padding: 80px 0;
                /* Balanced padding top and bottom */
                overflow: visible !important;
                /* Allow hover effects and cards to breathe */
                font-family: 'Manrope', sans-serif;
                color: #e2e8f0;
            }

            .footer-glow {
                position: absolute;
                top: -300px;
                left: 50%;
                transform: translateX(-50%);
                width: 1200px;
                height: 800px;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.06) 0%, transparent 60%);
                pointer-events: none;
                z-index: 1;
            }

            .footer-border-top {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 1px;
                background: linear-gradient(90deg, transparent 0%, rgba(59, 130, 246, 0.5) 50%, transparent 100%);
                box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
            }

            /* --- TOP GRID --- */
            .footer-top-grid {
                display: grid;
                grid-template-columns: 2fr repeat(2, minmax(240px, 1fr));
                gap: 30px;
                margin-bottom: 80px;
                /* align-items: stretch; (Default) ensures equal height */
            }

            /* 1. BRAND COL (Improved) */
            .ft-col-brand .ft-logo img {
                transition: transform 0.3s ease;
            }

            .ft-tagline {
                font-family: 'Playfair Display', serif;
                font-style: italic;
                font-size: 1.8rem;
                color: #ffffff;
                margin: 25px 0 0;
                line-height: 1.2;
            }

            .tagline-accent {
                width: 70px;
                height: 3px;
                background: linear-gradient(90deg, #3b82f6, #06b6d4);
                margin-top: 15px;
                /* Spacing */
                margin-bottom: 35px;
                border-radius: 2px;
                box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
                /* Glow */
            }

            .ft-partners-row {
                display: flex;
                gap: 25px;
                align-items: center;
                margin-bottom: 40px;
            }

            .ft-partners-row img,
            .ft-partners-row i {
                height: 24px;
                width: auto;
                text-align: center;
                filter: grayscale(100%) opacity(0.6);
                transition: all 0.4s ease;
                cursor: pointer;
            }

            .ft-partners-row i {
                font-size: 24px;
                color: #fff;
            }

            .ft-partners-row img:hover,
            .ft-partners-row i:hover {
                filter: grayscale(0%) opacity(1);
                transform: scale(1.1);
            }

            .ft-partners-row i:hover {
                color: #96bf48;
                /* Shopify Green */
            }

            .trusted-badge-enhanced {
                display: inline-flex;
                flex-direction: column;
                gap: 12px;
                padding: 16px 20px;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 12px;
                backdrop-filter: blur(5px);
            }

            .tb-label {
                font-size: 0.65rem;
                font-weight: 700;
                color: #64748b;
                letter-spacing: 1.5px;
                text-transform: uppercase;
            }

            .tb-logos {
                display: flex;
                gap: 20px;
                align-items: center;
            }

            .tb-logos img {
                height: 20px;
                width: auto;
                filter: grayscale(100%) invert(1) brightness(0.7);
                opacity: 0.7;
                transition: 0.3s;
            }

            .tb-logos img:hover {
                filter: grayscale(0%);
                opacity: 1;
            }

            /* 2. CONTACT CARD (Refined) */
            .glass-card {
                background: rgba(20, 20, 25, 0.6);
                backdrop-filter: blur(14px);
                border: 1px solid rgba(255, 255, 255, 0.08);
                border-radius: 20px;
                padding: 30px 20px;
                /* Compact padding for narrower cards */
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
                transition: transform 0.4s ease, border-color 0.4s ease;
                display: flex;
                /* Ensure stretch */
                flex-direction: column;
            }

            .glass-card:hover {
                transform: translateY(-5px);
                border-color: rgba(59, 130, 246, 0.5);
                background: rgba(15, 15, 20, 0.95) !important;
                /* Force Dark Theme */
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            }

            .card-heading {
                font-size: 1.1rem;
                font-weight: 700;
                color: #fff;
                margin-top: 25px;
                margin-bottom: 25px;
                letter-spacing: 0.5px;
                text-transform: uppercase;
            }

            .contact-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .contact-list li {
                margin-bottom: 22px;
                /* Increased Spacing */
            }

            .contact-list a,
            .contact-list .c-item {
                display: flex;
                align-items: flex-start;
                /* Better for multi-line text */
                gap: 18px;
                /* More gap */
                color: #bdc5d1;
                text-decoration: none;
                font-size: 0.95rem;
                transition: color 0.3s ease;
            }

            .contact-list a:hover {
                color: #fff;
            }

            .c-icon {
                width: 38px;
                height: 38px;
                background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(6, 182, 212, 0.1));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #3b82f6;
                font-size: 0.9rem;
                border: 1px solid rgba(59, 130, 246, 0.2);
                flex-shrink: 0;
                transition: 0.3s;
            }

            .contact-list li:hover .c-icon {
                background: linear-gradient(135deg, #3b82f6, #06b6d4);
                color: #fff;
                box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
                transform: scale(1.1);
            }

            .address-text {
                line-height: 1.7;
                /* Increased line-height */
                font-size: 0.9rem;
            }

            .mini-cta {
                margin-top: auto;
                /* Push to bottom if space allows */
                padding-top: 25px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 15px;
                flex-wrap: wrap;
            }

            .mini-cta span {
                font-size: 0.85rem;
                color: #94a3b8;
                font-weight: 600;
            }

            .btn-mini-tech {
                font-size: 0.8rem;
                font-weight: 700;
                color: #fff;
                background: linear-gradient(90deg, #3b82f6, #2563eb);
                padding: 10px 22px;
                /* Increased for better touch target */
                border-radius: 30px;
                text-decoration: none;
                transition: 0.3s;
                box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            }

            .btn-mini-tech:hover {
                background: linear-gradient(90deg, #2563eb, #1d4ed8);
                transform: translateX(3px);
            }

            /* 3. SOCIAL ICONS (Highlight Style) */
            .social-row {
                display: flex;
                gap: 15px;
                margin-top: 30px;
            }

            .s-btn {
                position: relative;
                width: 48px;
                height: 48px;
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #000;
                font-size: 1.1rem;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                background: #ffffff;
                text-decoration: none;
                overflow: hidden;
            }

            .s-btn i {
                color: #000;
                transition: color 0.3s ease;
            }

            /* Underline Highlight Effect */
            .s-btn::after {
                content: '';
                position: absolute;
                bottom: 8px;
                left: 50%;
                transform: translateX(-50%);
                width: 12px;
                height: 2px;
                background: #fff;
                border-radius: 4px;
                opacity: 0;
                transition: all 0.3s ease;
                box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
            }

            .s-btn:hover {
                transform: translateY(-5px);
                border-color: rgba(255, 255, 255, 0.3);
                background: rgba(255, 255, 255, 0.08);
            }

            .s-btn:hover::after {
                opacity: 1;
                width: 20px;
            }

            /* Brand Specific Hover Colors */
            .s-btn:hover .fa-youtube {
                color: #ff0000;
            }

            .s-btn:hover .fa-linkedin,
            .s-btn:hover .fa-linkedin-in {
                color: #0077b5;
            }

            .s-btn:hover .fa-instagram {
                color: #e4405f;
            }

            .s-btn:hover .fa-facebook,
            .s-btn:hover .fa-facebook-f {
                color: #1877f2;
            }

            .s-btn .fa-x-twitter,
            .s-btn .fa-twitter {
                color: #000 !important;
            }

            .s-btn:hover .fa-x-twitter,
            .s-btn:hover .fa-twitter {
                color: #fff !important;
            }

            .s-btn:hover .fa-github {
                color: #fff;
            }

            .s-btn:hover i {
                filter: drop-shadow(0 0 8px currentColor);
            }

            .contact-card {
                width: 100%;
                max-width: 100%;
                height: auto;
                /* Allow growth */
                min-height: auto;

            }

            .map-card {
                width: 100%;
                max-width: 100%;
                height: 100%;
                /* Stretch to match contact card */
                min-height: auto;
            }

            .contact-card,
            .map-card {
                display: flex;
                flex-direction: column;
                align-items: stretch;
                padding: 30px 25px;
                /* Balanced padding */
                overflow: visible !important;
                /* Allow content to be fully seen */
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.05);
                margin: 0 !important;
                /* Let grid handle spacing */
                width: 100% !important;
                background: #0a0a0d !important;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
                position: relative;
                z-index: 2;
            }

            .map-card:hover {
                padding: 5% 10%;
                /* Full bleed on hover too */
                transform: translateY(-5px) scale(1.02);
                border-color: rgba(59, 130, 246, 0.5);
                background: rgba(15, 15, 20, 0.98) !important;
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
            }

            .map-header {
                width: 100%;
                padding: 15px 25px;
                background: #000000;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                border-radius: 12px 12px 0 0;
            }

            .map-title-text {
                font-size: 0.95rem;
                font-weight: 700;
                color: #fff;
                letter-spacing: 0.5px;
            }

            .map-pin-anim {
                color: #f43f5e;
                animation: bounce 2s infinite;
            }

            .map-frame-wrapper {
                width: 100%;
                flex-grow: 1;
                /* Fill remaining space */
                margin-top: 15px;
                /* Small consistent gap */
                position: relative;
                border-radius: 12px;
                overflow: hidden;
                border: none;
                background: #111;
                min-height: 250px;
            }

            .map-frame-wrapper iframe {
                width: 100%;
                height: 100%;
                border: 0;
                position: absolute;
                top: 0;
                left: 0;
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-5px);
                }
            }

            /* --- FOOTER LINKS GRID --- */
            .footer-links-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 40px;
                margin-bottom: 80px;
            }

            .fl-col h5 {
                font-size: 0.85rem;
                font-weight: 800;
                color: #fff;
                letter-spacing: 1.2px;
                margin-bottom: 25px;
                position: relative;
                display: inline-block;
            }

            .fl-col h5::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: -8px;
                width: 25px;
                height: 2px;
                background: #3b82f6;
            }

            .fl-col ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .fl-col ul li {
                margin-bottom: 14px;
            }

            .fl-col ul li a {
                color: #94a3b8;
                text-decoration: none;
                font-size: 0.95rem;
                transition: all 0.3s;
                display: flex;
                align-items: center;
                position: relative;
                overflow: hidden;
            }

            .fl-col ul li a::before {
                content: '→';
                position: absolute;
                left: -20px;
                opacity: 0;
                transition: 0.3s;
                color: #3b82f6;
                font-size: 0.9rem;
            }

            .fl-col ul li a:hover {
                color: #fff;
                padding-left: 20px;
            }

            .fl-col ul li a:hover::before {
                left: 0;
                opacity: 1;
            }

            /* --- BOTTOM BAR --- */
            .footer-bottom-bar {
                border-top: 1px solid rgba(255, 255, 255, 0.08);
                /* Divider */
                padding: 30px 0 50px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 20px;
            }

            .copyright-text {
                font-size: 0.9rem;
                color: #64748b;
                font-weight: 500;
            }

            .secure-payments {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .secure-payments span {
                font-size: 0.8rem;
                font-weight: 600;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .pay-icons i {
                font-size: 1.5rem;
                color: #94a3b8;
                margin-left: 10px;
                transition: 0.3s;
            }

            .pay-icons i:hover {
                color: #fff;
                transform: scale(1.1);
            }

            /* --- NEW RESPONSIVE CONTAINER --- */
            .footer-container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 40px;
                z-index: 2;
                position: relative;
            }

            /* --- RESPONSIVE --- */
            @media (max-width: 1400px) {
                .footer-container {
                    padding: 0 30px;
                }

                .footer-top-grid {
                    gap: 20px;
                }

                .brand-card,
                .contact-card,
                .map-card {
                    padding: 25px 20px;
                }

                .ft-tagline {
                    font-size: 1.3rem;
                }
            }

            @media (max-width: 1200px) {
                .footer-top-grid {
                    grid-template-columns: 1fr 1.1fr 1fr;
                }

                .ft-tagline {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 1024px) {
                .footer-top-grid {
                    grid-template-columns: 1fr;
                    /* Stack everything */
                    gap: 40px;
                }

                .ft-col-brand,
                .ft-col-contact,
                .ft-col-map {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                }

                .ft-col-map {
                    grid-column: 1 / -1;
                    min-height: 350px;
                }

                .brand-card,
                .contact-card,
                .map-card {
                    min-height: auto;
                }

                .footer-links-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 30px;
                }
            }

            @media (max-width: 768px) {
                #main-footer {
                    padding: 60px 0 0;
                }

                .footer-container {
                    padding: 0 20px;
                }

                .footer-top-grid {
                    grid-template-columns: 1fr;
                    gap: 30px;
                }

                .ft-tagline {
                    font-size: 1.4rem;
                }

                .footer-links-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .footer-bottom-bar {
                    flex-direction: column;
                    text-align: center;
                }
            }

            @media (max-width: 480px) {
                .footer-links-grid {
                    grid-template-columns: 1fr;
                }

                .tb-logos {
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .mini-cta {
                    flex-direction: column;
                    gap: 20px;
                    text-align: center;
                    align-items: center;
                }

                .contact-card,
                .map-card {
                    padding: 0 15px 30px;
                }

                .ft-tagline {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 360px) {

                .contact-card,
                .map-card {
                    padding: 0 10px 25px;
                }

                .c-icon {
                    width: 32px;
                    height: 32px;
                    font-size: 0.8rem;
                }

                .contact-list a,
                .contact-list .c-item {
                    gap: 12px;
                }
            }
        </style>
    </footer>

    <!-- WhatsApp Floating Button -->
    @php
        $whatsapp_number = $global_settings['contact_whatsapp'] ?? '917292050505'; // Fallback to provided contact
        // Remove non-numeric characters
        $wa_number = preg_replace('/[^0-9]/', '', $whatsapp_number);

        // If number is 10 digits (common in India), prepend 91
        if (strlen($wa_number) == 10) {
            $wa_number = '91' . $wa_number;
        }

        $wa_msg = $global_settings['contact_whatsapp_msg'] ?? 'Hello, I am interested in your services.';
        $wa_url = "https://wa.me/{$wa_number}";
        if (!empty($wa_msg)) {
            $wa_url .= "?text=" . urlencode($wa_msg);
        }
    @endphp

    <a href="{{ $wa_url }}" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

    <script>
        // Header Scroll Effect [UPDATED]
        const header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                document.body.classList.add('scrolled-active');
                header.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled-active');
                header.classList.remove('scrolled');
            }
        });

        // Initial check
        if (window.scrollY > 50) {
            document.body.classList.add('scrolled-active');
            header.classList.add('scrolle     d

        ');


        }
    </script>
    @include('partials.contact-modal')
    @include('partials.success-modal')


    <script>
        // Mega Menu Interaction & Accessibility
        document.addEventListener('DOMContentLoaded', function () {
            const megaDropdown = document.querySelector('.mega-dropdown');
            const megaContent = document.querySelector('.mega-dropdown-content');

            // ESC Key Close
            document.addEventListener('keydown', function (event) {
                if (event.key === "Escape") {
                    if (megaContent && getComputedStyle(megaContent).visibility === 'visible') {
                        megaDropdown.classList.add('force-close-mega');
                        if (document.activeElement && megaContent.contains(document.activeElement)) {
                            document.activeElement.blur();
                        }
                    }
                }
            });

            // Re-enable on hover
            if (megaDropdown) {
                megaDropdown.addEventListener('mouseenter', () => {
                    megaDropdown.classList.remove('force-close-mega');
                });
            }

            // Outside Click Close (for touch/keyboard edge cases)
            document.addEventListener('click', function (e) {
                if (megaDropdown && !megaDropdown.contains(e.target)) {
                    megaDropdown.classList.add('force-close-mega');
                }
            });

            // Set Active State based on URL
            const currentPath = window.location.pathname;
            const mainLinks = document.querySelectorAll('.nav-links > li > a');
            const serviceLinks = document.querySelectorAll('.mega-links a');

            [...mainLinks, ...serviceLinks].forEach(link => {
                try {
                    const linkPath = new URL(link.href).pathname;
                    if (currentPath === linkPath) {
                        link.classList.add('active');
                        // Also add to parent if it's a dropdown trigger
                        if (link.closest('.dropdown')) {
                            link.classList.add('active');
                        }
                    } else if (currentPath.startsWith(linkPath) && linkPath !== '/') {
                        // Handle sub-pages (e.g. /services/web-dev should keep /services active)
                        link.classList.add('active');
                    }
                } catch (e) { }
            });

            // Navigation handler (redundant but ensures auto-close if triggered via JS)
            serviceLinks.forEach(link => {
                link.addEventListener('click', () => {
                    megaDropdown.classList.add('force-close-mega');
                });
            });

            // --- MOBILE MENU LOGIC ---
            const mobileToggle = document.getElementById('mobile-toggle');
            const navBackdrop = document.getElementById('nav-backdrop');
            const body = document.body;

            if (mobileToggle) {
                mobileToggle.addEventListener('click', () => {
                    body.classList.toggle('mobile-nav-active');
                });
            }

            if (navBackdrop) {
                navBackdrop.addEventListener('click', () => {
                    body.classList.remove('mobile-nav-active');
                });
            }

            // Mobile Mega Dropdown Accordion
            [UPDATED]
            // Mobile Mega Dropdown Accordion & Interaction
            const megaToggles = document.querySelectorAll('.mega-dropdown .dropbtn');

            megaToggles.forEach(toggle => {
                toggle.onclick = function (e) {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        e.stopPropagation();

                        const parent = this.closest('.mega-dropdown');
                        const arrow = parent.querySelector('.nav-arrow');
                        const isOpen = parent.classList.contains('mobile-open');

                        // 1. Close ALL other open menus first (Accordion)
                        document.querySelectorAll('.mega-dropdown').forEach(d => {
                            if (d !== parent) {
                                d.classList.remove('mobile-open');
                                const dArrow = d.querySelector('.nav-arrow');
                                if (dArrow) dArrow.classList.remove('active-arrow');
                            }
                        });

                        // 2. Toggle Current Menu
                        if (isOpen) {
                            parent.classList.remove('mobile-open');
                            if (arrow) arrow.classList.remove('active-arrow');
                        } else {
                            parent.classList.add('mobile-open');
                            if (arrow) arrow.classList.add('active-arrow');
                        }
                    }
                };
            });

            // Close mobile menu on plain link click (not toggles)
            document.querySelectorAll('.nav-links a:not(.dropbtn)').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 1024) {
                        body.classList.remove('mobile-nav-active');
                    }
                });
            });
        });
        // Prevent URL Hash Update for Smooth Scroll
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href === '#' || !href.startsWith('#')) return;

                    const targetId = href.substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        e.preventDefault(); // Prevent URL update
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Close mobile menu if open
                        if (document.body.classList.contains('mobile-nav-active')) {
                            document.body.classList.remove('mobile-nav-active');
                        }
                    }
                });
            });
        });
    </script>
    <style>
        .mega-dropdown.force-close-mega .mega-dropdown-content {
            opacity: 0 !important;
            visibility: hidden !important;
            transform: translateX(-50%) translateY(20px) scale(0.95) !important;
            pointer-events: none !important;
        }
    </style>
    <!-- End Mega Menu Scripts -->
    <style>
        /* FORCE MOBILE OVERRIDES for Industries Menu */
        @media (max-width: 1024px) {

            /* 1. Reset the white card look */
            /* 1. Reset the white card look & Animation */
            .mega-dropdown-content.industries-mega {
                position: static !important;
                background: transparent !important;
                box-shadow: none !important;
                border: none !important;
                padding: 0 0 0 15px !important;
                color: #fff !important;
                width: 100% !important;
                visibility: visible !important;
                opacity: 1 !important;

                /* Smooth Slide Animation matching Services */
                max-height: 0;
                overflow: hidden !important;
                display: block !important;
                transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1), padding 0.3s ease;
            }

            /* 2. Show when open */
            .mega-dropdown.mobile-open .mega-dropdown-content.industries-mega {
                max-height: 1000px;
                /* Expand */
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            /* 3. Hide desktop-only columns */
            .ind-image-col,
            .ind-info-col,
            .ind-title,
            .ind-desc,
            .ind-divider,
            .ind-view-all {
                display: none !important;
            }

            /* 4. Reset Grid to Stack */
            .ind-wrapper {
                display: block !important;
                padding: 0 !important;
            }

            .ind-links-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 0 !important;
            }

            .ind-link-col {
                display: flex !important;
                flex-direction: column !important;
                gap: 0 !important;
            }

            /* 5. Links Styling */
            .ind-links-grid .ind-link-col a {
                color: rgba(255, 255, 255, 0.7) !important;
                font-size: 0.95rem !important;
                font-weight: 500 !important;
                padding: 10px 0 !important;
                text-transform: none !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }
        }
    </style>
    <style>
        /* FINAL STICKY FOOTER & BACKGROUND REINFORCEMENT */
        html {
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #000 !important;
            background-color: #000 !important;
            overflow-x: hidden !important;
        }

        body {
            background: #000 !important;
            background-color: #000 !important;
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100vh !important;
            display: flex !important;
            flex-direction: column !important;
            overflow-x: hidden !important;
            overflow-y: visible !important;
            /* Force body to use html scrollbar */
        }

        main {
            flex: 1 0 auto !important;
            background-color: #0b1120 !important;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        footer {
            flex-shrink: 0 !important;
            margin-top: auto !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
            background: #000 !important;
        }

        /* Prevent any trailing space from invisible elements */
        #globalContactModal,
        #successModal,
        script,
        link,
        .whatsapp-float {
            margin: 0 !important;
            padding: 0 !important;
        }

        body>*:last-child {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
    <script>
        // High-Priority Resilience Loader Dismissal
        (function () {
            const hideLoader = function () {
                const loader = document.getElementById('tech-loader');
                if (loader && !loader.classList.contains('hidden')) {
                    loader.classList.add('hidden');
                    setTimeout(() => {
                        loader.style.setProperty('display', 'none', 'important');
                        // Ensure body scroll is active
                        document.body.style.overflow = '';
                    }, 800);
                }
            };

            // Aggressive Reveal Strategy
            if (document.readyState === 'complete') {
                setTimeout(hideLoader, 200);
            } else {
                window.addEventListener('load', hideLoader);
                // Fail-safe: Force hide after 3 seconds if assets are slow
                setTimeout(hideLoader, 3000);
            }
        })();
    </script>
    <style>
        /* FORCE MOBILE OVERRIDES for Generic Mega Menu (Services) */
        @media (max-width: 1024px) {

            /* 1. Container Reset & Animation Setup */
            .mega-dropdown-content {
                background: transparent !important;
                box-shadow: none !important;
                border: none !important;
                position: static !important;
                width: 100% !important;
                padding: 0 0 0 15px !important;
                visibility: visible !important;
                opacity: 1 !important;

                /* Smooth Slide Animation using Max-Height */
                max-height: 0;
                overflow: hidden !important;
                display: block !important;
                transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1), padding 0.3s ease;
            }

            /* 2. State: Open (Tap Only) */
            .mega-dropdown.mobile-open .mega-dropdown-content {
                max-height: 1500px;
                /* Large enough to fit content */
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            /* Arrow Rotation */
            .nav-arrow {
                display: inline-block;
                transition: transform 0.3s ease;
                font-size: 0.8em;
                margin-left: 5px;
            }

            .active-arrow {
                transform: rotate(180deg);
                color: #38bdf8 !important;
                /* Highlight color */
            }

            /* 3. Layout: Stacked */
            .mega-grid,
            .mega-col-right-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 20px !important;
                width: 100% !important;
            }

            /* 4. Hide Promo Column */
            .mega-col-left {
                display: none !important;
            }

            /* 5. Content Styling */
            .mega-cat-col {
                margin-bottom: 5px;
            }

            .mega-cat-title {
                color: #ffffff !important;
                font-size: 1rem !important;
                font-weight: 700 !important;
                margin-bottom: 10px !important;
                opacity: 0.9;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                display: flex;
                /* Align icon if present */
                align-items: center;
                gap: 10px;
            }

            /* Hide desktop icons in titles if needed, or keep for style */
            .mega-cat-title i {
                color: #38bdf8 !important;
            }

            .mega-links {
                gap: 12px !important;
            }

            .mega-links li a {
                padding: 10px 0 !important;
                /* Larger touch target */
                font-size: 0.95rem !important;
                color: rgba(255, 255, 255, 0.75) !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                display: block;
            }

        }

        .mega-links li a {
            color: rgba(255, 255, 255, 0.7) !important;
            font-size: 0.9rem !important;
            padding: 8px 0 !important;
            display: flex !important;
            align-items: center;
            gap: 8px;
        }

        .mega-links li a i {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        .mega-links li a:hover {
            color: #38bdf8 !important;
            transform: translateX(5px);
        }
        }
    </style>
    @include('partials.success-modal')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Function to strip hash from URL without refreshing
            const removeHash = () => {
                if (window.location.hash) {
                    history.replaceState(null, null, window.location.pathname + window.location.search);
                }
            };

            // 1. Handle Initial Page Load with Hash
            if (window.location.hash) {
                const targetId = window.location.hash.substring(1);
                if (targetId) {
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        // Wait a moment for layout to stabilize
                        setTimeout(() => {
                            targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            removeHash(); // Clean URL after scroll
                        }, 100);
                    } else {
                        removeHash(); // Invalid hash, just clean it
                    }
                } else {
                    removeHash(); // Empty hash
                }
            }

            // 2. Intercept All Anchor Click Events
            document.body.addEventListener('click', (e) => {
                const anchor = e.target.closest('a[href]');
                if (!anchor) return;

                const href = anchor.getAttribute('href');
                if (!href) return;

                // Case A: Link to Top ("#")
                if (href === '#') {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return;
                }

                // Case B: Hash Links (Internal or External Page)
                if (href.includes('#')) {
                    try {
                        const url = new URL(href, window.location.href);

                        // Check if link targets the current page (MATCH PATH AND SEARCH)
                        if (url.pathname === window.location.pathname && url.search === window.location.search) {
                            e.preventDefault(); // STRICT: Always prevent default to keep URL clean

                            const targetId = url.hash.substring(1);
                            if (targetId) {
                                const targetElement = document.getElementById(targetId);
                                if (targetElement) {
                                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                }
                            }
                        }
                        // If it routes to another page, we let it navigate. 
                        // The destination page's "Initial Load" script (block 1) will handle the scroll & clean.
                    } catch (err) {
                        // ignore invalid URLs
                    }
                }
            });
        });
    </script>
</body>

</html>