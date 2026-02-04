<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexusCore Solutions - Enterprise IT Demo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Watermark Style */
        .demo-watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            /* Extremely subtle tint */
            overflow: hidden;
        }

        .watermark-text {
            font-size: 4rem;
            font-weight: 800;
            color: rgba(150, 150, 150, 0.15);
            transform: rotate(-30deg);
            white-space: nowrap;
            user-select: none;
            text-transform: uppercase;
        }

        .watermark-grid {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            display: flex;
            flex-wrap: wrap;
            transform: rotate(-30deg);
            opacity: 0.1;
        }

        .watermark-item {
            font-size: 2rem;
            font-weight: 700;
            color: #000;
            margin: 50px;
            opacity: 0.1;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <!-- Watermark Overlay -->
    <div class="demo-watermark">
        <div class="watermark-grid">
            <!-- Repeating pattern for watermark -->
            @for($i = 0; $i < 100; $i++)
                <div class="watermark-item">DEMO PROJECT – PORTFOLIO ONLY</div>
            @endfor
        </div>
    </div>

    <!-- Fake Browser Bar (To mimic "Browser Frame" request) -->
    <div class="sticky top-0 z-50 bg-slate-900 text-white py-2 px-4 shadow-lg flex items-center gap-4">
        <div class="flex gap-2">
            <div class="w-3 h-3 rounded-full bg-red-500"></div>
            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
            <div class="w-3 h-3 rounded-full bg-green-500"></div>
        </div>
        <div class="flex-1 bg-slate-800 rounded px-4 py-1 text-xs text-slate-400 font-mono text-center">
            https://www.nexuscore-demo.internal/enterprise-solutions
        </div>
    </div>

    <!-- Navigation -->
    <nav class="absolute w-full z-40 top-12 px-8 py-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold tracking-tighter text-slate-900">
                Nexus<span class="text-blue-600">Core</span>
            </div>
            <div class="hidden md:flex gap-8 font-medium text-sm">
                <a href="#" class="hover:text-blue-600 transition">Solutions</a>
                <a href="#" class="hover:text-blue-600 transition">Platform</a>
                <a href="#" class="hover:text-blue-600 transition">Enterprise</a>
                <a href="#" class="px-5 py-2 bg-slate-900 text-white rounded-full hover:bg-slate-800 transition">Contact
                    Sales</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-40 pb-20 px-8 overflow-hidden">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            <div class="relative z-10">
                <div
                    class="inline-block px-4 py-1.5 mb-6 rounded-full bg-blue-50 text-blue-600 font-semibold text-xs tracking-wide uppercase border border-blue-100">
                    Next Generation Cloud Infrastructure
                </div>
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6 tracking-tight text-slate-900">
                    Scalable IT for the <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Digital
                        Age</span>.
                </h1>
                <p class="text-lg text-slate-600 mb-8 max-w-lg leading-relaxed">
                    We architect robust, secure, and scalable digital ecosystems for Fortune 500 enterprises. Streamline
                    your operations with our AI-driven cloud solutions.
                </p>
                <div class="flex gap-4">
                    <button
                        class="px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition transform hover:-translate-y-1">
                        Start Free Trial
                    </button>
                    <button
                        class="px-8 py-4 bg-white text-slate-700 border border-slate-200 font-semibold rounded-lg hover:bg-slate-50 transition">
                        View Documentation
                    </button>
                </div>

                <div class="mt-12 flex items-center gap-6 text-slate-400">
                    <span class="text-sm font-semibold uppercase tracking-wider">Trusted By:</span>
                    <div class="flex gap-4 opacity-60 grayscale">
                        <div class="h-6 w-20 bg-slate-300 rounded"></div>
                        <div class="h-6 w-20 bg-slate-300 rounded"></div>
                        <div class="h-6 w-20 bg-slate-300 rounded"></div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div
                    class="absolute inset-0 bg-gradient-to-tr from-blue-50 to-indigo-50 rounded-3xl transform rotate-3 scale-105 -z-10">
                </div>
                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=1600"
                    alt="Technology Dashboard"
                    class="rounded-2xl shadow-2xl border border-white/50 w-full object-cover h-[500px]">

                <!-- Floating Stats Card -->
                <div class="absolute -bottom-10 -left-10 glass-panel p-6 rounded-xl max-w-xs animate-bounce"
                    style="animation-duration: 3s;">
                    <div class="flex items-center gap-4 mb-3">
                        <div
                            class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm text-slate-500">System Uptime</div>
                            <div class="text-xl font-bold text-slate-900">99.99%</div>
                        </div>
                    </div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 w-[99%]"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Enterprise-Grade Modules</h2>
                <p class="text-slate-500">Our platform consists of loosely coupled modular components that can be
                    deployed independently.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div
                    class="p-8 rounded-2xl border border-slate-100 bg-slate-50 hover:shadow-xl transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Cloud Storage</h3>
                    <p class="text-slate-500 leading-relaxed mb-6">Secure, redundant, and globally distributed object
                        storage for your mission-critical data assets.</p>
                    <a href="#"
                        class="text-blue-600 font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">Learn
                        more <span>&rarr;</span></a>
                </div>

                <!-- Card 2 -->
                <div
                    class="p-8 rounded-2xl border border-slate-100 bg-slate-50 hover:shadow-xl transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-indigo-600 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Cyber Security</h3>
                    <p class="text-slate-500 leading-relaxed mb-6">Advanced threat detection and automated response
                        protocols to keep your infrastructure safe.</p>
                    <a href="#"
                        class="text-indigo-600 font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">Learn
                        more <span>&rarr;</span></a>
                </div>

                <!-- Card 3 -->
                <div
                    class="p-8 rounded-2xl border border-slate-100 bg-slate-50 hover:shadow-xl transition duration-300 group">
                    <div
                        class="w-14 h-14 bg-violet-600 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Data Analytics</h3>
                    <p class="text-slate-500 leading-relaxed mb-6">Real-time insights and predictive modeling powered by
                        our proprietary machine learning engine.</p>
                    <a href="#"
                        class="text-violet-600 font-semibold flex items-center gap-2 group-hover:gap-3 transition-all">Learn
                        more <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 px-8">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8">
            <div class="col-span-2">
                <div class="text-2xl font-bold text-white mb-4">NexusCore</div>
                <p class="max-w-xs text-slate-400">Engineering the future of enterprise software, one commit at a time.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Product</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Features</a></li>
                    <li><a href="#" class="hover:text-white">Pricing</a></li>
                    <li><a href="#" class="hover:text-white">Enterprise</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">About Us</a></li>
                    <li><a href="#" class="hover:text-white">Careers</a></li>
                    <li><a href="#" class="hover:text-white">Legal</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto mt-12 pt-8 border-t border-slate-800 text-xs text-center text-slate-500">
            &copy; 2026 NexusCore Solutions Inc. All rights reserved.
        </div>
    </footer>

</body>

</html>