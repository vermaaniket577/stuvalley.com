@extends('layouts.app')

@section('content')
    {{-- 1. HERO SECTION --}}
    <section class="industry-hero"
        style="padding: 140px 0 100px; background: linear-gradient(135deg, #0B1120 0%, #000000 100%); position: relative; overflow: hidden;">
        {{-- Animated Background Elements --}}
        <div
            style="position: absolute; top: 10%; right: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%); border-radius: 50%; filter: blur(100px); animation: pulse 8s ease-in-out infinite;">
        </div>
        <div
            style="position: absolute; bottom: 10%; left: -5%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(249,115,22,0.12) 0%, transparent 70%); border-radius: 50%; filter: blur(100px); animation: pulse 10s ease-in-out infinite 2s;">
        </div>

        {{-- Grid Pattern Overlay --}}
        <div
            style="position: absolute; inset: 0; background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 50px 50px; opacity: 0.3;">
        </div>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px; position: relative; z-index: 2;">
            {{-- Breadcrumb --}}
            <div style="margin-bottom: 40px; display: flex; align-items: center; gap: 12px; font-size: 0.9rem;">
                <a href="{{ url('/') }}" style="color: #94a3b8; text-decoration: none; transition: color 0.3s;"
                    onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#94a3b8'">
                    <i class="fas fa-home"></i> Home
                </a>
                <span style="color: #475569;">/</span>
                <a href="{{ url('/#industries') }}" style="color: #94a3b8; text-decoration: none; transition: color 0.3s;"
                    onmouseover="this.style.color='#3b82f6'" onmouseout="this.style.color='#94a3b8'">
                    Industries
                </a>
                <span style="color: #475569;">/</span>
                <span style="color: #3b82f6; font-weight: 600;">{{ $industry->title }}</span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
                {{-- Left Content --}}
                <div>
                    <div
                        style="display: inline-block; background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.3); padding: 8px 20px; border-radius: 50px; margin-bottom: 25px; backdrop-filter: blur(10px);">
                        <span style="color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 1.5px;">
                            <i class="{{ $industry->icon }}" style="margin-right: 8px;"></i>
                            {{ strtoupper($industry->title) }} INDUSTRY
                        </span>
                    </div>

                    <h1
                        style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; color: #fff; line-height: 1.1; margin-bottom: 30px; font-family: 'Manrope', sans-serif;">
                        {!! $industry->hero_title ?? $industry->title . ' Solutions' !!}
                    </h1>

                    <p style="color: #cbd5e1; font-size: 1.2rem; line-height: 1.8; margin-bottom: 40px; max-width: 600px;">
                        {{ $industry->hero_subtitle ?? 'Empowering businesses with cutting-edge technology solutions that drive efficiency, innovation, and sustainable growth.' }}
                    </p>

                    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                        <a href="{{ route('quote.index') }}"
                            style="display: inline-flex; align-items: center; gap: 12px; background: #3b82f6; color: #fff; padding: 16px 36px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1rem; box-shadow: 0 10px 30px rgba(59,130,246,0.3); transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(59,130,246,0.4)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(59,130,246,0.3)';">
                            Get Free Consultation
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <a href="#solutions"
                            style="display: inline-flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.05); color: #fff; padding: 16px 36px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1rem; border: 2px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px); transition: all 0.3s ease;"
                            onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.2)';"
                            onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.1)';">
                            Talk to Industry Expert
                            <i class="fas fa-comments"></i>
                        </a>
                    </div>
                </div>

                {{-- Right Visual --}}
                <div style="position: relative;">
                    <div
                        style="background: linear-gradient(145deg, rgba(59,130,246,0.1), rgba(37,99,235,0.05)); padding: 60px; border-radius: 30px; border: 1px solid rgba(59,130,246,0.2); backdrop-filter: blur(20px); box-shadow: 0 20px 60px rgba(0,0,0,0.3); position: relative;">
                        <i class="{{ $industry->icon }}"
                            style="font-size: 12rem; color: #3b82f6; opacity: 0.2; display: block; text-align: center; filter: drop-shadow(0 0 40px rgba(59,130,246,0.4));"></i>

                        {{-- Floating Stats --}}
                        <div
                            style="position: absolute; top: 20px; right: 20px; background: rgba(0,0,0,0.8); padding: 15px 25px; border-radius: 15px; backdrop-filter: blur(10px); border: 1px solid rgba(59,130,246,0.3);">
                            <div style="color: #3b82f6; font-size: 1.8rem; font-weight: 800; margin-bottom: 5px;">500+
                            </div>
                            <div style="color: #94a3b8; font-size: 0.85rem; font-weight: 600;">Projects Delivered</div>
                        </div>

                        <div
                            style="position: absolute; bottom: 20px; left: 20px; background: rgba(0,0,0,0.8); padding: 15px 25px; border-radius: 15px; backdrop-filter: blur(10px); border: 1px solid rgba(249,115,22,0.3);">
                            <div style="color: #f97316; font-size: 1.8rem; font-weight: 800; margin-bottom: 5px;">98%</div>
                            <div style="color: #94a3b8; font-size: 0.85rem; font-weight: 600;">Client Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. INDUSTRY OVERVIEW --}}
    <section style="padding: 100px 0; background: #fff; position: relative;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;">
                {{-- Left: Text --}}
                <div>
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(59,130,246,0.2);">
                        INDUSTRY OVERVIEW
                    </span>

                    <h2
                        style="font-size: 2.8rem; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 30px; font-family: 'Manrope', sans-serif;">
                        Challenges & Digital Transformation in
                        <span style="color: #3b82f6;">{{ $industry->title }}</span>
                    </h2>

                    <p style="color: #64748b; font-size: 1.1rem; line-height: 1.8; margin-bottom: 25px;">
                        {{ $industry->overview_text_1 ?? 'Every industry faces unique challenges in today\'s digital landscape. We help you navigate these complexities with tailored solutions.' }}
                    </p>

                    <p style="color: #64748b; font-size: 1.1rem; line-height: 1.8; margin-bottom: 30px;">
                        {{ $industry->overview_text_2 ?? 'Our goal is to drive your digital transformation through innovation, efficiency, and scalable technology.' }}
                    </p>

                    @if(isset($industry->benefits))
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            @foreach (array_slice($industry->benefits, 0, 4) as $benefit)
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div
                                        style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="fas fa-check" style="color: #fff; font-size: 0.9rem;"></i>
                                    </div>
                                    <span
                                        style="color: #1e293b; font-size: 1.05rem; font-weight: 600;">{{ $benefit['title'] ?? $benefit }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Right: Abstract Illustration --}}
                <div style="position: relative;">
                    <div
                        style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); padding: 60px; border-radius: 30px; box-shadow: 0 20px 60px rgba(0,0,0,0.08); position: relative; overflow: hidden;">
                        {{-- Abstract Shapes --}}
                        <div
                            style="position: absolute; top: -20px; right: -20px; width: 150px; height: 150px; background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; opacity: 0.1;">
                        </div>
                        <div
                            style="position: absolute; bottom: -30px; left: -30px; width: 200px; height: 200px; background: linear-gradient(135deg, #f97316, #ea580c); border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; opacity: 0.1;">
                        </div>

                        <img src="{{ $industry->overview_image ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80' }}"
                            alt="{{ $industry->title }} Industry"
                            style="width: 100%; height: auto; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); position: relative; z-index: 1;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. SOLUTIONS WE OFFER --}}
    @if(isset($industry->solutions))
        <section id="solutions"
            style="padding: 100px 0; background: linear-gradient(135deg, #0B1120 0%, #000000 100%); position: relative;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
                <div style="text-align: center; margin-bottom: 70px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; background: rgba(59,130,246,0.1); padding: 8px 20px; border-radius: 50px; border: 1px solid rgba(59,130,246,0.3);">
                        OUR SOLUTIONS
                    </span>

                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                        Solutions We Offer for <br>
                        <span style="color: #3b82f6;">{{ $industry->title }}</span> Industry
                    </h2>

                    <p style="color: #94a3b8; font-size: 1.15rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                        Comprehensive technology solutions designed to address your specific industry challenges.
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 50px 35px;">
                    @foreach ($industry->solutions as $solution)
                        <div class="solution-glass-card"
                            style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; padding: 40px; backdrop-filter: blur(10px); transition: all 0.4s ease; position: relative; overflow: hidden;"
                            onmouseover="this.style.transform='translateY(-10px)'; this.style.borderColor='rgba(59,130,246,0.5)'; this.style.background='rgba(255,255,255,0.05)'; this.querySelector('.sol-icon-box').style.background='linear-gradient(135deg, #3b82f6, #2563eb)'; this.querySelector('.sol-icon-box').style.transform='scale(1.1)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='rgba(255,255,255,0.08)'; this.style.background='rgba(255,255,255,0.03)'; this.querySelector('.sol-icon-box').style.background='rgba(59,130,246,0.1)'; this.querySelector('.sol-icon-box').style.transform='scale(1)';">

                            <div class="sol-icon-box"
                                style="width: 70px; height: 70px; background: rgba(59,130,246,0.1); border-radius: 18px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px; transition: all 0.4s ease;">
                                <i class="{{ $solution['icon'] }}" style="font-size: 2rem; color: #3b82f6;"></i>
                            </div>

                            <h3 style="color: #fff; font-size: 1.4rem; font-weight: 700; margin-bottom: 15px;">
                                {{ $solution['title'] }}
                            </h3>

                            <p style="color: #94a3b8; font-size: 1rem; line-height: 1.7; margin: 0;">
                                {{ $solution['desc'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 4. KEY BENEFITS & OUTCOMES --}}
    @if(isset($industry->benefits))
        <section style="padding: 100px 0; background: #fff;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
                <div style="text-align: center; margin-bottom: 70px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(59,130,246,0.2);">
                        KEY BENEFITS
                    </span>

                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                        Measurable Outcomes for Your Business
                    </h2>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 55px 40px;">
                    @foreach ($industry->benefits as $benefit)
                        <div style="display: flex; gap: 25px; padding: 35px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 20px; border-left: 4px solid #3b82f6; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 10px 30px rgba(59,130,246,0.1)';"
                            onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='none';">

                            <div
                                style="width: 70px; height: 70px; background: linear-gradient(135deg, #3b82f6, #2563eb); border-radius: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="{{ $benefit['icon'] ?? 'fas fa-check' }}" style="font-size: 2rem; color: #fff;"></i>
                            </div>

                            <div>
                                <div style="display: flex; align-items: baseline; gap: 15px; margin-bottom: 10px;">
                                    <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin: 0;">
                                        {{ $benefit['title'] }}
                                    </h3>
                                    <span
                                        style="color: #3b82f6; font-size: 1.8rem; font-weight: 800;">{{ $benefit['metric'] }}</span>
                                </div>
                                <p style="color: #64748b; font-size: 1rem; line-height: 1.6; margin: 0;">
                                    {{ $benefit['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 5. USE CASES / REAL-WORLD APPLICATIONS --}}
    @if(isset($industry->use_cases))
        <section style="padding: 100px 0; background: #f8fafc;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
                <div style="text-align: center; margin-bottom: 70px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(59,130,246,0.2);">
                        REAL-WORLD APPLICATIONS
                    </span>

                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                        Proven Use Cases in <span style="color: #3b82f6;">{{ $industry->title }}</span>
                    </h2>
                </div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                    @foreach ($industry->use_cases as $useCase)
                        <div style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: all 0.4s ease;"
                            onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.05)';">

                            <div style="height: 200px; overflow: hidden; position: relative;">
                                <img src="{{ $useCase['image'] }}" alt="{{ $useCase['title'] }}"
                                    style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                                    onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                                <div
                                    style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 50%);">
                                </div>
                            </div>

                            <div style="padding: 30px;">
                                <h3 style="color: #0f172a; font-size: 1.3rem; font-weight: 700; margin-bottom: 12px;">
                                    {{ $useCase['title'] }}
                                </h3>
                                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.7; margin: 0;">
                                    {{ $useCase['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 6. TECHNOLOGY STACK --}}
    @if(isset($industry->tech_stack))
        <section style="padding: 100px 0; background: #fff;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
                <div style="text-align: center; margin-bottom: 70px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid rgba(59,130,246,0.2);">
                        TECHNOLOGY STACK
                    </span>

                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                        Powered by Modern Technologies
                    </h2>
                </div>

                <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                    @foreach ($industry->tech_stack as $tech)
                        <div style="display: flex; align-items: center; gap: 12px; background: #f8fafc; padding: 15px 30px; border-radius: 50px; border: 2px solid #e2e8f0; transition: all 0.3s ease;"
                            onmouseover="this.style.borderColor='{{ $tech['color'] }}'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <i class="{{ $tech['icon'] }}" style="font-size: 1.5rem; color: {{ $tech['color'] }};"></i>
                            <span style="color: #1e293b; font-weight: 600; font-size: 0.95rem;">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 7. WHY CHOOSE US --}}
    @if(isset($industry->why_choose_us))
        <section style="padding: 100px 0; background: linear-gradient(135deg, #0B1120 0%, #000000 100%); position: relative;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 30px;">
                <div style="text-align: center; margin-bottom: 70px;">
                    <span
                        style="display: inline-block; color: #3b82f6; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; background: rgba(59,130,246,0.1); padding: 8px 20px; border-radius: 50px; border: 1px solid rgba(59,130,246,0.3);">
                        WHY CHOOSE US
                    </span>

                    <h2
                        style="font-size: 3rem; font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                        Your Trusted Partner for <br>
                        <span style="color: #3b82f6;">{{ $industry->title }}</span> Solutions
                    </h2>
                </div>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;">
                    @foreach ($industry->why_choose_us as $reason)
                        <div style="display: flex; gap: 25px; align-items: start;">
                            <div
                                style="width: 60px; height: 60px; background: rgba(59,130,246,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 1px solid rgba(59,130,246,0.2);">
                                <i class="{{ $reason['icon'] }}" style="font-size: 1.8rem; color: #3b82f6;"></i>
                            </div>
                            <div>
                                <h3 style="color: #fff; font-size: 1.3rem; font-weight: 700; margin-bottom: 10px;">
                                    {{ $reason['title'] }}
                                </h3>
                                <p style="color: #94a3b8; font-size: 1rem; line-height: 1.7; margin: 0;">
                                    {{ $reason['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 8. FINAL CTA SECTION --}}
    <section id="contact"
        style="padding: 100px 0; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); position: relative; overflow: hidden;">
        {{-- Background Pattern --}}
        <div
            style="position: absolute; inset: 0; background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 30px 30px; opacity: 0.3;">
        </div>

        <div class="container"
            style="max-width: 1000px; margin: 0 auto; padding: 0 30px; text-align: center; position: relative; z-index: 2;">
            <h2
                style="font-size: 3.5rem; font-weight: 800; color: #fff; line-height: 1.2; margin-bottom: 25px; font-family: 'Manrope', sans-serif;">
                Ready to Transform Your <br>
                {{ $industry->title }} Business?
            </h2>

            <p
                style="color: rgba(255,255,255,0.9); font-size: 1.3rem; line-height: 1.8; margin-bottom: 50px; max-width: 700px; margin-left: auto; margin-right: auto;">
                Let's discuss how our specialized solutions can help you achieve your business goals and drive sustainable
                growth.
            </p>

            <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px;">
                <a href="{{ route('contact') }}"
                    style="display: inline-flex; align-items: center; gap: 12px; background: #fff; color: #3b82f6; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1.1rem; box-shadow: 0 10px 30px rgba(0,0,0,0.2); transition: all 0.3s ease;"
                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.3)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.2)';">
                    <i class="fas fa-paper-plane"></i>
                    Get Free Consultation
                </a>

                @php
                    $ind_phone_raw = $global_settings['phone_india'] ?? '917292050505';
                    if (is_string($ind_phone_raw) && str_contains($ind_phone_raw, '[')) {
                        $phones = json_decode($ind_phone_raw, true);
                        $ind_phone_raw = is_array($phones) ? ($phones[0] ?? $ind_phone_raw) : $ind_phone_raw;
                    }
                    $ind_phone_raw = trim($ind_phone_raw, '[]" ');
                    $ind_phone_link = preg_replace('/[^0-9]/', '', $ind_phone_raw);
                @endphp
                <a href="tel:{{ $ind_phone_link }}"
                    style="display: inline-flex; align-items: center; gap: 12px; background: rgba(255,255,255,0.1); color: #fff; padding: 18px 40px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1.1rem; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px); transition: all 0.3s ease;"
                    onmouseover="this.style.background='rgba(255,255,255,0.2)'; this.style.borderColor='rgba(255,255,255,0.5)';"
                    onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.3)';">
                    <i class="fas fa-phone"></i>
                    Call Us Now
                </a>
            </div>

            {{-- Contact Info --}}
            <div style="display: flex; gap: 40px; justify-content: center; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <i class="fas fa-envelope" style="color: rgba(255,255,255,0.8); font-size: 1.2rem;"></i>
                    <span style="color: rgba(255,255,255,0.9); font-size: 1rem; font-weight: 600;">{{
                        $global_settings['email_primary'] ?? 'info@stuvalley.com' }}</span>
                </div>
                <div style="display: flex; align-items: center; gap: 12px;">
                    <i class="fas fa-phone" style="color: rgba(255,255,255,0.8); font-size: 1.2rem;"></i>
                    <span
                        style="color: rgba(255,255,255,0.9); font-size: 1rem; font-weight: 600;">{{ $ind_phone_raw }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ANIMATIONS --}}
    <style>
        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }
        }

        @media (max-width: 992px) {
            .industry-hero>div>div {
                grid-template-columns: 1fr !important;
                gap: 50px !important;
            }

            section>div>div[style*="grid-template-columns: 1fr 1fr"],
            section>div>div[style*="grid-template-columns: repeat(2, 1fr)"] {
                grid-template-columns: 1fr !important;
            }

            section>div>div[style*="grid-template-columns: repeat(3, 1fr)"] {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }

        @media (max-width: 640px) {

            section>div>div[style*="grid-template-columns: repeat(3, 1fr)"],
            section>div>div[style*="grid-template-columns: repeat(2, 1fr)"] {
                grid-template-columns: 1fr !important;
            }

            h1 {
                font-size: 2rem !important;
            }

            h2 {
                font-size: 2rem !important;
            }
        }
    </style>
@endsection