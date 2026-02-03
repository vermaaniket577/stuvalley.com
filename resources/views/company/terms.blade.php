@extends('layouts.app')
@section('header_class', 'scrolled')

@section('content')
    <div class="company-page terms-page">

        <!-- Hero Section -->
        <section class="terms-hero">
            <div class="container text-center">
                <span class="badge-pill">Legal</span>
                <h1 class="display-title">Terms & Conditions</h1>
                <p class="hero-lead">Last updated: 26 January 2026</p>
            </div>
        </section>

        <!-- Content Section -->
        <section class="terms-content-section">
            <div class="container">
                <div class="terms-card">

                    <!-- Introduction -->
                    <div class="terms-intro">
                        <p>Welcome to <strong>Stuvalley Technology Pvt. Ltd.</strong> ("Company", "we", "our", "us"). By
                            accessing or using our website, services, or products, you agree to comply with and be bound by
                            the following Terms & Conditions. Please read them carefully.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 1 -->
                    <div class="terms-section">
                        <h2>1. Acceptance of Terms</h2>
                        <p>By accessing this website or engaging our services, you acknowledge that you have read,
                            understood, and agree to be legally bound by these Terms & Conditions. If you do not agree,
                            please discontinue use of our website and services.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 2 -->
                    <div class="terms-section">
                        <h2>2. Services & Use License</h2>
                        <p>Stuvalley Technology Pvt. Ltd. provides web development, mobile application development, software
                            solutions, digital marketing, and related IT services.</p>
                        <ul>
                            <li>Permission is granted to temporarily access our website for personal or business evaluation.
                            </li>
                            <li>You may <strong>not</strong> modify, copy, distribute, sell, or exploit any material without
                                written consent.</li>
                            <li>Unauthorized use may result in termination of access and legal action.</li>
                        </ul>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 3 -->
                    <div class="terms-section">
                        <h2>3. Intellectual Property Rights</h2>
                        <p>All content on this website, including but not limited to text, graphics, logos, code, UI/UX
                            designs, and software, is the intellectual property of Stuvalley Technology Pvt. Ltd. and is
                            protected under applicable copyright and trademark laws.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 4 -->
                    <div class="terms-section">
                        <h2>4. User Responsibilities</h2>
                        <p>You agree:</p>
                        <ul>
                            <li>Not to misuse or attempt to disrupt our website or services</li>
                            <li>Not to submit false or misleading information</li>
                            <li>To comply with all applicable local, national, and international laws</li>
                        </ul>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 5 -->
                    <div class="terms-section">
                        <h2>5. Payments & Project Engagement</h2>
                        <ul>
                            <li>Project pricing, timelines, and deliverables are defined in formal proposals or agreements.
                            </li>
                            <li>Payments once made are <strong>non-refundable</strong>, unless otherwise specified in
                                writing.</li>
                            <li>Delays in payment may result in suspension of services.</li>
                        </ul>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 6 -->
                    <div class="terms-section">
                        <h2>6. Disclaimer</h2>
                        <p>All services and content are provided <strong>"as is"</strong> without warranties of any kind. We
                            do not guarantee uninterrupted service, error-free functionality, or specific business outcomes.
                        </p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 7 -->
                    <div class="terms-section">
                        <h2>7. Limitation of Liability</h2>
                        <p>Stuvalley Technology Pvt. Ltd. shall not be liable for any direct, indirect, incidental, or
                            consequential damages arising from the use or inability to use our services, even if advised of
                            such possibilities.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 8 -->
                    <div class="terms-section">
                        <h2>8. Third-Party Links</h2>
                        <p>Our website may contain links to third-party websites. We are not responsible for the content,
                            privacy policies, or practices of any third-party sites.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 9 -->
                    <div class="terms-section">
                        <h2>9. Termination</h2>
                        <p>We reserve the right to suspend or terminate access to our services at any time without notice if
                            these Terms are violated.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 10 -->
                    <div class="terms-section">
                        <h2>10. Governing Law</h2>
                        <p>These Terms shall be governed and interpreted in accordance with the laws of
                            <strong>India</strong>. Any disputes shall be subject to the jurisdiction of courts located in
                            <strong>Gurugram, Haryana</strong>.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 11 -->
                    <div class="terms-section">
                        <h2>11. Changes to Terms</h2>
                        <p>We reserve the right to modify these Terms & Conditions at any time. Continued use of our
                            services after changes implies acceptance of the updated terms.</p>
                    </div>

                    <div class="terms-divider"></div>

                    <!-- Section 12 -->
                    <div class="terms-section">
                        <h2>12. Contact Information</h2>
                        <p>For any questions regarding these Terms & Conditions, please contact:</p>
                        <div class="contact-box">
                            <p><strong>Stuvalley Technology Pvt. Ltd.</strong></p>
                            <p>📧 Email: <a href="mailto:info@stuvalley.com">info@stuvalley.com</a></p>
                            <p>📍 Gurugram, Haryana, India</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <style>
        .terms-page {
            background: #0f172a;
            min-height: 100vh;
        }

        .terms-hero {
            padding: 160px 0 80px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            position: relative;
        }

        .terms-hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.1), transparent 70%);
            pointer-events: none;
        }

        .badge-pill {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 50px;
            color: #38bdf8;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .display-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .hero-lead {
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .terms-content-section {
            padding: 80px 0 120px;
        }

        .terms-card {
            max-width: 900px;
            margin: 0 auto;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.03), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 60px;
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .terms-intro {
            margin-bottom: 40px;
        }

        .terms-intro p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .terms-section {
            margin: 40px 0;
        }

        .terms-section h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
            padding-left: 20px;
        }

        .terms-section h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: linear-gradient(180deg, #38bdf8, #818cf8);
            border-radius: 2px;
        }

        .terms-section p {
            font-size: 1rem;
            line-height: 1.8;
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .terms-section ul {
            list-style: none;
            padding-left: 0;
            margin: 20px 0;
        }

        .terms-section ul li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            color: #94a3b8;
            line-height: 1.6;
        }

        .terms-section ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #38bdf8;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .terms-section strong {
            color: #e2e8f0;
            font-weight: 600;
        }

        .terms-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            margin: 40px 0;
        }

        .contact-box {
            background: rgba(56, 189, 248, 0.05);
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
        }

        .contact-box p {
            margin-bottom: 8px;
            color: #cbd5e1;
        }

        .contact-box a {
            color: #38bdf8;
            text-decoration: none;
            transition: 0.3s;
        }

        .contact-box a:hover {
            color: #818cf8;
            text-decoration: underline;
        }

        @media(max-width: 768px) {
            .display-title {
                font-size: 2.5rem;
            }

            .terms-card {
                padding: 40px 30px;
            }

            .terms-section h2 {
                font-size: 1.3rem;
            }
        }
    </style>
@endsection