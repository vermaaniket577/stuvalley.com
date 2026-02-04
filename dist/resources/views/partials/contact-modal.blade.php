<!-- Global Contact Modal -->
<div id="globalContactModal" class="modal-overlay">
    <div class="premium-modal contact-modal-light">
        <!-- Close Button -->
        <button class="modal-close-btn" onclick="closeContactModal()" aria-label="Close Modal">
            <i class="fas fa-times"></i>
        </button>

        <!-- Top Accent Line -->
        <div class="modal-accent-line"></div>

        <div class="modal-scroll-container">
            <div class="modal-content-wrapper">
                <!-- Header Section -->
                <div class="modal-form-header">
                    <div class="header-icon-badge">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="modal-title">Ready to Elevate Your Brand?</h3>
                    <p class="modal-subtitle">Book a free strategy session with our experts. Let's turn your vision into
                        a digital powerhouse.</p>
                </div>

                <!-- Form Section -->
                <form id="modalContactForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <div class="form-group-pro">
                        <label class="form-label-pro">Full Name</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" name="full_name" class="form-input-pro"
                                placeholder="e.g. Alexander Pierce" required>
                        </div>
                    </div>

                    <div class="grid-2-pro">
                        <div class="form-group-pro">
                            <label class="form-label-pro">Email Address</label>
                            <div class="input-with-icon">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" class="form-input-pro" placeholder="alex@company.com"
                                    required>
                            </div>
                        </div>
                        <div class="form-group-pro">
                            <label class="form-label-pro">Phone Number</label>
                            <div class="input-with-icon">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="tel" name="phone" class="form-input-pro" placeholder="+91 00000 00000"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group-pro">
                        <label class="form-label-pro">Primary Goal</label>
                        <div class="input-with-icon select-wrapper">
                            <i class="fas fa-bullseye input-icon"></i>
                            <select name="service" class="form-select-pro" required>
                                <option value="" disabled selected>What can we build for you?</option>
                                <option value="Web Development">Full-Stack Web Development</option>
                                <option value="Mobile Apps">High-Performance Mobile Apps</option>
                                <option value="Digital Marketing">Strategic Digital Growth</option>
                                <option value="UI/UX Design">Premium UI/UX Experience</option>
                                <option value="Enterprise Solutions">AI & Enterprise Integration</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>

                    <div class="form-group-pro">
                        <label class="form-label-pro">Project Details</label>
                        <div class="input-with-icon textarea-wrapper">
                            <i class="fas fa-comment-dots input-icon textarea-icon"></i>
                            <textarea name="message" class="form-textarea-pro" rows="4"
                                placeholder="Tell us about your project vision or specific requirements..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit-pro">
                        <span class="btn-text">IGNITE CONSULTATION</span>
                        <i class="fas fa-arrow-right btn-icon"></i>
                        <div class="loading-spinner"></div>
                    </button>

                    <div class="form-trust-footer">
                        <div class="trust-item"><i class="fas fa-shield-alt"></i> Secure</div>
                        <div class="trust-item"><i class="fas fa-bolt"></i> Fast Response</div>
                        <div class="trust-item"><i class="fas fa-check-circle"></i> Best Experts</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Premium Light Modal Design System */
    #globalContactModal {
        z-index: 1000000 !important;
        position: fixed !important;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(2, 6, 23, 0.9) !important;
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        padding: 20px;
    }

    #globalContactModal.active {
        opacity: 1;
    }

    .contact-modal-light {
        position: relative;
        max-width: 600px !important;
        width: 100% !important;
        background: #ffffff !important;
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 30px !important;
        box-shadow:
            0 30px 60px -12px rgba(0, 0, 0, 0.15),
            0 18px 36px -18px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transform: translateY(30px) scale(0.95);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: flex;
        flex-direction: column;
        max-height: 90vh;
    }

    #globalContactModal.active .contact-modal-light {
        transform: translateY(0) scale(1);
    }

    .modal-scroll-container {
        overflow-y: auto;
        flex: 1;
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 transparent;
    }

    .modal-scroll-container::-webkit-scrollbar {
        width: 6px;
    }

    .modal-scroll-container::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .modal-accent-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #3b82f6, #60a5fa, #3b82f6);
        background-size: 200% 100%;
        animation: gradientMove 3s linear infinite;
        z-index: 5;
    }

    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 200% 50%;
        }
    }

    .modal-content-wrapper {
        padding: 60px 50px 40px;
    }

    .modal-close-btn {
        position: absolute;
        top: 25px;
        right: 25px;
        background: #f1f5f9;
        border: none;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        color: #64748b;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
        z-index: 10;
    }

    .modal-close-btn:hover {
        background: #ef4444;
        color: #fff;
        transform: rotate(90deg);
    }

    /* Header Styling */
    .modal-form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .header-icon-badge {
        width: 64px;
        height: 64px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: #2563eb;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        margin: 0 auto 20px;
    }

    .modal-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 12px;
        letter-spacing: -0.02em;
    }

    .modal-subtitle {
        color: #64748b;
        font-size: 1rem;
        line-height: 1.6;
        max-width: 90%;
        margin: 0 auto;
    }

    /* Grid Layout */
    .grid-2-pro {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* Form Elements */
    .form-group-pro {
        margin-bottom: 24px;
    }

    .form-label-pro {
        display: block;
        font-size: 0.8rem;
        font-weight: 700;
        color: #475569;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .textarea-icon {
        top: 22px;
        transform: none;
    }

    .form-input-pro,
    .form-select-pro,
    .form-textarea-pro {
        width: 100%;
        padding: 15px 20px 15px 52px;
        background: #f8fafc;
        border: 2px solid #f1f5f9;
        border-radius: 14px;
        color: #1e293b;
        font-size: 1rem;
        font-family: inherit;
        transition: all 0.3s;
    }

    .form-input-pro:focus,
    .form-select-pro:focus,
    .form-textarea-pro:focus {
        background: #fff;
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
    }

    .input-with-icon:focus-within .input-icon {
        color: #3b82f6;
    }

    .form-select-pro {
        appearance: none;
        cursor: pointer;
    }

    .select-arrow {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
        font-size: 0.9rem;
    }

    .form-textarea-pro {
        min-height: 120px;
        resize: none;
    }

    /* Submit Button */
    .btn-submit-pro {
        width: 100%;
        padding: 18px;
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 16px;
        font-size: 1.05rem;
        font-weight: 800;
        letter-spacing: 0.02em;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-top: 10px;
        box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
        transition: all 0.3s ease;
    }

    .btn-submit-pro:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -10px rgba(37, 99, 235, 0.5);
    }

    .btn-submit-pro:active {
        transform: scale(0.98);
    }

    /* Footer Indicators */
    .form-trust-footer {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #f1f5f9;
    }

    .trust-item {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
    }

    .trust-item i {
        color: #10b981;
    }

    /* Spinner */
    .loading-spinner {
        width: 18px;
        height: 18px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top-color: #ffffff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        display: none;
    }

    .btn-submit-pro.is-loading .loading-spinner {
        display: inline-block;
    }

    .btn-submit-pro.is-loading .btn-icon {
        display: none;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Mobile Responsive */
    @media (max-width: 640px) {
        .modal-content-wrapper {
            padding: 50px 25px 30px;
        }

        .grid-2-pro {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .contact-modal-light {
            border-radius: 0 !important;
            max-height: 100%;
            height: 100vh;
        }

        #globalContactModal {
            padding: 0;
        }

        .form-trust-footer {
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }
    }
</style>

<script>
    function openContactModal(e) {
        if (e) e.preventDefault();
        const modal = document.getElementById('globalContactModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modal.classList.add('active');
            }, 50);
        }
    }

    function closeContactModal() {
        const modal = document.getElementById('globalContactModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const modalForm = document.getElementById('modalContactForm');
        if (modalForm) {
            modalForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const btn = modalForm.querySelector('.btn-submit-pro');
                const spinner = btn.querySelector('.loading-spinner');
                const btnText = btn.querySelector('.btn-text');
                const btnIcon = btn.querySelector('.btn-icon');

                btn.classList.add('is-loading');
                btn.disabled = true;
                btnText.textContent = 'SENDING REQUEST...';

                const formData = new FormData(modalForm);
                fetch(modalForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                    .then(response => {
                        closeContactModal();
                        if (window.showModal) window.showModal();
                        else alert('Success! We will contact you shortly.');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Submission error. Please try again.');
                    })
                    .finally(() => {
                        btn.classList.remove('is-loading');
                        btn.disabled = false;
                        btnText.textContent = 'IGNITE CONSULTATION';
                        modalForm.reset();
                    });
            });
        }

        const modalOverlay = document.getElementById('globalContactModal');
        if (modalOverlay) {
            modalOverlay.addEventListener('click', function (e) {
                if (e.target === modalOverlay) closeContactModal();
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeContactModal();
        });
    });
</script>