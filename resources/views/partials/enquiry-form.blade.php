<div class="enquiry-form-card">
    <h3 class="form-title">{{ $title ?? 'Boost Your Growth' }}</h3>
    <p class="form-subtitle">{{ $subtitle ?? 'Get a custom strategy for your business.' }}</p>

    <form action="{{ route('enquiry.submit') }}" method="POST" onsubmit="handleEnquirySubmit(event)">
        @csrf
        <input type="hidden" name="service" value="{{ $serviceName ?? 'General Enquiry' }}">

        <div class="form-group-custom">
            <input type="text" name="name" placeholder="Full Name" required>
            <i class="fas fa-user"></i>
        </div>

        <div class="form-group-custom">
            <input type="email" name="email" placeholder="Email Address" required>
            <i class="fas fa-envelope"></i>
        </div>

        <div class="form-group-custom">
            <select name="country_code" class="country-select"
                style="position: absolute; left: 45px; top: 17px; border: none; background: transparent; font-weight: 600; color: #1e293b; outline: none; z-index: 5; cursor: pointer; padding-right: 5px; font-size: 1rem; height: 24px;">
                <option value="+91">+91</option>
                <option value="+1">+1</option>
                <option value="+44">+44</option>
                <option value="+971">+971</option>
                <option value="+61">+61</option>
            </select>
            <input type="tel" name="phone" placeholder="Phone Number" maxlength="10" pattern="[0-9]{10}" required
                oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="padding-left: 110px !important;">
            <i class="fas fa-phone"></i>
        </div>

        <div class="form-group-custom">
            <textarea name="message" placeholder="Brief about your project (Optional)" rows="3"></textarea>
            <i class="fas fa-comment-dots"></i>
        </div>

        <button type="submit" class="btn-submit-enquiry">
            <span>Send Enquiry</span>
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
</div>

<script>
    if (typeof handleEnquirySubmit !== 'function') {
        window.handleEnquirySubmit = function (e) {
            e.preventDefault();
            const form = e.target;
            const btn = form.querySelector('button[type="submit"]');
            const originalBtnContent = btn.innerHTML;

            // Loading State
            btn.disabled = true;
            btn.innerHTML = '<span>Sending...</span><i class="fas fa-spinner fa-spin"></i>';

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
            })
                .then(async response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        const data = await response.json();
                        if (response.ok) return data;
                        throw { status: response.status, data: data };
                    }
                    if (response.ok) return {}; // Success but no JSON
                    throw { status: response.status, statusText: response.statusText };
                })
                .then(data => {
                    if (data.status === 'error') {
                        // Logic error returned with 200 OK (unlikely but possible)
                        throw { status: 422, data: data };
                    }

                    if (typeof window.showModal === 'function') {
                        window.showModal();
                    } else {
                        alert(data.message || 'Enquiry sent successfully!');
                    }
                    form.reset();
                })
                .catch(error => {
                    console.error('Submission Error:', error);

                    let msg = 'Something went wrong. Please try again.';

                    if (error.status === 422 && error.data && error.data.errors) {
                        // Format validation errors
                        const errorMessages = Object.values(error.data.errors).flat().join('\n');
                        msg = 'Validation Failed:\n' + errorMessages;
                    } else if (error.status === 419) {
                        msg = 'Session expired. Please refresh the page.';
                    } else if (error.data && error.data.message) {
                        msg = error.data.message;
                    }

                    alert(msg);
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.innerHTML = originalBtnContent;
                });
        };
    }
</script>

<style>
    /* Enquiry Form Card (Refined Light Theme) */
    .enquiry-form-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        padding: 40px;
        border-radius: 24px;
        position: relative;
        z-index: 10;
        box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.15);
        max-width: 500px;
        width: 100%;
        margin: 0 auto;
        box-sizing: border-box;
    }

    .enquiry-form-card * {
        box-sizing: border-box;
    }

    .form-title {
        color: #0f172a;
        font-size: 2rem;
        margin: 0 0 10px 0;
        font-weight: 900;
        letter-spacing: -0.5px;
    }

    .form-subtitle {
        color: #64748b;
        margin-bottom: 35px;
        font-size: 1rem;
        line-height: 1.5;
    }

    .form-group-custom {
        position: relative;
        margin-bottom: 22px;
        width: 100%;
    }

    .form-group-custom input,
    .form-group-custom textarea {
        width: 100%;
        background: #f8fafc;
        border: 1.5px solid #f1f5f9;
        padding: 16px 15px 16px 50px !important;
        border-radius: 12px;
        color: #1e293b !important;
        font-family: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 1rem;
        outline: none;
    }

    .form-group-custom input::placeholder,
    .form-group-custom textarea::placeholder {
        color: #94a3b8;
        opacity: 0.8;
    }

    .form-group-custom input:focus,
    .form-group-custom textarea:focus {
        border-color: #38bdf8;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
    }

    .form-group-custom i {
        position: absolute;
        left: 20px;
        top: 20px;
        color: #38bdf8;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    .form-group-custom input:focus+i,
    .form-group-custom textarea:focus+i {
        color: #818cf8;
        transform: scale(1.1);
    }

    .btn-submit-enquiry {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
        border: none;
        border-radius: 14px;
        color: #fff;
        font-weight: 800;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 0.95rem;
        margin-top: 15px;
        box-shadow: 0 10px 20px -5px rgba(56, 189, 248, 0.4);
    }

    .btn-submit-enquiry:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 20px 30px -10px rgba(56, 189, 248, 0.5);
        filter: brightness(1.1);
    }

    .btn-submit-enquiry:active {
        transform: translateY(0) scale(0.98);
    }
</style>