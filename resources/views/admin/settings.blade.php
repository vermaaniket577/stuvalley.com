@extends('layouts.admin')

@section('content')
    <!-- DEBUG: CLEAN_VERSION_1.0 -->
    <div class="container-fluid py-4">
        <style>
            /* Professional Configuration Center Styles */
            .config-card {
                background: #ffffff;
                border-radius: 16px;
                border: 1px solid #eef2f6;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
                margin-bottom: 2rem;
                transition: transform 0.2s ease;
            }

            .config-card-header {
                padding: 1.5rem;
                border-bottom: 1px solid #f1f5f9;
                display: flex;
                align-items: center;
                background: #fdfdfd;
                border-radius: 16px 16px 0 0;
            }

            .config-card-header i {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(243, 111, 33, 0.1);
                color: #f36f21;
                border-radius: 10px;
                margin-right: 1rem;
                font-size: 1.2rem;
            }

            .config-card-header h2 {
                margin: 0;
                font-size: 1.1rem;
                font-weight: 700;
                color: #1e293b;
            }

            .config-card-body {
                padding: 2rem;
            }

            .form-label-premium {
                font-weight: 600;
                color: #475569;
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
                display: block;
            }

            .premium-input {
                height: 50px;
                border-radius: 10px;
                border: 1.5px solid #e2e8f0;
                padding: 0 1rem;
                width: 100%;
                transition: all 0.2s;
                color: #1e293b;
                font-size: 0.95rem;
            }

            .premium-input:focus {
                border-color: #f36f21;
                box-shadow: 0 0 0 4px rgba(243, 111, 33, 0.1);
                outline: none;
            }

            .dynamic-row-premium {
                display: flex;
                gap: 12px;
                margin-bottom: 12px;
                animation: slideIn 0.3s ease-out;
            }

            .btn-dynamic {
                width: 50px;
                height: 50px;
                border-radius: 10px;
                border: none;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s;
                flex-shrink: 0;
            }

            .btn-dynamic-add {
                background: #f0fdf4;
                color: #16a34a;
            }

            .btn-dynamic-add:hover {
                background: #dcfce7;
                transform: scale(1.05);
            }

            .btn-dynamic-remove {
                background: #fff1f2;
                color: #e11d48;
            }

            .btn-dynamic-remove:hover {
                background: #ffe4e6;
                transform: scale(1.05);
            }

            .help-text-premium {
                font-size: 0.8rem;
                color: #64748b;
                margin-top: 0.5rem;
                display: block;
            }

            .btn-save-premium {
                background: #1e293b;
                color: #fff;
                border: none;
                padding: 1.2rem 2.5rem;
                border-radius: 12px;
                font-weight: 700;
                font-size: 1rem;
                letter-spacing: 0.5px;
                width: 100%;
                cursor: pointer;
                box-shadow: 0 10px 15px -3px rgba(30, 41, 59, 0.2);
                transition: all 0.3s;
                margin-bottom: 4rem;
            }

            .btn-save-premium:hover {
                background: #f36f21;
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(243, 111, 33, 0.3);
            }

            .config-divider {
                height: 1px;
                background: #f1f5f9;
                margin: 2.5rem 0;
            }

            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            textarea.premium-input {
                height: auto;
                min-height: 120px;
                padding: 1rem;
            }
        </style>

        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-5 fw-bold" style="color: #0f172a;">Configuration <span
                        style="color: #f36f21;">Center</span></h1>
                <p class="text-muted">Manage your website's core identity and contact details</p>
            </div>

            <div class="col-lg-12">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Left Column: Primary Contact & Identity -->
                        <div class="col-md-6">
                            <div class="config-card">
                                <div class="config-card-header">
                                    <i class="fas fa-id-card"></i>
                                    <h2>Contact Details</h2>
                                </div>
                                <div class="config-card-body">
                                    <div class="mb-4">
                                        <label class="form-label-premium">Primary Support Email</label>
                                        <input type="email" name="email_primary" class="premium-input"
                                            value="{{ trim(\App\Models\Setting::get('email_primary'), '[]" ') }}"
                                            placeholder="info@stuvalley.com">
                                        <span class="help-text-premium">Used as the main contact email in the header and
                                            footer.</span>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-premium">Landline Number</label>
                                        <input type="text" name="phone_india_landline" class="premium-input"
                                            value="{{ trim(\App\Models\Setting::get('phone_india_landline'), '[]" ') }}"
                                            placeholder="0124-4252-196">
                                    </div>

                                    <div class="config-divider"></div>

                                    <!-- Mobile Numbers -->
                                    <div class="mb-4">
                                        <label class="form-label-premium">Mobile Numbers (Dynamic)</label>
                                        <div id="phone-rows">
                                            @php
                                                $phones = \App\Models\Setting::get('phone_india');
                                                $phones = ($phones && str_starts_with($phones, '[')) ? json_decode($phones, true) : ($phones ? [$phones] : ['']);
                                            @endphp
                                            @foreach($phones as $index => $phone)
                                                <div class="dynamic-row-premium">
                                                    <input type="text" name="phone_india[]" class="premium-input"
                                                        value="{{ trim($phone, '" ') }}" placeholder="e.g. +91 98765 43210">
                                                    @if($index == 0)
                                                        <button type="button" class="btn-dynamic btn-dynamic-add"
                                                            onclick="addNewRow('phone-rows', 'phone_india[]')">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn-dynamic btn-dynamic-remove"
                                                            onclick="this.parentElement.remove()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="config-divider"></div>

                                    <!-- Email Support -->
                                    <div class="mb-4">
                                        <label class="form-label-premium">Additional Support Emails (Dynamic)</label>
                                        <div id="email-rows">
                                            @php
                                                $emails = \App\Models\Setting::get('email_support');
                                                $emails = ($emails && str_starts_with($emails, '[')) ? json_decode($emails, true) : ($emails ? [$emails] : ['']);
                                            @endphp
                                            @foreach($emails as $index => $email)
                                                <div class="dynamic-row-premium">
                                                    <input type="email" name="email_support[]" class="premium-input"
                                                        value="{{ trim($email, '" ') }}" placeholder="support@stuvalley.com">
                                                    @if($index == 0)
                                                        <button type="button" class="btn-dynamic btn-dynamic-add"
                                                            onclick="addNewRow('email-rows', 'email_support[]', 'email')">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn-dynamic btn-dynamic-remove"
                                                            onclick="this.parentElement.remove()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="config-card">
                                <div class="config-card-header">
                                    <i class="fas fa-search"></i>
                                    <h2>Global SEO Settings</h2>
                                </div>
                                <div class="config-card-body">
                                    <div class="mb-4">
                                        <label class="form-label-premium">Home Page Meta Title</label>
                                        <input type="text" name="seo_home_title" class="premium-input"
                                            value="{{ \App\Models\Setting::get('seo_home_title') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-premium">Home Page Meta Description</label>
                                        <textarea name="seo_home_desc"
                                            class="premium-input">{{ \App\Models\Setting::get('seo_home_desc') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Identity & Contact Page -->
                        <div class="col-md-6">
                            <div class="config-card">
                                <div class="config-card-header">
                                    <i class="fas fa-fingerprint"></i>
                                    <h2>Identity & Office</h2>
                                </div>
                                <div class="config-card-body">
                                    <div class="mb-4">
                                        <label class="form-label-premium">Site Logo</label>
                                        @if(\App\Models\Setting::get('site_logo'))
                                            <div
                                                style="background: #f8fafc; padding: 1.5rem; border-radius: 12px; margin-bottom: 1rem; border: 1px dashed #cbd5e1; text-align: center;">
                                                <img src="{{ asset('storage/' . \App\Models\Setting::get('site_logo')) }}"
                                                    style="max-height: 50px;">
                                            </div>
                                        @endif
                                        <input type="file" name="site_logo" class="form-control"
                                            style="border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 0.5rem;">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-premium">Office Address</label>
                                        <textarea name="address_india"
                                            class="premium-input">{{ \App\Models\Setting::get('address_india') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label-premium">Google Maps Embed URL</label>
                                        <input type="text" name="google_map_embed" class="premium-input"
                                            value="{{ trim(\App\Models\Setting::get('google_map_embed'), '"') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="config-card">
                                <div class="config-card-header">
                                    <i class="fas fa-paper-plane"></i>
                                    <h2>Contact Page Customization</h2>
                                </div>
                                <div class="config-card-body">
                                    <div class="mb-4">
                                        <label class="form-label-premium">Hero Badge</label>
                                        <input type="text" name="contact_hero_badge" class="premium-input"
                                            value="{{ \App\Models\Setting::get('contact_hero_badge') }}"
                                            placeholder="Get in Touch">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-premium">Hero Title</label>
                                        <input type="text" name="contact_hero_title" class="premium-input"
                                            value="{{ \App\Models\Setting::get('contact_hero_title') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-premium">Hero Description</label>
                                        <textarea name="contact_hero_description"
                                            class="premium-input">{{ \App\Models\Setting::get('contact_hero_description') }}</textarea>
                                    </div>

                                    <div class="config-divider"></div>

                                    <div class="mb-4">
                                        <label class="form-label-premium">Info Section Title</label>
                                        <input type="text" name="contact_info_title" class="premium-input"
                                            value="{{ \App\Models\Setting::get('contact_info_title') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label-premium">Info Section Description</label>
                                        <textarea name="contact_info_description"
                                            class="premium-input">{{ \App\Models\Setting::get('contact_info_description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn-save-premium">
                            <i class="fas fa-cloud-upload-alt" style="margin-right: 10px;"></i> Push Changes Live
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function addNewRow(containerId, inputName, type = 'text') {
            const container = document.getElementById(containerId);
            const div = document.createElement('div');
            div.className = 'dynamic-row-premium';
            div.innerHTML = `
                            <input type="${type}" name="${inputName}" class="premium-input" placeholder="Enter detail...">
                            <button type="button" class="btn-dynamic btn-dynamic-remove" onclick="this.parentElement.remove()">
                                <i class="fas fa-minus"></i>
                            </button>
                        `;
            container.appendChild(div);
        }
    </script>
@endsection