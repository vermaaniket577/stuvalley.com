@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section style="padding: 120px 0 80px; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div style="position: absolute; top: 20%; right: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%); border-radius: 50%; filter: blur(80px);"></div>
        <div style="position: absolute; bottom: 20%; left: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%); border-radius: 50%; filter: blur(80px);"></div>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; text-align: center; position: relative; z-index: 2;">
            <span style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;">
                OUR PRODUCTS & SOLUTIONS
            </span>
            <h1 style="font-size: 3.5rem; color: #ffffff; font-weight: 800; margin-bottom: 25px; line-height: 1.2; font-family: 'Outfit', sans-serif;">
                Enterprise-Grade Solutions <br>
                <span style="color: #3b82f6;">Built for Success</span>
            </h1>
            <p style="color: #cbd5e1; font-size: 1.2rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                Discover our portfolio of cutting-edge products designed to transform businesses across industries.
            </p>
        </div>
    </section>

    <!-- Products Grid -->
    <section style="padding: 80px 0; background: #0b1120;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            
            @if($products->isEmpty())
                <div style="text-align: center; padding: 60px 20px;">
                    <i class="fas fa-box-open" style="font-size: 4rem; color: #475569; margin-bottom: 20px;"></i>
                    <h3 style="color: #cbd5e1; font-size: 1.5rem; margin-bottom: 10px;">No Products Available</h3>
                    <p style="color: #64748b;">Check back soon for exciting new solutions!</p>
                </div>
            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                    @foreach($products as $product)
                        <a href="{{ route('products.show', $product->slug) }}" 
                           style="text-decoration: none; display: block; cursor: pointer;"
                           class="product-card">
                            <div style="background: rgba(30, 41, 59, 0.5); border-radius: 16px; overflow: hidden; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); border: 1px solid rgba(255, 255, 255, 0.05); box-shadow: 0 4px 6px rgba(0,0,0,0.2); height: 100%; position: relative;">
                                
                                <!-- Featured Image -->
                                <div style="position: relative; height: 220px; overflow: hidden; background: linear-gradient(135deg, {{ $product->color_scheme }}15 0%, transparent 100%);">
                                    <img src="{{ $product->featured_image_url }}" 
                                         alt="{{ $product->title }}"
                                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                                         class="product-img">
                                    
                                    <!-- Category Badge -->
                                    <div style="position: absolute; top: 15px; right: 15px;">
                                        <span style="background: {{ $product->color_scheme }}; color: white; padding: 6px 16px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                            {{ $product->category }}
                                        </span>
                                    </div>

                                    @if($product->is_featured)
                                        <div style="position: absolute; top: 15px; left: 15px;">
                                            <span style="background: #f59e0b; color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 700;">
                                                <i class="fas fa-star"></i> FEATURED
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Content -->
                                <div style="padding: 25px;">
                                    <!-- Icon & Title -->
                                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                        @if($product->icon)
                                            <div style="width: 45px; height: 45px; border-radius: 10px; background: {{ $product->color_scheme }}15; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                <i class="fas {{ $product->icon }}" style="font-size: 1.2rem; color: {{ $product->color_scheme }};"></i>
                                            </div>
                                        @endif
                                        <h3 style="font-size: 1.4rem; color: #f8fafc; margin: 0; font-weight: 700; font-family: 'Outfit', sans-serif;">
                                            {{ $product->title }}
                                        </h3>
                                    </div>

                                    <!-- Description -->
                                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px; min-height: 60px;">
                                        {{ Str::limit($product->short_description, 120) }}
                                    </p>

                                    <!-- Industry Tag -->
                                    @if($product->industry)
                                        <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(59, 130, 246, 0.1); padding: 6px 12px; border-radius: 6px; margin-bottom: 15px;">
                                            <i class="fas fa-building" style="font-size: 0.75rem; color: #3b82f6;"></i>
                                            <span style="color: #3b82f6; font-size: 0.8rem; font-weight: 600;">{{ $product->industry }}</span>
                                        </div>
                                    @endif

                                    <!-- Learn More Link -->
                                    <div style="margin-top: 20px; display: inline-flex; align-items: center; gap: 8px; color: #3b82f6; font-weight: 600; font-size: 0.9rem;">
                                        Learn More <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section style="padding: 80px 0; background: linear-gradient(135deg, #0f172a 0%, #0b1120 100%); border-top: 1px solid rgba(255,255,255,0.05);">
        <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px; text-align: center;">
            <h2 style="font-size: 2.5rem; color: #ffffff; margin-bottom: 20px; font-weight: 700;">
                Need a Custom Solution?
            </h2>
            <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.8; margin-bottom: 40px;">
                We build tailored solutions that perfectly fit your business needs. Let's discuss your project.
            </p>
            <a href="{{ url('/contact') }}"
                style="display: inline-block; background: #3b82f6; color: #ffffff; padding: 18px 45px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 1.1rem; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);"
                onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(59, 130, 246, 0.4)'; this.style.background='#2563eb';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(59, 130, 246, 0.3)'; this.style.background='#3b82f6';">
                Contact Us Today <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
            </a>
        </div>
    </section>

    <style>
        .product-card:hover > div {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }
    </style>
@endsection
