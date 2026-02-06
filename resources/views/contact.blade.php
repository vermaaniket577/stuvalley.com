@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="contact-page-wrapper">
        <!-- Premium Hero Section -->
        <section class="contact-hero-v2">
            <div class="container text-center">
                <div class="badge-pill mb-4">{{ $global_settings['contact_hero_badge'] ?? 'Get in Touch' }}</div>
                <h1 class="premium-display-title mb-4">
                    {!! $global_settings['contact_hero_title'] ?? 'Let\'s Build Something <span class="premium-text-gradient">Extraordinary</span>' !!}
                </h1>
                <p class="premium-hero-lead mx-auto" style="max-width: 800px;">
                    {{ $global_settings['contact_hero_description'] ?? 'Have a project in mind? We\'d love to hear from you. Our team is ready to turn your vision into reality with enterprise-grade solutions.' }}
                </p>
            </div>
        </section>

        <!-- Unified Contact Section -->
        <section class="premium-contact-section">
            <div class="container">
                <div class="contact-layout-grid">

                    <!-- Left Column: Contact Information -->
                    <div class="contact-info-column">
                        <div class="section-label mb-3">{{ $global_settings['contact_info_label'] ?? 'Reach Us' }}</div>
                        <h2 class="column-heading mb-4">
                            {{ $global_settings['contact_info_title'] ?? 'Contact Information' }}
                        </h2>
                        <p class="column-subtext mb-5">
                            {{ $global_settings['contact_info_description'] ?? 'Our experts are here to help. Reach out to us through any of these channels for immediate support or business inquiries.' }}
                        </p>

                        <div class="premium-info-list">
                            <!-- Headquarters -->
                            <div class="premium-info-item">
                                <div class="info-icon-wrapper">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-details">
                                    <h3>Headquarters</h3>
                                    <p>{!! nl2br(e($global_settings['address_india'] ?? 'M 13, Sector 14, Old DLF, Gurugram, India')) !!}
                                    </p>
                                </div>
                            </div>

                            <!-- Email Support -->
                            <div class="premium-info-item">
                                <div class="info-icon-wrapper">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-details">
                                    <h3>Email Support</h3>
                                    @if(isset($global_settings['email_primary']) && !empty($global_settings['email_primary']))
                                        <p>{{ $global_settings['email_primary'] }}</p>
                                    @endif

                                    @if(isset($global_settings['email_support']))
                                        @php
                                            $support_emails = $global_settings['email_support'];
                                            if (str_starts_with($support_emails, '[')) {
                                                $support_emails = json_decode($support_emails, true);
                                            } else {
                                                $support_emails = $support_emails ? [$support_emails] : [];
                                            }
                                        @endphp
                                        @foreach($support_emails as $email)
                                            <p>{{ $email }}</p>
                                        @endforeach
                                    @endif

                                    @if(empty($global_settings['email_primary']) && empty($global_settings['email_support']))
                                        <p>info@stuvalley.com</p>
                                        <p>support@stuvalley.com</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Call Us -->
                            <div class="premium-info-item">
                                <div class="info-icon-wrapper">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info-details">
                                    <h3>Call Us</h3>
                                    @if(isset($global_settings['phone_india']))
                                        @php
                                            $mobile_numbers = $global_settings['phone_india'];
                                            if (str_starts_with($mobile_numbers, '[')) {
                                                $mobile_numbers = json_decode($mobile_numbers, true);
                                            } else {
                                                $mobile_numbers = [$mobile_numbers];
                                            }
                                        @endphp
                                        @foreach($mobile_numbers as $number)
                                            <p>{{ $number }}</p>
                                        @endforeach
                                    @endif
                                    @if(isset($global_settings['phone_india_landline']))
                                        <p>{{ $global_settings['phone_india_landline'] }}</p>
                                    @endif
                                    @if(!isset($global_settings['phone_india']) && !isset($global_settings['phone_india_landline']))
                                        <p>+91 7292 050505</p>
                                        <p>0124-4252-196</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Social Presence -->
                        @if(isset($global_social_links) && $global_social_links->count() > 0)
                            <div class="premium-social-presence mt-5">
                                <h4 class="mb-4">Follow Our Journey</h4>
                                <div class="social-circles">
                                    @foreach($global_social_links as $link)
                                        <a href="{{ $link->url }}" class="social-circle" target="_blank"
                                            title="{{ $link->platform }}">
                                            <i class="{{ $link->icon }}"></i>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="premium-social-presence mt-5">
                                <h4 class="mb-4">Follow Our Journey</h4>
                                <div class="social-circles">
                                    <a href="#" class="social-circle"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#" class="social-circle"><i class="fa-brands fa-x-twitter"></i></a>
                                    <a href="#" class="social-circle"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Right Column: Contact Form -->
                    <div class="contact-form-column">
                        <div class="premium-glass-card">
                            <div class="form-header mb-5">
                                <h2>Send Us a Message</h2>
                                <p class="text-muted">Fill out the form below and we'll get back to you within 24 hours.</p>
                            </div>

                            <form action="{{ route('contact.submit') }}" method="POST" id="premiumContactForm">
                                @csrf
                                <div class="floating-group">
                                    <input type="text" name="name" class="premium-input" id="name" placeholder=" " required>
                                    <label for="name">Your Full Name</label>
                                    <div class="input-focus-glow"></div>
                                </div>

                                <div class="floating-group">
                                    <input type="email" name="email" class="premium-input" id="email" placeholder=" "
                                        required>
                                    <label for="email">Email Address</label>
                                    <div class="input-focus-glow"></div>
                                </div>

                                <div class="floating-group">
                                    <input type="text" name="phone" class="premium-input" id="phone" placeholder=" "
                                        required>
                                    <label for="phone">Phone Number</label>
                                    <div class="input-focus-glow"></div>
                                </div>

                                <div class="floating-group">
                                    <textarea name="message" class="premium-input" id="message" rows="4" placeholder=" "
                                        required></textarea>
                                    <label for="message">Your Message</label>
                                    <div class="input-focus-glow"></div>
                                </div>

                                <button type="submit" class="premium-cta-btn">
                                    <span>Send Message</span>
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="premium-map-section">
            <div class="container">
                <div class="map-visual-frame">
                    <div class="map-header-premium mb-4 text-center">
                        <span class="map-tag-premium">
                            <i class="fas fa-map-pin text-danger me-2"></i> Find Us on Google Maps
                        </span>
                    </div>
                    <div class="map-container-wrapper">
                        <iframe
                            src="{{ $global_settings['google_map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14030.765692019864!2d77.0456187!3d28.4713915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d190479d5057d%3A0xe54eaf95542289!2zTCAxMywgU2VjdG9yIDE0LCBHdXJ1Z3JhbSwgSGFyeWFuYSAxMjIwMDE!5e0!3m2!1sen!2sin!4v1706256000000' }}"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <div class="map-overlay-v2"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- AOS Integration -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Form Micro-interaction: Focus states
        document.querySelectorAll('.premium-input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('is-focused');
            });
            input.addEventListener('blur', () => {
                if (input.value === '') {
                    input.parentElement.classList.remove('is-focused');
                }
            });
        });

        // AJAX Form Submission
        document.getElementById('premiumContactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            const btn = form.querySelector('.premium-cta-btn');
            const btnText = btn.querySelector('span');
            const originalText = btnText.textContent;

            // Loading State
            btn.disabled = true;
            btnText.innerHTML = '<i class="fas fa-circle-notch fa-spin me-2"></i> Sending...';

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (typeof window.showModal === 'function') {
                            window.showModal();
                        } else {
                            alert(data.message);
                        }
                        form.reset();
                        // Reset focus states
                        document.querySelectorAll('.is-focused').forEach(el => el.classList.remove('is-focused'));
                    } else {
                        alert(data.message || 'Something went wrong.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again later.');
                })
                .finally(() => {
                    btn.disabled = false;
                    btnText.textContent = originalText;
                });
        });
    </script>

    <style>
        /* --- Premium Light Theme Contact Redesign Styles --- */

        .contact-page-wrapper {
            background: #ffffff;
            /* White base */
            color: #1e293b;
            /* Dark slate text */
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
            position: relative;
            z-index: 10;
        }

        /* Hero Section v2 Light */
        .contact-hero-v2 {
            padding: 220px 0 120px;
            background: radial-gradient(circle at 10% 20%, rgba(56, 189, 248, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(2, 132, 199, 0.05) 0%, transparent 40%),
                #f8fafc;
            /* Very light blue-gray */
            position: relative;
        }

        .premium-display-title {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -2px;
            color: #0f172a;
        }

        .premium-text-gradient {
            background: linear-gradient(90deg, #0284c7, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .premium-hero-lead {
            font-size: 1.2rem;
            color: #64748b;
            line-height: 1.8;
        }

        /* Layout Grid */
        .premium-contact-section {
            padding: 80px 0;
            position: relative;
            background: #ffffff;
        }

        .contact-layout-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 80px;
            align-items: center;
        }

        /* Info Column */
        .section-label {
            color: #0284c7;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 700;
            font-size: 0.85rem;
        }

        .column-heading {
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            color: #0f172a;
        }

        .column-subtext {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .premium-info-list {
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .premium-info-item {
            display: flex;
            gap: 25px;
            align-items: center;
            padding: 20px;
            border-radius: 20px;
            background: transparent;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .premium-info-item:hover {
            background: #f1f5f9;
            transform: translateX(10px);
            box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.05);
        }

        .info-icon-wrapper {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #0284c7;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .premium-info-item:hover .info-icon-wrapper {
            background: #0284c7;
            color: #fff;
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.3);
        }

        .info-details h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: #1e293b;
        }

        .info-details p {
            margin: 0;
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Social Presence */
        .premium-social-presence h4 {
            color: #0f172a;
            font-weight: 700;
        }

        .social-circles {
            display: flex;
            gap: 15px;
        }

        .social-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-size: 1.2rem;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .social-circle i.fa-linkedin-in {
            color: #0077b5;
        }

        .social-circle i.fa-x-twitter {
            color: #000000;
        }

        .social-circle i.fa-instagram {
            color: #e1306c;
        }

        .social-circle:hover {
            background: #0284c7;
            color: #fff;
            border-color: #0284c7;
            transform: translateY(-5px) rotate(360deg);
            box-shadow: 0 10px 20px rgba(56, 189, 248, 0.2);
        }

        .social-circle:hover i {
            color: #fff !important;
        }

        /* Contact Form Column Light Mode Glass */
        .premium-glass-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 32px;
            padding: 50px;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 10;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 15px;
        }

        /* Floating Labels Light Mode */
        .floating-group {
            position: relative;
            margin-bottom: 45px;
            /* Significant spacing between boxes */
        }

        .premium-input {
            width: 100%;
            background: #f8fafc;
            border: 2px solid #eef2f6;
            border-radius: 18px;
            padding: 28px 24px 12px;
            color: #1e293b;
            font-size: 1.05rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.01);
        }

        .premium-input:hover {
            border-color: #cbd5e1;
            background: #f1f5f9;
        }

        .floating-group label {
            position: absolute;
            left: 24px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            font-size: 1rem;
        }

        .premium-input:focus~label,
        .premium-input:not(:placeholder-shown)~label {
            top: 18px;
            left: 24px;
            font-size: 0.7rem;
            font-weight: 800;
            color: #0284c7;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .premium-input:focus {
            border-color: #0284c7;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(2, 132, 199, 0.1), 0 0 0 4px rgba(2, 132, 199, 0.05);
        }

        .input-focus-glow {
            position: absolute;
            inset: 0;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(2, 132, 199, 0);
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: -1;
        }

        /* CTA Button Gradient */
        .premium-cta-btn {
            width: 100%;
            padding: 20px;
            border-radius: 16px;
            border: none;
            background: linear-gradient(90deg, #0284c7, #38bdf8);
            color: #fff;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .premium-cta-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(2, 132, 199, 0.3);
            letter-spacing: 3px;
        }

        /* Map Section Retrofit */
        .premium-map-section {
            padding: 120px 0;
            background: #060913;
            /* Premium Dark Background */
        }

        .map-visual-frame {
            padding: 40px 10px;
            /* Reduced side padding */
            border: 2px solid rgba(56, 189, 248, 0.05);
            border-radius: 40px;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .map-visual-frame:hover {
            padding: 60px 20px;
            /* Reduced side padding on hover */
            border-color: #0284c7;
            box-shadow: 0 40px 100px rgba(2, 132, 199, 0.15);
        }

        .map-tag-premium {
            color: #fff;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            display: inline-block;
        }

        .map-container-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            height: 500px;
        }

        .map-overlay-v2 {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(6, 9, 19, 0.2) 0%, transparent 20%, transparent 80%, rgba(6, 9, 19, 0.2) 100%);
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .contact-layout-grid {
                gap: 50px;
            }
        }

        @media (max-width: 992px) {
            .contact-layout-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .premium-info-item {
                justify-content: center;
            }

            .social-circles {
                justify-content: center;
            }

            .premium-glass-card {
                padding: 40px 20px;
            }
        }
    </style>
@endsection