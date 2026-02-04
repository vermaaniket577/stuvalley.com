@extends('layouts.app')

@section('title', 'Get a Quote - StuValley')

@section('content')
    <div class="quote-page-wrapper">

        <!-- Hero Section -->
        <section class="quote-hero">
            <div class="container text-center">
                <h1 class="quote-title">Let's Build Something <span class="text-gradient-gold">Extraordinary</span></h1>
                <p class="quote-subtitle">Tell us what you need. We'll analyze your requirements and provide a detailed breakdown within 24 hours.</p>
                <div class="hero-actions">
                    <button onclick="scrollToForm()" class="btn-start">Start Your Quote <i class="fas fa-arrow-down"></i></button>
                    <a href="https://wa.me/919172920505" target="_blank" class="btn-contact"><i class="fab fa-whatsapp"></i> Quick Chat</a>
                </div>
                <div class="trust-badges">
                    <span><i class="fas fa-check-circle"></i> Confidential</span>
                    <span><i class="fas fa-bolt"></i> Fast Response</span>
                    <span><i class="fas fa-shield-alt"></i> No Obligation</span>
                </div>
            </div>
        </section>

        <!-- Process Timeline -->
        <section class="process-section">
            <div class="container">
                <h2 class="section-heading text-center">How It Works</h2>
                <div class="timeline-container">
                    <div class="timeline-line"></div>
                    <div class="timeline-step">
                        <div class="t-icon"><i class="fas fa-file-alt"></i></div>
                        <h4>1. Request</h4>
                        <p>Share details</p>
                    </div>
                    <div class="timeline-step">
                        <div class="t-icon"><i class="fas fa-search-dollar"></i></div>
                        <h4>2. Analysis</h4>
                        <p>We review scope</p>
                    </div>
                    <div class="timeline-step">
                        <div class="t-icon"><i class="fas fa-paper-plane"></i></div>
                        <h4>3. Proposal</h4>
                        <p>Get quote & timeline</p>
                    </div>
                    <div class="timeline-step">
                        <div class="t-icon"><i class="fas fa-rocket"></i></div>
                        <h4>4. Kickoff</h4>
                        <p>Start development</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quote Wizard Form -->
        <section class="form-section" id="quote-form-section">
            <div class="container">
                <div class="form-card">

                    <!-- Progress Header -->
                    <div class="form-header">
                        <div class="progress-bar-container">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                        <div class="steps-indicator">
                            <span class="step-dot active" data-step="1">1</span>
                            <span class="step-dot" data-step="2">2</span>
                            <span class="step-dot" data-step="3">3</span>
                            <span class="step-dot" data-step="4">4</span>
                            <span class="step-dot" data-step="5">5</span>
                        </div>
                        <h3 class="step-title" id="step-title">Select Service</h3>
                    </div>

                    <form id="wizardForm" onsubmit="return false;">
                        @csrf

                        <!-- Step 1: Service Type -->
                        <div class="wizard-step active" id="step-1">
                            <div class="services-grid">
                                <label class="service-option">
                                    <input type="radio" name="service" value="Website Development" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-laptop-code"></i>
                                        <span>Website Dev</span>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="App Development" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-mobile-alt"></i>
                                        <span>App Dev</span>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="Digital Marketing" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-bullhorn"></i>
                                        <span>Marketing</span>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="UI/UX Design" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-paint-brush"></i>
                                        <span>UI/UX Design</span>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="Software" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-cogs"></i>
                                        <span>Custom Software</span>
                                    </div>
                                </label>
                                <label class="service-option">
                                    <input type="radio" name="service" value="Other" onchange="nextStep()">
                                    <div class="so-content">
                                        <i class="fas fa-ellipsis-h"></i>
                                        <span>Other</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Step 2: Project Details -->
                        <div class="wizard-step" id="step-2">
                            <div class="input-group">
                                <label>Tell us about your project *</label>
                                <textarea name="details" id="details-input" rows="6" placeholder="Describe your idea based on goals, features, and target audience..."></textarea>
                                <div class="error-msg" id="err-details">Please describe your project.</div>
                            </div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="prevStep()">Back</button>
                                <button class="btn-next" onclick="validateStep2()">Next</button>
                            </div>
                        </div>

                        <!-- Step 3: Budget -->
                        <div class="wizard-step" id="step-3">
                            <label class="section-label">What is your estimated budget?</label>
                            <div class="pill-grid">
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="10k-25k" onchange="nextStep()">
                                    <span>₹10k - ₹25k</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="25k-50k" onchange="nextStep()">
                                    <span>₹25k - ₹50k</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="50k-1L" onchange="nextStep()">
                                    <span>₹50k - ₹1 Lakh</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="1L-3L" onchange="nextStep()">
                                    <span>₹1 Lakh - ₹3 Lakhs</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="3L+" onchange="nextStep()">
                                    <span>₹3 Lakhs+</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="budget" value="Not Sure" onchange="nextStep()">
                                    <span>Not Sure</span>
                                </label>
                            </div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="prevStep()">Back</button>
                            </div>
                        </div>

                        <!-- Step 4: Timeline -->
                        <div class="wizard-step" id="step-4">
                            <label class="section-label">How urgent is this project?</label>
                            <div class="pill-grid">
                                <label class="pill-option">
                                    <input type="radio" name="timeline" value="Urgent" onchange="nextStep()">
                                    <span>Urgent (ASAP)</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="timeline" value="1-2 Weeks" onchange="nextStep()">
                                    <span>1-2 Weeks</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="timeline" value="1 Month" onchange="nextStep()">
                                    <span>Within 1 Month</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="timeline" value="Flexible" onchange="nextStep()">
                                    <span>Flexible</span>
                                </label>
                            </div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="prevStep()">Back</button>
                            </div>
                        </div>

                        <!-- Step 5: Contact Info & Upload -->
                        <div class="wizard-step" id="step-5">
                            <div class="grid-2">
                                <div class="input-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="name" id="name-input" placeholder="John Doe">
                                </div>
                                <div class="input-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company" placeholder="Business Ltd.">
                                </div>
                            </div>
                            <div class="grid-2">
                                <div class="input-group">
                                    <label>Email Address *</label>
                                    <input type="email" name="email" id="email-input" placeholder="john@example.com">
                                </div>
                                <div class="input-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" placeholder="+91 98765 43210">
                                </div>
                            </div>
                            <div class="input-group" style="margin-top: 15px;">
                                <label>Reference Files (Optional)</label>
                                <div class="file-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop here (PDF, Doc, Images)</span>
                                    <input class="file-input" type="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                </div>
                            </div>

                            <div class="estimate-box" id="estimate-box">
                                <span>Estimated Range based on selection:</span>
                                <strong id="price-estimate">--</strong>
                            </div>

                            <div class="step-nav">
                                <button class="btn-back" onclick="prevStep()">Back</button>
                                <button class="btn-submit" onclick="submitForm()">Submit Request</button>
                            </div>
                        </div>

                    </form>

                    <!-- Success Screen -->
                    <div class="success-screen" id="success-screen">
                        <div class="success-icon"><i class="fas fa-check"></i></div>
                        <h3>Request Received!</h3>
                        <p>Thank you for contacting us. We have received your details.</p>
                        <div class="ticket-box">
                            <small>Ticket Reference</small>
                            <strong id="ticket-id">#STU-PENDING</strong>
                        </div>
                        <p class="next-step-text">We will review your requirements and email you a detailed proposal within 24 hours.</p>
                        <div class="success-actions">
                            <a href="/" class="btn-home">Back to Home</a>
                            <a href="https://wa.me/919172920505" target="_blank" class="btn-wa"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <h3 class="text-center mb-5">Frequently Asked Questions</h3>
                <div class="faq-grid">
                    <div class="faq-item">
                        <h5>Is the consultation free?</h5>
                        <p>Yes! The initial consultation and quote estimation are completely free with no obligation.</p>
                    </div>
                    <div class="faq-item">
                        <h5>How accurate is the timeline?</h5>
                        <p>We pride ourselves on meeting deadlines. The timeline provided in the final proposal is fixed.</p>
                    </div>
                    <div class="faq-item">
                        <h5>Do you sign NDAs?</h5>
                        <p>Absolutely. We respect your intellectual property and are happy to sign an NDA before discussions.</p>
                    </div>
                    <div class="faq-item">
                        <h5>What are the payment terms?</h5>
                        <p>Typically 40% upfront, 30% mid-project, and 30% upon completion, but we are flexible.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <style>
        /* Page Layout */
        .quote-page-wrapper {
            padding-top: 100px;
            background: #020617;
            min-height: 100vh;
            color: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        /* Hero */
        .quote-hero {
            padding: 60px 0 40px;
        }
        .quote-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.1;
        }
        .quote-subtitle {
            color: #94a3b8;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
        }
        .hero-actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }
        .btn-start {
            padding: 15px 40px;
            background: var(--primary, #38bdf8);
            color: #0b1120;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-start:hover { box-shadow: 0 0 20px rgba(56,189,248,0.5); transform: translateY(-2px); }
        .btn-contact {
            padding: 15px 40px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-contact:hover { background: rgba(255,255,255,0.2); }
        .trust-badges {
            display: flex;
            gap: 30px;
            justify-content: center;
            color: #64748b;
            font-size: 0.9rem;
        }
        .trust-badges i { color: #38bdf8; margin-right: 8px; }

        /* Timeline */
        .process-section { padding: 40px 0; }
        .timeline-container {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            margin: 40px auto;
            position: relative;
        }
        .timeline-line {
            position: absolute;
            top: 25px;
            left: 0;
            right: 0;
            height: 2px;
            background: #334155;
            z-index: 1;
        }
        .timeline-step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 120px;
        }
        .t-icon {
            width: 50px;
            height: 50px;
            background: #0f172a;
            border: 2px solid #334155;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: #94a3b8;
            font-size: 1.2rem;
        }
        .timeline-step h4 { font-size: 0.95rem; margin: 0; }
        .timeline-step p { font-size: 0.8rem; color: #64748b; }

        /* Form Wizard */
        .form-section { padding: 40px 0 80px; }
        .form-card {
            max-width: 700px;
            background: #0f172a;
            border: 1px solid rgba(56,189,248,0.1);
            border-radius: 24px;
            margin: 0 auto;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            min-height: 500px;
            position: relative;
            overflow: hidden;
        }
        .form-header { margin-bottom: 30px; position: relative; }
        .progress-bar-container {
            height: 4px;
            background: #1e293b;
            border-radius: 4px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: #38bdf8;
            width: 20%;
            transition: width 0.4s ease;
        }
        .steps-indicator { display: flex; justify-content: space-between; margin-bottom: 10px; display: none; /* Hidden for minimal look, using bar */ }
        .step-title { font-size: 1.5rem; color: #fff; margin: 0; }

        /* Steps */
        .wizard-step { display: none; animation: fadeIn 0.5s ease; }
        .wizard-step.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* Service Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        @media(min-width: 600px) { .services-grid { grid-template-columns: repeat(3, 1fr); } }

        .service-option input { display: none; }
        .so-content {
            padding: 30px 15px;
            background: #1e293b;
            border: 2px solid transparent;
            border-radius: 16px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .so-content i { font-size: 2rem; color: #94a3b8; display: block; margin-bottom: 10px; transition: 0.3s; }
        .so-content span { font-weight: 600; color: #cbd5e1; }

        .service-option input:checked + .so-content {
            background: rgba(56, 189, 248, 0.1);
            border-color: #38bdf8;
        }
        .service-option input:checked + .so-content i { color: #38bdf8; }

        .service-option:hover .so-content { background: #334155; }

        /* Inputs */
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; color: #cbd5e1; margin-bottom: 8px; font-weight: 500; font-size: 0.95rem; }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%;
            background: #1e293b;
            border: 1px solid #334155;
            padding: 15px;
            border-radius: 10px;
            color: #fff;
            font-family: inherit;
            font-size: 1rem;
            transition: 0.3s;
        }
        input:focus, textarea:focus { outline: none; border-color: #38bdf8; box-shadow: 0 0 0 3px rgba(56,189,248,0.1); }

        /* Pill Grid */
        .pill-grid { display: flex; flex-wrap: wrap; gap: 12px; }
        .pill-option input { display: none; }
        .pill-option span {
            display: inline-block;
            padding: 12px 24px;
            background: #1e293b;
            border-radius: 50px;
            color: #cbd5e1;
            cursor: pointer;
            transition: 0.3s;
            border: 1px solid #334155;
            font-weight: 500;
        }
        .pill-option input:checked + span {
            background: #38bdf8;
            color: #0b1120;
            border-color: #38bdf8;
        }
        .pill-option:hover span { border-color: #94a3b8; }

        /* File Input */
        .file-drop-area {
            position: relative;
            display: flex;
            align-items: center;
            padding: 20px;
            border: 2px dashed #475569;
            border-radius: 12px;
            background: #1e293b;
            transition: 0.3s;
        }
        .file-drop-area:hover { border-color: #38bdf8; }
        .file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        .fake-btn {
            background: #334155;
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            margin-right: 15px;
            font-size: 0.9rem;
        }
        .file-msg { font-size: 0.9rem; color: #94a3b8; }

        /* Buttons */
        .step-nav { margin-top: 40px; display: flex; justify-content: space-between; align-items: center; }
        .btn-back { background: transparent; color: #94a3b8; border: none; font-size: 1rem; cursor: pointer; padding: 10px 20px; }
        .btn-back:hover { color: #fff; }
        .btn-next, .btn-submit {
            background: #38bdf8;
            color: #0b1120;
            padding: 14px 40px;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-next:hover, .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(56,189,248,0.3); }

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        @media(max-width: 768px) { .grid-2 { grid-template-columns: 1fr; } }

        .error-msg { color: #ef4444; font-size: 0.85rem; margin-top: 5px; display: none; }

        .estimate-box { margin-top: 20px; padding: 15px; background: rgba(56,189,248,0.1); border-radius: 8px; text-align: center; color: #7dd3fc; }

        /* Success Screen */
        .success-screen { display: none; text-align: center; padding: 40px 0; animation: fadeIn 0.5s ease; }
        .success-icon {
            width: 80px; height: 80px; background: #10b981; color: #fff;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem; margin: 0 auto 20px;
            box-shadow: 0 0 30px rgba(16,185,129,0.4);
        }
        .ticket-box {
            background: #1e293b; padding: 15px; border-radius: 12px;
            display: inline-block; margin: 20px 0; border: 1px dashed #475569;
        }
        .ticket-box strong { display: block; font-size: 1.2rem; color: #fff; letter-spacing: 1px; }
        .success-actions { display: flex; gap: 15px; justify-content: center; margin-top: 30px; }
        .btn-home { padding: 12px 30px; border: 1px solid #475569; border-radius: 50px; color: #fff; text-decoration: none; }
        .btn-wa { padding: 12px 30px; background: #22c55e; border-radius: 50px; color: #fff; text-decoration: none; font-weight: 600; }

        /* FAQ */
        .faq-section { padding-bottom: 80px; }
        .faq-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; max-width: 900px; margin: 0 auto; }
        .faq-item h5 { color: #f8fafc; margin-bottom: 10px; }
        .faq-item p { color: #94a3b8; font-size: 0.95rem; }
        @media(max-width: 768px) { .faq-grid { grid-template-columns: 1fr; } }
    </style>

    <script>
        let currentStep = 1;
        const totalSteps = 5;
        const form = document.getElementById('wizardForm');

        function scrollToForm() {
            document.getElementById('quote-form-section').scrollIntoView({ behavior: 'smooth' });
        }

        function showStep(step) {
            document.querySelectorAll('.wizard-step').forEach(el => el.classList.remove('active'));
            document.getElementById('step-' + step).classList.add('active');

            // Update Progress
            const percent = (step / totalSteps) * 100;
            document.getElementById('progress-fill').style.width = percent + '%';

            // Update Title
            const titles = {
                1: 'Select Service',
                2: 'Project Details',
                3: 'Estimated Budget',
                4: 'Timeline',
                5: 'Contact Information'
            };
            document.getElementById('step-title').innerText = titles[step];
            currentStep = step;

            // Update Estimate
            updateEstimate();
        }

        function nextStep() {
            // Simple Validation
            if (currentStep === 2) {
                const details = document.getElementById('details-input').value;
                if (details.length < 10) {
                    document.getElementById('err-details').style.display = 'block';
                    return;
                } else {
                    document.getElementById('err-details').style.display = 'none';
                }
            }
            if (currentStep < totalSteps) {
                showStep(currentStep + 1);
            }
        }

        function validateStep2() {
            nextStep();
        }

        function prevStep() {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        function updateEstimate() {
            // Basic logic for visual effect
            const formData = new FormData(form);
            const budget = formData.get('budget');
            const priceDisplay = document.getElementById('price-estimate');

            if (budget && budget !== 'Not Sure') {
                priceDisplay.innerText = budget.replace('k', ',000').replace('L', ' Lakh'); 
            } else {
                priceDisplay.innerText = 'To be calculated';
            }
        }

        // File Input UI
        const fileInput = document.querySelector('.file-input');
        const fileMsg = document.querySelector('.file-msg');
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileMsg.textContent = fileInput.files[0].name;
            }
        });

        // AJAX Submission
        function submitForm() {
            const btn = document.querySelector('.btn-submit');
            const originalText = btn.innerText;
            btn.innerText = 'Sending...';
            btn.disabled = true;

            // Final Validation (Name/Email)
            const name = document.getElementById('name-input').value;
            const email = document.getElementById('email-input').value;
            if(!name || !email) {
                alert("Please fill in your name and email.");
                btn.innerText = originalText;
                btn.disabled = false;
                return;
            }

            const formData = new FormData(form);

            fetch("{{ route('quote.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('wizardForm').style.display = 'none';
                    document.getElementById('success-screen').style.display = 'block';
                    document.getElementById('ticket-id').innerText = '#' + data.ref_id;
                    document.querySelector('.form-header').style.display = 'none'; // Hide progress bar
                } else {
                    alert('Error: ' + JSON.stringify(data.errors || data.message));
                    btn.innerText = originalText;
                    btn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');
                btn.innerText = originalText;
                btn.disabled = false;
            });
        }
    </script>
@endsection