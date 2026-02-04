@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section
        style="padding: 120px 0 80px; background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%); position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div
            style="position: absolute; top: 20%; right: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(219, 161, 51, 0.15) 0%, transparent 70%); border-radius: 50%; filter: blur(80px);">
        </div>
        <div
            style="position: absolute; bottom: 20%; left: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%); border-radius: 50%; filter: blur(80px);">
        </div>

        <div class="container"
            style="max-width: 1200px; margin: 0 auto; padding: 0 20px; text-align: center; position: relative; z-index: 2;">
            <span
                style="display: inline-block; color: #dba133; font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;">
                INDUSTRIES WE’VE TRANSFORMED
            </span>
            <h1
                style="font-size: 3.5rem; color: #ffffff; font-weight: 800; margin-bottom: 25px; line-height: 1.2; font-family: 'Outfit', sans-serif;">
                Customized Digital Solutions <br>
                <span style="color: #dba133;">For Every Industry</span>
            </h1>
            <p style="color: #cbd5e1; font-size: 1.2rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                We focus on each domain's unique risks and opportunities, delivering agile and effective digital solutions
                tailored to your business needs.
            </p>
        </div>
    </section>

    <!-- Industries Grid -->
    <section style="padding: 80px 0; background: #ffffff;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                @foreach($industries as $industry)
                    @php
                        $slug = $industry->id; // Use ID as slug directly from controller
                    @endphp
                    <a href="{{ route('industries.show', $slug) }}" style="text-decoration: none; display: block;">
                        <div style="background: linear-gradient(145deg, #f8f9fa, #ffffff); padding: 50px 30px; border-radius: 16px; text-align: center; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); border: 2px solid #e5e7eb; box-shadow: 0 4px 6px rgba(0,0,0,0.05); height: 100%;"
                            onmouseover="this.style.background='linear-gradient(145deg, #dba133, #f59e0b)'; this.style.borderColor='#dba133'; this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 20px 40px rgba(219, 161, 51, 0.3)'; this.querySelector('.ind-icon').style.color='#fff'; this.querySelector('.ind-icon').style.transform='scale(1.1) rotate(5deg)'; this.querySelector('.ind-title').style.color='#fff';"
                            onmouseout="this.style.background='linear-gradient(145deg, #f8f9fa, #ffffff)'; this.style.borderColor='#e5e7eb'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.05)'; this.querySelector('.ind-icon').style.color='#dba133'; this.querySelector('.ind-icon').style.transform='scale(1) rotate(0deg)'; this.querySelector('.ind-title').style.color='#1a1a1a';">

                            @if($industry->icon)
                                <div class="ind-icon"
                                    style="font-size: 4rem; color: #dba133; margin-bottom: 25px; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);">
                                    <i class="fas {{ $industry->icon }}"></i>
                                </div>
                            @endif

                            <h3 class="ind-title"
                                style="font-size: 1.3rem; color: #1a1a1a; margin-bottom: 15px; font-weight: 700; font-family: 'Outfit', sans-serif; transition: color 0.3s ease;">
                                {{ $industry->title }}
                            </h3>

                            @if($industry->subtitle)
                                <p style="color: #6b7280; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                    {{ Str::limit($industry->subtitle, 100) }}
                                </p>
                            @endif

                            <div
                                style="margin-top: 20px; display: inline-flex; align-items: center; gap: 8px; color: #dba133; font-weight: 600; font-size: 0.9rem;">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="padding: 80px 0; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px; text-align: center;">
            <h2 style="font-size: 2.5rem; color: #ffffff; margin-bottom: 20px; font-weight: 700;">
                Don't See Your Industry?
            </h2>
            <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.8; margin-bottom: 40px;">
                We work with businesses across all sectors. Get in touch with us to discuss how we can create custom
                solutions tailored to your specific industry needs.
            </p>
            <a href="{{ url('/#contact') }}"
                style="display: inline-block; background: #dba133; color: #000; padding: 18px 45px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 1.1rem; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(219, 161, 51, 0.3);"
                onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px rgba(219, 161, 51, 0.4)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(219, 161, 51, 0.3)';">
                Contact Us Today <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
            </a>
        </div>
    </section>
@endsection