{{-- 
    Open Graph (OG) Meta Tags for Social Media Sharing
    Compatible with: Facebook, WhatsApp, LinkedIn, Twitter/X
    
    Recommended OG Image Size: 1200x630px (1.91:1 ratio)
    Minimum Size: 600x315px
    Maximum Size: 8MB
    Format: JPG or PNG
--}}

@php
    // Get current route and page type
    $current_route = Route::currentRouteName();
    $page_url = url()->current();
    
    // Default values
    $og_title = 'Stuvalley Technology Pvt. Ltd. - Transforming Ideas into E-Innovation';
    $og_description = 'Leading IT & Digital Services Company specializing in Web Development, Mobile Apps, Digital Marketing, UI/UX Design, and Enterprise Solutions.';
    $og_image = asset('images/og-default.jpg'); // Default fallback image
    $og_type = 'website';
    $og_site_name = 'Stuvalley Technology';
    
    // Twitter card type
    $twitter_card = 'summary_large_image';
    $twitter_site = '@stuvalley'; // Replace with your Twitter handle
    
    // Page-specific OG tags
    if ($current_route === 'blog') {
        // Blog listing page
        $og_title = 'Blog - Stuvalley Technology | Latest Tech Insights & Trends';
        $og_description = 'Explore our latest articles on web development, digital marketing, technology trends, and industry insights from Stuvalley Technology experts.';
        $og_image = asset('images/og-blog.jpg');
        $og_type = 'website';
        
    } elseif ($current_route === 'blog.show') {
         // Individual blog post - handle both variable names safely
        $p = $post ?? $blog ?? null;
        if ($p) {
            $og_title = ($p->title ?? 'Blog') . ' - Stuvalley Technology Blog';
            $og_description = $p->meta_description ?? $p->excerpt ?? Str::limit(strip_tags($p->content ?? ''), 155);
            // Use model accessor if available, otherwise check properties safely
            if (isset($p->featured_image_url)) {
                $og_image = $p->featured_image_url;
            } else {
                $og_image = (isset($p->featured_image) && $p->featured_image) ? asset('storage/' . $p->featured_image) : asset('images/og-blog.jpg');
            }
            $og_type = 'article';
        }
        
    } elseif ($current_route === 'about') {
        // About page
        $og_title = 'About Us - Stuvalley Technology | Our Story & Mission';
        $og_description = 'Learn about Stuvalley Technology, our mission to transform ideas into e-innovation, our expert team, and our commitment to delivering cutting-edge digital solutions.';
        $og_image = asset('images/og-about.jpg');
        
    } elseif ($current_route === 'services.index') {
        // Services listing
        $og_title = 'Our Services - Stuvalley Technology | Complete Digital Solutions';
        $og_description = 'Discover our comprehensive range of IT services including Web Development, Mobile Apps, Digital Marketing, UI/UX Design, and Enterprise Solutions.';
        $og_image = asset('images/og-services.jpg');
        
    } elseif (in_array($current_route, ['services.show', 'industries.show', 'solutions.show']) && isset($service)) {
        // Individual service/industry/solution page
        $og_title = ($service->title ?? 'Services') . ' - Stuvalley Technology';
        $og_description = $service->subtitle ?? $service->description ?? 'Professional ' . ($service->title ?? 'digital') . ' services by Stuvalley Technology.';
        // Robust image check for stdClass/Objects to avoid "Undefined property"
        $og_image = (isset($service->image) && $service->image) ? asset('storage/' . $service->image) : ($service->hero_image ?? asset('images/og-services.jpg'));
        
    } elseif ($current_route === 'contact') {
        // Contact page
        $og_title = 'Contact Us - Stuvalley Technology | Get In Touch';
        $og_description = 'Ready to transform your ideas into reality? Contact Stuvalley Technology for expert IT and digital services. Let\'s build something amazing together.';
        $og_image = asset('images/og-contact.jpg');
        
    } elseif (isset($seo_meta) && $seo_meta) {
        // Use SEO meta data if available
        $og_title = $seo_meta->title ?? $og_title;
        $og_description = $seo_meta->description ?? $og_description;
        if (isset($seo_meta->image) && $seo_meta->image) {
            $og_image = asset('storage/' . $seo_meta->image);
        }
    }
    
    // Ensure absolute URLs
    if (isset($og_image) && is_string($og_image)) {
        $og_image = str_starts_with($og_image, 'http') ? $og_image : url($og_image);
    }
@endphp

{{-- Essential Open Graph Tags --}}
<meta property="og:title" content="{{ $og_title }}">
<meta property="og:description" content="{{ $og_description }}">
<meta property="og:image" content="{{ $og_image }}">
<meta property="og:url" content="{{ $page_url }}">
<meta property="og:type" content="{{ $og_type }}">
<meta property="og:site_name" content="{{ $og_site_name }}">
<meta property="og:locale" content="en_US">

{{-- Additional OG Image Properties --}}
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $og_title }}">

{{-- Article-specific tags (for blog posts) --}}
@php $p = $p ?? $post ?? $blog ?? null; @endphp
@if($og_type === 'article' && $p)
    <meta property="article:published_time" content="{{ isset($p->published_at) && $p->published_at ? $p->published_at->toIso8601String() : '' }}">
    <meta property="article:modified_time" content="{{ isset($p->updated_at) && $p->updated_at ? $p->updated_at->toIso8601String() : '' }}">
    <meta property="article:author" content="Stuvalley Technology">
    @if(isset($p->category))
        <meta property="article:section" content="{{ $p->category }}">
    @endif
    @if(isset($p->tags))
        @foreach(explode(',', $p->tags) as $tag)
            <meta property="article:tag" content="{{ trim($tag) }}">
        @endforeach
    @endif
@endif

{{-- Twitter Card Tags --}}
<meta name="twitter:card" content="{{ $twitter_card }}">
<meta name="twitter:site" content="{{ $twitter_site }}">
<meta name="twitter:title" content="{{ $og_title }}">
<meta name="twitter:description" content="{{ $og_description }}">
<meta name="twitter:image" content="{{ $og_image }}">
<meta name="twitter:image:alt" content="{{ $og_title }}">

{{-- WhatsApp & Telegram specific (uses OG tags) --}}
<meta property="og:image:type" content="image/jpeg">

{{-- LinkedIn specific --}}
<meta property="og:see_also" content="{{ url('/') }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $page_url }}">