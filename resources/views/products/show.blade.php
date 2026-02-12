@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section
        style="position: relative; padding: 140px 0 100px; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); overflow: hidden;">
        <!-- Background Pattern -->
        <div
            style="position: absolute; inset: 0; background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0); background-size: 40px 40px; opacity: 0.3;">
        </div>

        <!-- Gradient Orbs -->
        <div
            style="position: absolute; top: 10%; right: 10%; width: 400px; height: 400px; background: radial-gradient(circle, {{ $product->color_scheme }}30 0%, transparent 70%); border-radius: 50%; filter: blur(100px);">
        </div>
        <div
            style="position: absolute; bottom: 10%; left: 10%; width: 350px; height: 350px; background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%); border-radius: 50%; filter: blur(100px);">
        </div>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;">

                <!-- Left: Content -->
                <div>
                    <!-- Category Badge -->
                    <div style="margin-bottom: 20px;">
                        <span
                            style="display: inline-block; background: {{ $product->color_scheme }}; color: white; padding: 8px 20px; border-radius: 25px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 15px {{ $product->color_scheme }}40;">
                            {{ $product->category }}
                        </span>
                    </div>

                    <!-- Product Title -->
                    <h1
                        style="font-size: 3.5rem; color: #ffffff; font-weight: 800; margin-bottom: 25px; line-height: 1.1; font-family: 'Outfit', sans-serif;">
                        {{ $product->title }}
                    </h1>

                    <!-- Value Proposition -->
                    @if($product->value_proposition)
                        <p style="font-size: 1.3rem; color: #3b82f6; font-weight: 600; margin-bottom: 25px; line-height: 1.5;">
                            {{ $product->value_proposition }}
                        </p>
                    @endif

                    <!-- Short Description -->
                    <p style="font-size: 1.1rem; color: #cbd5e1; line-height: 1.8; margin-bottom: 35px;">
                        {{ $product->short_description }}
                    </p>

                    <!-- Action Buttons -->
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ url('/contact') }}"
                            style="display: inline-flex; align-items: center; gap: 10px; background: #3b82f6; color: white; padding: 16px 35px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 1.05rem; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);"
                            onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 35px rgba(59, 130, 246, 0.5)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(59, 130, 246, 0.4)';">
                            <i class="fas fa-envelope"></i> Contact Us
                        </a>

                        @if($product->demo_url)
                            <a href="{{ $product->demo_url }}" target="_blank"
                                style="display: inline-flex; align-items: center; gap: 10px; background: rgba(255,255,255,0.1); color: white; padding: 16px 35px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 1.05rem; transition: all 0.3s ease; border: 1px solid rgba(255,255,255,0.2);"
                                onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(-3px)';"
                                onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                                <i class="fas fa-play-circle"></i> View Demo
                            </a>
                        @endif
                    </div>

                    <!-- Meta Info -->
                    <div style="margin-top: 40px; display: flex; gap: 30px; flex-wrap: wrap;">
                        @if($product->industry)
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-building" style="color: #64748b; font-size: 1.2rem;"></i>
                                <div>
                                    <div
                                        style="color: #64748b; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Industry</div>
                                    <div style="color: #cbd5e1; font-weight: 600;">{{ $product->industry }}</div>
                                </div>
                            </div>
                        @endif

                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-eye" style="color: #64748b; font-size: 1.2rem;"></i>
                            <div>
                                <div
                                    style="color: #64748b; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Views</div>
                                <div style="color: #cbd5e1; font-weight: 600;">{{ number_format($product->views) }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Banner Image -->
                <div style="position: relative;">
                    <div
                        style="border-radius: 20px; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
                        <img src="{{ $product->banner_image_url }}" alt="{{ $product->title }}"
                            style="width: 100%; height: auto; display: block;">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Full Description Section -->
    <section style="padding: 80px 0; background: #0b1120;">
        <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
            <div
                style="background: rgba(30, 41, 59, 0.5); border-radius: 20px; padding: 50px; border: 1px solid rgba(255,255,255,0.05);">
                <h2 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 25px; font-weight: 700;">
                    <i class="fas fa-info-circle" style="color: #3b82f6; margin-right: 15px;"></i>
                    About This Solution
                </h2>
                <div style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.9;">
                    {!! nl2br(e($product->full_description)) !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    @if($product->features && count($product->features) > 0)
        <section style="padding: 80px 0; background: #0f172a;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <div style="text-align: center; margin-bottom: 60px;">
                    <h2 style="font-size: 2.5rem; color: #ffffff; margin-bottom: 15px; font-weight: 700;">
                        Key Features & Modules
                    </h2>
                    <p style="color: #94a3b8; font-size: 1.1rem;">
                        Powerful capabilities designed to drive your business forward
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                    @foreach($product->features as $feature)
                        <div style="background: rgba(30, 41, 59, 0.5); padding: 30px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.borderColor='#3b82f6'; this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.3)';"
                            onmouseout="this.style.borderColor='rgba(255,255,255,0.05)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <div
                                style="width: 50px; height: 50px; border-radius: 12px; background: rgba(59, 130, 246, 0.15); display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                <i class="fas fa-check-circle" style="font-size: 1.5rem; color: #3b82f6;"></i>
                            </div>
                            <h3 style="color: #f8fafc; font-size: 1.2rem; margin-bottom: 10px; font-weight: 600;">
                                {{ is_array($feature) ? $feature['title'] ?? $feature['name'] ?? 'Feature' : $feature }}
                            </h3>
                            @if(is_array($feature) && isset($feature['description']))
                                <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    {{ $feature['description'] }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Tech Stack Section -->
    @if($product->tech_stack && count($product->tech_stack) > 0)
        <section style="padding: 80px 0; background: #0b1120;">
            <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px; text-align: center;">
                <h2 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 40px; font-weight: 700;">
                    <i class="fas fa-code" style="color: #3b82f6; margin-right: 15px;"></i>
                    Technology Stack
                </h2>
                <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                    @foreach($product->tech_stack as $tech)
                        <span
                            style="background: rgba(30, 41, 59, 0.7); color: #cbd5e1; padding: 12px 24px; border-radius: 25px; font-weight: 600; font-size: 0.95rem; border: 1px solid rgba(255,255,255,0.1); transition: all 0.3s ease;"
                            onmouseover="this.style.background='#3b82f6'; this.style.color='white'; this.style.transform='translateY(-3px)';"
                            onmouseout="this.style.background='rgba(30, 41, 59, 0.7)'; this.style.color='#cbd5e1'; this.style.transform='translateY(0)';">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Gallery Section -->
    @if($product->gallery && count($product->gallery) > 0)
        <section style="padding: 80px 0; background: #0f172a;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <h2 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 50px; text-align: center; font-weight: 700;">
                    Screenshots & Gallery
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
                    @foreach($product->gallery as $image)
                        <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.05); transition: transform 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.03)';" onmouseout="this.style.transform='scale(1)';">
                            <img src="{{ $image }}" alt="Screenshot" style="width: 100%; height: auto; display: block;">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section style="padding: 80px 0; background: #0b1120; border-top: 1px solid rgba(255,255,255,0.05);">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <h2 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 50px; text-align: center; font-weight: 700;">
                    Related Solutions
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('products.show', $related->slug) }}" style="text-decoration: none; display: block;">
                            <div style="background: rgba(30, 41, 59, 0.5); border-radius: 16px; overflow: hidden; transition: all 0.3s ease; border: 1px solid rgba(255,255,255,0.05); height: 100%;"
                                onmouseover="this.style.transform='translateY(-8px)'; this.style.borderColor='{{ $related->color_scheme }}';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255,255,255,0.05)';">
                                <div
                                    style="height: 180px; overflow: hidden; background: linear-gradient(135deg, {{ $related->color_scheme }}15 0%, transparent 100%);">
                                    <img src="{{ $related->featured_image_url }}" alt="{{ $related->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div style="padding: 25px;">
                                    <span
                                        style="background: {{ $related->color_scheme }}; color: white; padding: 4px 12px; border-radius: 15px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase;">
                                        {{ $related->category }}
                                    </span>
                                    <h3 style="color: #f8fafc; font-size: 1.3rem; margin: 15px 0 10px; font-weight: 700;">
                                        {{ $related->title }}
                                    </h3>
                                    <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin: 0;">
                                        {{ Str::limit($related->short_description, 100) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section
        style="padding: 100px 0; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); position: relative; overflow: hidden;">
        <div
            style="position: absolute; inset: 0; background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0); background-size: 40px 40px;">
        </div>

        <div class="container"
            style="max-width: 900px; margin: 0 auto; padding: 0 20px; text-align: center; position: relative; z-index: 2;">
            <h2 style="font-size: 2.8rem; color: #ffffff; margin-bottom: 25px; font-weight: 700;">
                Ready to Get Started?
            </h2>
            <p style="color: #cbd5e1; font-size: 1.2rem; line-height: 1.8; margin-bottom: 45px;">
                Let's discuss how {{ $product->title }} can transform your business operations.
            </p>
            <a href="{{ url('/contact') }}"
                style="display: inline-block; background: #3b82f6; color: #ffffff; padding: 20px 50px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 1.15rem; transition: all 0.3s ease; box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);"
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 50px rgba(59, 130, 246, 0.5)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 40px rgba(59, 130, 246, 0.4)';">
                <i class="fas fa-paper-plane" style="margin-right: 12px;"></i> Request a Demo
            </a>
        </div>
    </section>
@endsection