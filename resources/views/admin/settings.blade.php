@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Site Settings</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Phone (India - Mobile)</label>
                                <input type="text" name="phone_india" class="form-control"
                                    value="{{ \App\Models\Setting::get('phone_india') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>WhatsApp Number</label>
                                <input type="text" name="contact_whatsapp" class="form-control"
                                    value="{{ \App\Models\Setting::get('contact_whatsapp') }}">
                                <small class="text-muted">Enter number with country code (e.g. 919876543210). Leave empty to
                                    hide the button.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>WhatsApp Default Message (Optional)</label>
                                <input type="text" name="contact_whatsapp_msg" class="form-control"
                                    value="{{ \App\Models\Setting::get('contact_whatsapp_msg') }}"
                                    placeholder="e.g. Hi, I would like to know more about your services.">
                                <small class="text-muted">This message will be pre-filled when a user clicks the WhatsApp
                                    button.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone (India - Landline)</label>
                                <input type="text" name="phone_india_landline" class="form-control"
                                    value="{{ \App\Models\Setting::get('phone_india_landline') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email (Top Bar / Primary)</label>
                                <input type="email" name="email_primary" class="form-control"
                                    value="{{ \App\Models\Setting::get('email_primary') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email (Support / Footer)</label>
                                <input type="email" name="email_support" class="form-control"
                                    value="{{ \App\Models\Setting::get('email_support') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Website URL</label>
                                <input type="text" name="website_url" class="form-control"
                                    value="{{ \App\Models\Setting::get('website_url') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Branding</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Site Logo</label>
                                @if(\App\Models\Setting::get('site_logo'))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . \App\Models\Setting::get('site_logo')) }}"
                                            alt="Current Logo"
                                            style="max-height: 50px; background: #ddd; padding: 5px; border-radius: 4px;">
                                    </div>
                                @endif
                                <input type="file" name="site_logo" class="form-control-file">
                                <small class="text-muted">Upload a new logo (PNG/JPG).</small>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Address & Locations</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>India Address (Footer)</label>
                                <textarea name="address_india" class="form-control"
                                    rows="5">{{ \App\Models\Setting::get('address_india') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Map Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Google Map Embed URL (src)</label>
                                <textarea name="google_map_embed" class="form-control" rows="4"
                                    placeholder="https://www.google.com/maps/embed?pb=...">{{ \App\Models\Setting::get('google_map_embed') }}</textarea>
                                <small class="text-muted">Go to Google Maps -> Share -> Embed a map -> Copy the URL inside
                                    src="..." and paste it here.</small>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save All Settings</button>
                </div>
            </div>
        </form>
    </div>
@endsection