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
        min-height: 700px;
        align-items: stretch;
    }

    /* Left Side - Visual (Dark Blue) */
    .contact-visual {
        background: #001f3f;
        /* Deep navy blue */
        background: linear-gradient(135deg, #001529 0%, #001f3f 100%);
        padding: 80px 10%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        color: white;
        overflow: hidden;
    }

    .visual-content {
        position: relative;
        z-index: 2;
        max-width: 550px;
    }

    .contact-tagline {
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        margin-bottom: 25px;
        color: #fff;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        opacity: 0.8;
    }

    .tagline-pipe {
        width: 2px;
        height: 18px;
        background: #3b82f6;
        border-radius: 2px;
    }

    .contact-heading {
        font-size: clamp(2.5rem, 4.5vw, 3.8rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 30px;
        font-family: 'Playfair Display', serif;
        color: #ffffff;
        letter-spacing: -1px;
    }

    .contact-desc {
        font-size: 1.2rem;
        line-height: 1.7;
        opacity: 0.85;
        max-width: 500px;
        font-weight: 400;
        color: #cbd5e1;
        font-family: 'Manrope', sans-serif;
    }

    /* Right Side - Form (White) */
    .contact-form-wrapper {
        background: #ffffff;
        padding: 80px 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .premium-form-card {
        background: #ffffff;
        padding: 50px;
        border-radius: 24px;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 600px;
        border: 1px solid #f1f5f9;
        position: relative;
        z-index: 2;
    }

    .pfc-header {
        margin-bottom: 45px;
    }

    .pfc-title {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 12px;
        letter-spacing: -1.5px;
        font-family: 'Outfit', sans-serif;
    }

    .pfc-header p {
        font-size: 1.1rem;
        color: #64748b;
        font-weight: 500;
        line-height: 1.5;
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
        padding: 18px 24px;
        border: 2px solid transparent;
        border-radius: 12px;
        font-size: 1rem;
        background: #f4f7fa;
        /* Light gray background as in image */
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
        background-position: right 24px center;
        background-size: 20px;
    }

    .btn-submit-premium {
        width: 100%;
        padding: 20px;
        background: #3b82f6;
        /* Solid bright blue from image */
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 12px 30px -10px rgba(59, 130, 246, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-transform: none;
        margin-top: 10px;
    }

    .btn-submit-premium:hover {
        background: #2563eb;
        transform: translateY(-3px);
        box-shadow: 0 15px 40px -12px rgba(37, 99, 235, 0.6);
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
            padding: 100px 5%;
            text-align: center;
        }

        .contact-desc {
            margin: 0 auto;
        }

        .contact-form-wrapper {
            padding: 80px 5%;
        }

        .premium-form-card {
            padding: 40px 30px;
        }
    }

    @media (max-width: 640px) {
        .grid-2 {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .pfc-title {
            font-size: 2.2rem;
        }

        .contact-heading {
            font-size: 2.5rem;
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