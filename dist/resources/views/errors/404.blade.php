@extends('layouts.app')

@section('content')
    <div class="error-page-wrapper"
        style="min-height: 80vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; background: #0b1120; padding: 100px 20px;">

        <!-- Background Elements -->
        <div class="error-bg-glow"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%); pointer-events: none; z-index: 1;">
        </div>

        <div class="container"
            style="max-width: 800px; margin: 0 auto; text-align: center; position: relative; z-index: 2;">

            <!-- Animated 404 Text -->
            <div class="error-code-container" style="margin-bottom: 40px;">
                <h1 class="error-code"
                    style="font-size: clamp(8rem, 15vw, 12rem); font-weight: 900; line-height: 1; margin: 0; font-family: 'Outfit', sans-serif; background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; filter: drop-shadow(0 0 30px rgba(59, 130, 246, 0.3)); letter-spacing: -5px;">
                    404
                </h1>
            </div>

            <!-- Error Message -->
            <div class="error-content">
                <h2
                    style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: #fff; margin-bottom: 20px; font-family: 'Outfit', sans-serif;">
                    Page <span style="color: #3b82f6;">Not Found</span>
                </h2>
                <p
                    style="font-size: 1.15rem; color: #94a3b8; line-height: 1.8; margin-bottom: 45px; max-width: 600px; margin-left: auto; margin-right: auto;">
                    The link you followed may be broken, or the page may have been moved. Let's get you back on track to
                    your digital innovation journey.
                </p>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="/" class="btn-error-primary"
                        style="background: #3b82f6; color: #fff; padding: 14px 35px; border-radius: 12px; font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 10px; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                    <a href="/services" class="btn-error-secondary"
                        style="background: rgba(255, 255, 255, 0.05); color: #fff; padding: 14px 35px; border-radius: 12px; font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease;">
                        Our Services <i class="fas fa-arrow-right" style="font-size: 0.9em;"></i>
                    </a>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="error-decoration"
                style="margin-top: 80px; display: flex; justify-content: center; gap: 40px; opacity: 0.5;">
                <i class="fas fa-code-branch" style="font-size: 2rem; color: #3b82f6;"></i>
                <i class="fas fa-microchip" style="font-size: 2.5rem; color: #06b6d4;"></i>
                <i class="fas fa-network-wired" style="font-size: 2rem; color: #3b82f6;"></i>
            </div>
        </div>

        <!-- Extra CSS for Animations -->
        <style>
            .error-code {
                animation: floating 6s ease-in-out infinite;
            }

            @keyframes floating {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-20px);
                }
            }

            .btn-error-primary:hover {
                background: #2563eb;
                transform: translateY(-3px);
                box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
            }

            .btn-error-secondary:hover {
                background: rgba(255, 255, 255, 0.1);
                border-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-3px);
            }

            @media (max-width: 768px) {
                .error-page-wrapper {
                    padding: 60px 20px;
                }
            }
        </style>
    </div>
@endsection