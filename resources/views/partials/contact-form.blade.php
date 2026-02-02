<section id="contact" class="contact-form-section">
    <div class="contact-grid">
        <!-- Visual Side -->
        <div class="contact-visual">
            <div class="visual-overlay-pattern"></div>
            <div class="visual-content">
                <div class="contact-tagline">
                    <span class="tagline-pipe"></span>
                    REACH OUT
                </div>
                <h2 class="contact-heading">Partnering for Business Success</h2>
                <p class="contact-desc">
                    Ready to transform your digital presence? Our experts are here to guide you through every step
                    of the journey. Let's create something extraordinary together.
                </p>
            </div>
        </div>

        <!-- Form Side -->
        <div class="contact-form-wrapper">
            <div class="premium-form-card">
                <div class="pfc-header">
                    <h3 class="pfc-title">Get in Touch</h3>
                    <p style="color: #64748b;">Fill out the form below and we'll reply within 24 hours.</p>
                </div>

                <form id="premiumContactForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="full_name" class="form-input" placeholder="Full Name *" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <input type="email" name="email" class="form-input" placeholder="Email Address *" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-input" placeholder="Phone Number *" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="service" class="form-select" required>
                            <option value="" disabled selected>Select Service</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Mobile Apps">Mobile Apps</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Enterprise Solutions">Enterprise Solutions</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea name="message" class="form-textarea" rows="4"
                            placeholder="How can we help you?"></textarea>
                    </div>

                    <button type="submit" class="btn-submit-premium">
                        <span class="btn-text">Submit Request</span>
                        <div class="loading-spinner"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* Premium Contact Section Styles */
    .contact-form-section {
        position: relative !important;
        padding: 0 !important;
        margin: 0 !important;
        background: #ffffff !important;
        /* Light background for the whole section */
        z-index: 10 !important;
        display: block !important;
        width: 100%;
        overflow: hidden;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        max-width: 100%;
        margin: 0;
        min-height: 620px;
        /* More compact grid */
        align-items: stretch;
    }

    /* Left Side - Visual */
    .contact-visual {
        background: linear-gradient(135deg, #001e3c 0%, #003366 100%);
        padding: 80px 10%;
        /* Reduced padding */
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        color: white;
        overflow: hidden;
    }

    /* World Map Overlay */
    .contact-visual::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_blank_gray_outline.svg');
        background-size: 150%;
        background-position: center;
        opacity: 0.08;
        filter: invert(1);
        /* Make it white */
        mix-blend-mode: screen;
        pointer-events: none;
    }

    .visual-content {
        position: relative;
        z-index: 2;
    }

    .contact-tagline {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 30px;
        color: #60a5fa;
        display: inline-flex;
        align-items: center;
        gap: 12px;
    }

    .tagline-pipe {
        width: 3px;
        height: 14px;
        background: #60a5fa;
        border-radius: 2px;
    }

    .contact-heading {
        font-size: clamp(2.2rem, 3.5vw, 3.2rem);
        /* Slightly smaller for better fit */
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 25px;
        font-family: 'Playfair Display', "Georgia", serif;
        color: #ffffff;
    }

    .contact-desc {
        font-size: 1.15rem;
        line-height: 1.7;
        opacity: 0.9;
        max-width: 500px;
        font-weight: 400;
        color: #cbd5e1;
    }

    /* Right Side - Form */
    .contact-form-wrapper {
        background: #ffffff;
        padding: 60px 5%;
        /* Tightened padding */
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    /* Background noise/pattern for light side */
    .contact-form-wrapper::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.02'/%3E%3C/svg%3E");
        pointer-events: none;
    }

    .premium-form-card {
        background: #ffffff;
        padding: 40px;
        /* Reduced from 50px */
        border-radius: 24px;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 520px;
        border: 1px solid rgba(0, 0, 0, 0.03);
        position: relative;
        z-index: 2;
    }

    .pfc-header {
        margin-bottom: 40px;
    }

    .pfc-title {
        font-size: 2.2rem;
        font-weight: 900;
        /* Max boldness */
        color: #0f172a;
        margin-bottom: 12px;
        letter-spacing: -1px;
        /* Tighter for professional look */
        font-family: 'Outfit', sans-serif;
        /* Use modern Outfit font */
    }

    .pfc-header p {
        font-size: 1rem;
        color: #64748b;
        font-weight: 500;
    }

    /* Form Fields */
    .form-group {
        margin-bottom: 24px;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 16px 20px;
        border: 1.5px solid #f1f5f9;
        border-radius: 12px;
        font-size: 0.95rem;
        background: #f8fafc;
        color: #0f172a;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-family: 'Manrope', sans-serif;
    }

    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #94a3b8;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #3b82f6;
        background: #ffffff;
        box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .form-select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        background-size: 18px;
    }

    .btn-submit-premium {
        width: 100%;
        padding: 18px;
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px -8px rgba(37, 99, 235, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit-premium:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 12px 30px -10px rgba(37, 99, 235, 0.6);
    }

    .loading-spinner {
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s linear infinite;
        display: none;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 1024px) {
        .contact-grid {
            grid-template-columns: 1fr;
            min-height: auto;
        }

        .contact-visual {
            padding: 80px 5%;
            text-align: center;
        }

        .contact-desc {
            margin: 0 auto;
        }

        .contact-form-wrapper {
            padding: 60px 5%;
        }

        .premium-form-card {
            padding: 40px 25px;
        }
    }

    @media (max-width: 640px) {
        .grid-2 {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .pfc-title {
            font-size: 1.8rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('premiumContactForm');

        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const btn = form.querySelector('.btn-submit-premium');
                const spinner = btn.querySelector('.loading-spinner');
                const btnText = btn.querySelector('.btn-text');

                btn.disabled = true;
                if (btnText) btnText.style.display = 'none';
                if (spinner) spinner.style.display = 'block';

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        setTimeout(() => {
                            if (typeof window.showModal === 'function') {
                                window.showModal();
                            } else {
                                alert('Request sent successfully!');
                            }
                        }, 800);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Something went wrong. Please try again.');
                    })
                    .finally(() => {
                        setTimeout(() => {
                            btn.disabled = false;
                            if (btnText) btnText.style.display = 'block';
                            if (spinner) spinner.style.display = 'none';
                            form.reset();
                        }, 800);
                    });
            });
        }
    });
</script>