@extends('layouts.app')
@section('header_class', '')

@section('title', 'Apply for ' . $job->title . ' - Careers | Stuvalley')

@section('content')
    <div class="recruitment-portal">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">

                    <!-- Enterprise Back Navigation -->
                    <div class="navigation-header mb-4 animate-fade-in">
                        <a href="{{ route('jobs.show', $job->slug) }}" class="back-link-corporate">
                            <i class="fas fa-chevron-left me-2"></i> Return to Job Description
                        </a>
                    </div>

                    <!-- Main Application Surface -->
                    <div class="modern-card shadow-lg animate-slide-up">

                        <!-- Progress Header: Multi-Step Indicator -->
                        <div class="card-header-premium p-0 border-bottom">
                            <div class="job-context px-4 px-md-5 pt-5 pb-4">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="badge-recruiter">{{ $job->department }}</span>
                                    <span class="job-type-pill">{{ $job->job_type }}</span>
                                </div>
                                <h1 class="h2 fw-extrabold text-navy">{{ $job->title }}</h1>
                                <p class="text-secondary small"><i class="fas fa-map-marker-alt me-1"></i>
                                    {{ $job->location }} • Posted by Stuvalley Talent Team</p>
                            </div>

                            <div class="step-workflow px-4 px-md-5 pb-4">
                                <div class="workflow-steps d-flex">
                                    <div class="workflow-step active" id="node-1">
                                        <div class="step-circle">1</div>
                                        <div class="step-label">Personal Info</div>
                                    </div>
                                    <div class="workflow-step" id="node-2">
                                        <div class="step-circle">2</div>
                                        <div class="step-label">Experience</div>
                                    </div>
                                    <div class="workflow-step" id="node-3">
                                        <div class="step-circle">3</div>
                                        <div class="step-label">Review</div>
                                    </div>
                                    <div class="workflow-step" id="node-4">
                                        <div class="step-circle">4</div>
                                        <div class="step-label">Submit</div>
                                    </div>
                                </div>
                                <div class="step-connection">
                                    <div class="connection-fill" id="workflowProgress" style="width: 0%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body-premium p-4 p-md-5">
                            <form id="corporateApplyForm" action="{{ route('jobs.apply', $job->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-viewport">
                                    <div class="phase-track" id="phaseTrack">
                                        <!-- Phase 1: Contact Details -->
                                        <div class="phase active" id="phase-1">
                                            <div class="phase-header mb-4">
                                                <h3 class="h5 fw-bold text-navy">Contact Information</h3>
                                                <p class="text-muted small">Please provide your contact details as per your
                                                    legal
                                                    documents.</p>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="corporate-field">
                                                        <label class="field-label">Full Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="field-input" id="full_name"
                                                            name="full_name" placeholder="e.g. Full Name" required>
                                                        <div class="field-info">Enter your name as it appears on your ID.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="corporate-field">
                                                        <label class="field-label">Email Address <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" class="field-input" id="email" name="email"
                                                            placeholder="name@enterprise.com" required>
                                                        <div class="field-info">Used for all recruitment correspondence.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="corporate-field">
                                                        <label class="field-label">Phone Number <span
                                                                class="text-danger">*</span></label>
                                                        <div class="phone-composite d-flex">
                                                            <select class="field-input-select" name="country_code">
                                                                <option value="+91">IN +91</option>
                                                                <option value="+1">US +1</option>
                                                                <option value="+44">UK +44</option>
                                                                <option value="+61">AU +61</option>
                                                            </select>
                                                            <input type="tel" class="field-input flex-grow-1" id="phone"
                                                                name="phone" placeholder="9425096000" pattern="[0-9]{10}"
                                                                maxlength="10" required
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center" style="margin-top: 60px;">
                                                    <button type="button" class="btn btn-navy-cta mx-auto"
                                                        style="min-width: 280px;" onclick="changePhase(2)">
                                                        CONTINUE TO EXPERIENCE <i class="fas fa-arrow-right ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Phase 2: Work Experience & Materials -->
                                        <div class="phase" id="phase-2">
                                            <div class="phase-header mb-4">
                                                <h3 class="h5 fw-bold text-navy">Work Experience & Professional
                                                    Materials</h3>
                                                <p class="text-muted small">Help us understand your background by
                                                    attaching your
                                                    resume and highlighting key experiences.</p>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <label class="field-label">CV / Resume <span
                                                            class="text-danger">*</span></label>
                                                    <div class="drop-vault" id="dropVault">
                                                        <input type="file" class="vault-input" id="resume" name="resume"
                                                            accept=".pdf,.doc,.docx" required>
                                                        <div class="vault-content text-center">
                                                            <div class="vault-icon mb-3"><i
                                                                    class="fas fa-cloud-upload-alt"></i>
                                                            </div>
                                                            <p class="vault-text fw-bold mb-1" id="vaultStatus">Click or
                                                                drag to
                                                                upload resume</p>
                                                            <p class="vault-hint text-muted mb-0">PDF, DOC, DOCX up to
                                                                10MB allowed
                                                            </p>
                                                            <div id="vaultFeedback" class="d-none mt-3">
                                                                <div
                                                                    class="selected-file-pill d-inline-flex align-items-center px-3 py-2">
                                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                                    <span id="fileNameReview"
                                                                        class="fw-bold small">resume.pdf</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <div class="corporate-field">
                                                        <label class="field-label">Additional Comments / Cover Letter
                                                            <span class="text-muted fw-normal">(Optional)</span></label>
                                                        <textarea class="field-input-area" id="cover_letter"
                                                            name="cover_letter" rows="6"
                                                            placeholder="Briefly highlight your relevant experience or passion for this role..."></textarea>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-12 mt-5 d-flex flex-column flex-md-row justify-content-center gap-4">
                                                    <button type="button" class="btn btn-ghost-cta"
                                                        onclick="changePhase(1)">
                                                        <i class="fas fa-arrow-left me-2"></i> BACK
                                                    </button>
                                                    <button type="button" class="btn btn-navy-cta" onclick="changePhase(3)">
                                                        REVIEW APPLICATION <i class="fas fa-arrow-right ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Phase 3: Recap & Final Review -->
                                        <div class="phase" id="phase-3">
                                            <div class="phase-header mb-4">
                                                <h3 class="h5 fw-bold text-navy">Final Review</h3>
                                                <p class="text-muted small">Verify your information before final
                                                    transmission to our
                                                    HR system.</p>
                                            </div>

                                            <div class="recap-card p-4 p-md-5 rounded-3 border mb-5 text-center">
                                                <div class="row g-4 justify-content-center">
                                                    <div class="col-md-5 border-end-md">
                                                        <div class="recap-item">
                                                            <div class="recap-label">Applicant Name</div>
                                                            <div class="recap-value" id="recap-name">-</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="recap-item">
                                                            <div class="recap-label">Email Address</div>
                                                            <div class="recap-value" id="recap-email">-</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 border-top pt-3">
                                                        <div class="recap-item">
                                                            <div class="recap-label">Attached Document</div>
                                                            <div class="recap-value text-primary" id="recap-resume">No file
                                                                detected
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-check d-flex align-items-start mb-5 py-5 border-top border-bottom"
                                                style="margin-bottom: 60px !important; gap: 25px; padding-left: 10px;">
                                                <input class="form-check-input flex-shrink-0" type="checkbox"
                                                    id="termsAgree" required
                                                    style="margin-top: 0.4rem; transform: scale(1.4); margin-left: 0;">
                                                <label class="form-check-label text-muted" for="termsAgree"
                                                    style="line-height: 1.7; font-size: 1rem; font-weight: 600; padding-left: 15px;">
                                                    I hereby certify that all information provided is accurate
                                                    and I agree to Stuvalley's recruitment privacy policy regarding data
                                                    handling for candidate screening.
                                                </label>
                                            </div>

                                            <div class="d-flex justify-content-center w-100 text-center"
                                                style="margin-top: 80px; margin-bottom: 40px;">
                                                <button type="submit" id="masterSubmitBtn"
                                                    class="btn btn-submit-corporate mx-auto"
                                                    style="min-width: 320px; padding: 22px 50px; transform: translateX(110px);">
                                                    <span class="btn-main-text"
                                                        style="font-size: 1.1rem; letter-spacing: 2px;">CONFIRM & SUBMIT
                                                        FINAL APPLICATION</span>
                                                    <div class="btn-loading-text d-none">
                                                        <span class="spinner-border spinner-border-sm me-2"
                                                            role="status"></span>
                                                        Processing...

                                                    </div>
                                                </button>
                                            </div>

                                            <div class="corporate-progress d-none" style="margin-top: 60px;">
                                                <div class="text-center mb-4">
                                                    <div class="small fw-bold text-navy mb-2"
                                                        style="font-size: 0.95rem; letter-spacing: 1px;">UPLOADING ASSETS...
                                                        <span id="livePercent">0%</span>
                                                    </div>
                                                </div>
                                                <div class="progress-corporate-track mx-auto"
                                                    style="max-width: 400px; height: 10px; border-radius: 20px; background: #e2e8f0; overflow: hidden;">
                                                    <div id="liveBar" class="progress-corporate-fill"
                                                        style="width: 0%; height: 100%; border-radius: 20px; background: #2563eb; transition: width 0.3s ease;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center mt-5 pb-4">
                                                <button type="button" class="btn btn-link btn-edit-link"
                                                    onclick="changePhase(1)">
                                                    <i class="fas fa-edit me-2"></i> Modify Application Details
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <style>
        /* Enterprise Corporate UI Tokens - REFRESHED FOR LIGHT PREMIUM */
        :root {
            --navy: #0f172a;
            --navy-light: #1e293b;
            --corporate-blue: #2563eb;
            --corporate-blue-hover: #1d4ed8;
            --c-bg-soft: #f8fafc;
            --c-border: #e2e8f0;
            --c-text: #475569;
            --radius-enterprise: 16px;
        }

        .recruitment-portal {
            background-color: #f8fafc;
            min-height: 100vh;
            font-family: 'Manrope', system-ui, sans-serif;
            color: #1e293b;
            padding: 120px 40px 100px 40px;
            /* Further increased side padding */
            line-height: 1.6;
            background-image:
                radial-gradient(circle at 0% 0%, rgba(37, 99, 235, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(99, 102, 241, 0.03) 0%, transparent 40%);
        }

        @media (min-width: 992px) {
            .recruitment-portal {
                padding: 150px 60px 120px 60px !important;
                /* Larger horizontal padding on desktop */
            }
        }

        .back-link-corporate {
            text-decoration: none;
            color: #64748b;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .back-link-corporate:hover {
            color: var(--corporate-blue);
            transform: translateX(-4px);
        }

        /* Modern Card Surface */
        .modern-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            position: relative;
            margin: 20px 20px 60px 20px;
            /* Added margin on all four sides */
        }

        .navigation-header {
            margin-bottom: 50px !important;
            /* Increased gap between back link and card */
        }

        .job-context {
            padding: 50px 60px !important;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .job-context h1 {
            color: #0f172a;
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            margin-bottom: 15px;
            font-size: 2.5rem;
            letter-spacing: -0.02em;
        }

        .job-context p {
            color: #64748b;
        }

        .card-body-premium {
            padding: 40px 60px 80px 60px !important;
        }

        .badge-recruiter {
            background: #eff6ff;
            color: #2563eb;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 6px 16px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid #dbeafe;
        }

        .job-type-pill {
            background: #f1f5f9;
            color: #475569;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 6px 16px;
            border-radius: 50px;
            text-transform: uppercase;
        }

        /* Multi-Step Workflow Indicator */
        .step-workflow {
            padding: 40px 60px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .workflow-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }

        .workflow-step {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #94a3b8;
            opacity: 0.7;
            transition: 0.4s;
        }

        .workflow-step.active {
            opacity: 1;
            color: #2563eb;
        }

        .workflow-step.completed {
            opacity: 1;
            color: #2563eb;
        }

        .step-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.9rem;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .workflow-step.active .step-circle {
            border-color: #2563eb;
            color: #2563eb;
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.1);
        }

        .workflow-step.completed .step-circle {
            background: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        .step-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .step-connection {
            position: absolute;
            height: 2px;
            background: #e2e8f0;
            top: 19px;
            left: 10%;
            right: 10%;
            z-index: 1;
        }

        .connection-fill {
            height: 100%;
            background: #2563eb;
            transition: 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .corporate-field {
            margin-bottom: 10px;
        }

        /* Corporate Form Styling */
        .field-label {
            display: block;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            color: #0f172a;
            font-size: 0.85rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .phase-header h3 {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.01em;
        }

        .field-input,
        .field-input-select,
        .field-input-area {
            width: 100%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 20px;
            color: #1e293b;
            font-weight: 500;
            transition: 0.3s;
        }

        .field-input:focus,
        .field-input-select:focus,
        .field-input-area:focus {
            outline: none;
            border-color: #2563eb;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.05);
        }

        .field-info {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 8px;
        }

        .field-input-select {
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%232563eb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 14px;
        }

        /* Phone Composite Refinement */
        .phone-composite {
            display: flex !important;
            align-items: center;
            gap: 15px;
        }

        .phone-composite .field-input-select {
            width: 140px !important;
            flex-shrink: 0;
            margin-bottom: 0;
        }

        .phone-composite .field-input {
            flex-grow: 1;
            width: auto !important;
            margin-bottom: 0;
        }

        /* Drop Vault */
        .drop-vault {
            border: 2px dashed #e2e8f0;
            border-radius: 16px;
            padding: 50px 30px;
            text-align: center;
            position: relative;
            background: #f8fafc;
            transition: 0.3s;
            cursor: pointer;
        }

        .drop-vault:hover {
            border-color: #2563eb;
            background: #eff6ff;
        }

        .vault-input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            z-index: 5;
        }

        .vault-icon {
            font-size: 3rem;
            color: #64748b;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .vault-text {
            color: #475569;
        }

        .selected-file-pill {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #2563eb;
            border-radius: 50px;
            padding: 10px 20px;
        }

        /* Recap Card */
        .recap-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 40px;
        }

        .recap-label {
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 8px;
        }

        .recap-value {
            font-weight: 700;
            color: #0f172a;
            font-size: 1.2rem;
        }

        /* Form Controls */
        .form-check-label {
            color: #475569;
            font-size: 0.95rem;
        }

        .form-check-input {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
        }

        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        /* Buttons */
        .btn-navy-cta {
            background: #2563eb;
            color: white !important;
            padding: 0 40px;
            height: 56px;
            border-radius: 12px;
            font-weight: 800;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.1);
            transition: 0.3s;
        }

        .btn-navy-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.2);
            background: #1d4ed8;
        }

        .btn-ghost-cta {
            background: transparent;
            border: 1px solid #e2e8f0;
            color: #475569;
            padding: 0 40px;
            height: 56px;
            border-radius: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        .btn-ghost-cta:hover {
            background: #f8fafc;
            border-color: #64748b;
        }

        .btn-submit-corporate {
            background: #2563eb;
            color: white !important;
            padding: 0 50px;
            height: 64px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.4s;
        }

        /* Sliding Flow */
        .form-viewport {
            overflow: hidden;
            position: relative;
        }

        .phase-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.65, 0, 0.35, 1);
            width: 300%;
        }

        .phase {
            width: 33.333%;
            flex-shrink: 0;
            opacity: 0;
            transform: scale(0.98);
            transition: 0.5s;
            pointer-events: none;
        }

        .phase.active {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }

        /* Phase Header */
        .phase-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .phase-header h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 15px;
        }

        .phase-header p {
            color: #64748b;
            font-size: 1rem;
        }

        .btn-edit-link {
            color: #64748b;
            text-decoration: underline;
            font-weight: 600;
            background: none;
            border: none;
            margin-top: 20px;
        }

        .btn-edit-link:hover {
            color: #0f172a;
        }

        /* Error States */
        .field-input.error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.05);
        }

        .error-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0);
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0);
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0);
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0);
            }
        }

        /* Success States */
        /* Premium Success Modal */
        .success-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            z-index: 2147483647 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .success-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .success-modal-card {
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 50px;
            max-width: 480px;
            width: 90%;
            text-align: center;
            transform: scale(0.8) translateY(20px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.1);
        }

        .success-modal-overlay.active .success-modal-card {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        .success-icon-container {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            margin: 0 auto 25px;
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.2);
            position: relative;
        }

        /* Checkmark Animation */
        .success-modal-overlay.active .success-icon-container i {
            animation: checkPop 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.2s backwards;
        }

        @keyframes checkPop {
            0% {
                transform: scale(0) rotate(-45deg);
                opacity: 0;
            }

            100% {
                transform: scale(1) rotate(0);
                opacity: 1;
            }
        }

        .success-modal-title {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 15px;
            letter-spacing: -1px;
        }

        .success-modal-text {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .success-modal-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        @media (max-width: 768px) {

            .job-context,
            .card-body-premium,
            .step-workflow {
                padding: 30px !important;
            }

            .workflow-steps {
                gap: 10px;
            }

            .step-label {
                font-size: 0.6rem;
            }

            .job-context h1 {
                font-size: 1.8rem;
            }
        }
    </style>

    <script>
        let currentPhase = 1;

        function changePhase(phase) {
            const track = document.getElementById('phaseTrack');
            if (phase > currentPhase) {
                // Enterprise Validation
                const currentEl = document.getElementById(`phase-${currentPhase}`);
                if (!currentEl) return;

                const inputs = currentEl.querySelectorAll('input[required], select[required], textarea[required]');
                let isValid = true;

                inputs.forEach(input => {
                    const val = input.value.trim();
                    const isCheck = input.getAttribute('type') === 'checkbox';
                    const isInvalid = isCheck ? !input.checked : val === "";

                    if (isInvalid) {
                        input.classList.add('error');
                        isValid = false;
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (!isValid) {
                    currentEl.classList.add('error-shake');
                    setTimeout(() => currentEl.classList.remove('error-shake'), 500);

                    const firstError = currentEl.querySelector('.error');
                    if (firstError) firstError.focus();
                    return;
                }
            }

            // Phase Data Migration
            if (phase === 3) {
                const nameInp = document.getElementById('full_name');
                const mailInp = document.getElementById('email');
                const fileInp = document.getElementById('resume');

                if (nameInp) document.getElementById('recap-name').innerText = nameInp.value;
                if (mailInp) document.getElementById('recap-email').innerText = mailInp.value;
                if (fileInp && fileInp.files[0]) {
                    document.getElementById('recap-resume').innerText = fileInp.files[0].name;
                }
            }

            // Sliding Animation Core
            const translateX = -(phase - 1) * 33.333; // 33.333% because width is 300% (3 items)
            track.style.transform = `translateX(${translateX}%)`;

            // Update Phase Opacity
            document.querySelectorAll('.phase').forEach((el, idx) => {
                if (idx + 1 === phase) {
                    el.classList.add('active');
                } else {
                    el.classList.remove('active');
                }
            });

            // Update Progress Analytics
            const nodes = document.querySelectorAll('.workflow-step');
            const fillPercent = ((phase - 1) / (nodes.length - 1 || 3)) * 100;
            const progBar = document.getElementById('workflowProgress');
            if (progBar) progBar.style.width = `${fillPercent}%`;

            nodes.forEach((node, idx) => {
                const stepNum = idx + 1;
                node.classList.remove('active', 'completed');
                if (stepNum === phase) node.classList.add('active');
                if (stepNum < phase) node.classList.add('completed');
            });

            currentPhase = phase;
            const anchor = document.querySelector('.modern-card');
            if (anchor) window.scrollTo({ top: anchor.offsetTop - 80, behavior: 'smooth' });
        }

        // Terms & Conditions Visual Feedback
        document.getElementById('termsAgree').addEventListener('change', function () {
            const btn = document.getElementById('masterSubmitBtn');
            btn.style.opacity = this.checked ? "1" : "0.7";
        });

        // File Inspection
        document.getElementById('resume').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('fileNameReview').innerText = file.name;
                document.getElementById('vaultFeedback').classList.remove('d-none');
                document.getElementById('vaultStatus').innerText = 'Document Ready';
                validatePhase(2);
            }
        });

        // Real-time Validation for Sliding UX
        function validatePhase(phaseNum) {
            const phaseEl = document.getElementById(`phase-${phaseNum}`);
            if (!phaseEl) return;
            const btn = phaseEl.querySelector('button[onclick^="changePhase(' + (phaseNum + 1) + ')"]');
            if (!btn) return;

            const inputs = phaseEl.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;
            inputs.forEach(input => {
                const val = input.value.trim();
                const isCheck = input.getAttribute('type') === 'checkbox';
                if (isCheck ? !input.checked : val === "") isValid = false;
            });
            btn.style.opacity = isValid ? "1" : "0.5";
            // We won't strictly disable it to allow users to see error glows on click, 
            // but we follow the "disabled" requirement visually/functionally in changePhase.
        }

        // Initialize Validation Listeners
        document.querySelectorAll('.phase input, .phase select, .phase textarea').forEach(input => {
            input.addEventListener('input', () => {
                const phaseId = input.closest('.phase').id;
                const phaseNum = parseInt(phaseId.split('-')[1]);
                validatePhase(phaseNum);
            });
        });

        // Initial check for Phase 1
        validatePhase(1);

        // Enterprise Submission Handler
        document.getElementById('corporateApplyForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Prime TTS engine to allow playback after async request
            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                window.speechSynthesis.speak(new SpeechSynthesisUtterance(''));
            }

            const form = this;

            // Manual Check for Terms (since we removed 'disabled' for better UX)
            const terms = document.getElementById('termsAgree');
            if (!terms.checked) {
                alert("Please agree to the accuracy statement and privacy policy before submitting.");
                terms.focus();
                return;
            }

            // Catch any browser-level validation errors (like missing fields in hidden phases)
            if (!form.reportValidity()) {
                return;
            }

            const btn = document.getElementById('masterSubmitBtn');
            const mainText = btn.querySelector('.btn-main-text');
            const loadText = btn.querySelector('.btn-loading-text');
            const progGroup = document.querySelector('.corporate-progress');
            const fillBar = document.getElementById('liveBar');
            const pctText = document.getElementById('livePercent');

            btn.disabled = true;
            mainText.classList.add('d-none');
            loadText.classList.remove('d-none');
            progGroup.classList.remove('d-none');

            const payload = new FormData(form);

            // Debug: Log form data
            console.log('Form submission started');
            console.log('Form action:', form.action);
            console.log('FormData entries:');
            for (let pair of payload.entries()) {
                if (pair[0] === 'resume') {
                    console.log(pair[0] + ': [File] ' + pair[1].name + ' (' + pair[1].size + ' bytes)');
                } else {
                    console.log(pair[0] + ': ' + pair[1]);
                }
            }

            const request = new XMLHttpRequest();
            request.open('POST', form.action, true);

            // Critical Headers for Laravel AJAX
            request.setRequestHeader('Accept', 'application/json');
            request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('input[name="_token"]').value);

            // DO NOT set Content-Type header manually - browser detects multipart automatically

            request.upload.onprogress = (evt) => {
                if (evt.lengthComputable) {
                    const percent = Math.round((evt.loaded / evt.total) * 100);
                    fillBar.style.width = percent + '%';
                    pctText.innerText = percent + '%';
                    console.log('Upload progress:', percent + '%');
                }
            };

            request.onload = () => {
                console.log('Request completed. Status:', request.status);
                console.log('Response:', request.responseText);

                let response = {};
                try {
                    response = JSON.parse(request.responseText);
                } catch (e) {
                    console.error("Malformed Response:", request.responseText);
                    console.error("Status:", request.status);
                    handleFailure('Server returned an invalid response. Status: ' + request.status + '. Please check the browser console for details.');
                    return;
                }

                if (request.status === 200) {
                    if (response.success) {
                        form.classList.add('d-none');
                        // Fully Complete Workflow
                        document.querySelectorAll('.workflow-step').forEach(node => node.classList.add('completed'));
                        document.getElementById('workflowProgress').style.width = '100%';
                        document.querySelector('.card-header-premium').classList.add('opacity-50');

                        // Show Success Modal
                        const successModal = document.getElementById('successModal');
                        successModal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                        document.body.classList.add('modal-open-fix');

                        // Auto-play confirmation audio
                        playSuccessAudio();

                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        handleFailure(response.message || 'Submission failed.');
                    }
                } else if (request.status === 422) {
                    // Validation Errors
                    let errorMsg = response.message || 'Please check your inputs.';
                    if (response.errors) {
                        const errors = response.errors;
                        const errorList = Object.keys(errors).map(key => `${key}: ${errors[key][0]}`).join('\n');
                        errorMsg = 'Validation Errors:\n' + errorList;
                    }
                    handleFailure(errorMsg);
                } else if (request.status === 419) {
                    handleFailure('Security token expired. Please refresh the page and try again.');
                } else if (request.status === 413) {
                    handleFailure('File is too large. Maximum file size is 50MB.');
                } else if (request.status === 500) {
                    handleFailure(response.message || 'Server error occurred. Please try again or contact support.');
                } else {
                    handleFailure(response.message || 'Error ' + request.status + ': ' + (request.statusText || 'Unknown error'));
                }
            };

            function handleFailure(msg) {
                console.error('Application submission failed:', msg);
                alert(msg);
                btn.disabled = false;
                mainText.classList.remove('d-none');
                loadText.classList.add('d-none');
                progGroup.classList.add('d-none');
            }

            request.onerror = () => {
                console.error('Network error occurred');
                handleFailure('Network connectivity lost. Please check your internet connection.');
            };

            request.ontimeout = () => {
                console.error('Request timed out');
                handleFailure('Request timed out. The file might be too large or your connection is slow.');
            };

            request.timeout = 300000; // 5 minutes timeout

            console.log('Sending request...');
            request.send(payload);
        });

        function playSuccessAudio() {
            // Construct message from visible text
            const title = document.querySelector('.success-modal-title').innerText;
            const text = document.querySelector('.success-modal-text').innerText;
            const fullMessage = title + ". " + text;

            if ('speechSynthesis' in window) {
                window.speechSynthesis.cancel();
                const msg = new SpeechSynthesisUtterance(fullMessage);
                msg.rate = 0.95;
                msg.pitch = 1;
                window.speechSynthesis.speak(msg);
            }
        }

    </script>

    <!-- Success Modal (Moved outside script tag) -->
    <div class="success-modal-overlay" id="successModal">
        <div class="success-modal-card">
            <div class="success-icon-container">
                <i class="fas fa-check"></i>
            </div>
            <h2 class="success-modal-title">Application Received!</h2>
            <p class="success-modal-text">
                We've received your credentials for the <strong>{{ $job->title }}</strong> position.
                Our talent acquisition committee will review your profile during the next screening
                round.
                You will receive an automated confirmation email shortly.
            </p>
            <div class="success-modal-actions">
                <button type="button" onclick="playSuccessAudio()" class="btn btn-ghost-cta w-100 mb-3"
                    style="background: #f1f5f9; color: #475569; letter-spacing: 1px; font-weight: 800; text-transform: uppercase;">
                    <i class="fas fa-play me-2"></i> REPLAY CONFIRMATION
                </button>
                <div class="d-flex gap-3 w-100">
                    <a href="{{ route('careers') }}" class="btn btn-navy-cta px-4 py-3 flex-fill">EXPLORE
                        CAREERS</a>
                    <a href="{{ route('careers') }}" class="btn btn-ghost-cta px-4 py-3 flex-fill">RETURN TO CAREERS</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Move success modal to body to ensure it appears above fixed headers
            const successModal = document.getElementById('successModal');
            if (successModal) {
                document.body.appendChild(successModal);
            }
        });
    </script>
@endsection