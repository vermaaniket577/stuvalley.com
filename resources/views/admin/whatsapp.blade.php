@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">WhatsApp Chat Manager</h1>

        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Configure WhatsApp Button</h6>
                        <i class="fab fa-whatsapp fa-2x text-success"></i>
                    </div>
                    <div class="card-body">
                        <p class="mb-4">Manage the floating WhatsApp chat button that appears on your website. This allows
                            visitors to directly contact you.</p>

                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="contact_whatsapp" style="font-size: 1.1rem;">WhatsApp Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    @php
                                        $whatsapp_val = \App\Models\Setting::get('contact_whatsapp');
                                        if ($whatsapp_val && str_starts_with($whatsapp_val, '[')) {
                                            $wa_nums = json_decode($whatsapp_val, true);
                                            $whatsapp_val = !empty($wa_nums) ? $wa_nums[0] : '';
                                        }
                                    @endphp
                                    <input type="text" name="contact_whatsapp" id="contact_whatsapp"
                                        class="form-control form-control-lg" value="{{ trim($whatsapp_val, '" ') }}"
                                        placeholder="e.g. 919425455499">
                                </div>
                                <small class="text-muted mt-2 d-block">
                                    <i class="fas fa-info-circle"></i> Enter your full number with country code (no +
                                    symbol). Leave empty to <strong>disable</strong> the button on the site.
                                </small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="contact_whatsapp_msg" style="font-size: 1.1rem;">Default Welcome Message</label>
                                <textarea name="contact_whatsapp_msg" id="contact_whatsapp_msg" class="form-control"
                                    rows="3"
                                    placeholder="Hi! I'm interested in your services...">{{ \App\Models\Setting::get('contact_whatsapp_msg') }}</textarea>
                                <small class="text-muted mt-2 d-block">
                                    <i class="fas fa-comment-dots"></i> This message will be pre-typed for the user when
                                    they open WhatsApp.
                                </small>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                <i class="fas fa-save mr-2"></i> Update WhatsApp Settings
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <!-- Preview Card -->
                <div class="card shadow mb-4 border-left-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Live Preview</h5>
                        <p>This is how the button behaves on your site:</p>

                        <div
                            style="background: #f0f2f5; padding: 20px; border-radius: 10px; text-align: center; height: 300px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <!-- Mock Website Background -->
                            <div
                                style="position: absolute; width: 100%; height: 100%; top:0; left:0; background-image: radial-gradient(#ddd 1px, transparent 1px); background-size: 20px 20px; opacity: 0.5;">
                            </div>

                            <div style="z-index: 10;">
                                <h6>Your Website Content</h6>
                                <p class="small text-muted">The button floats in the bottom right.</p>
                            </div>

                            <!-- The Button Preview -->
                            <div
                                style="position: absolute; bottom: 20px; right: 20px; width: 60px; height: 60px; background: #25d366; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </div>

                        <div class="mt-3">
                            <strong>Current Status:</strong>
                            @if(\App\Models\Setting::get('contact_whatsapp'))
                                <span class="badge badge-success px-3 py-2">Active</span>
                            @else
                                <span class="badge badge-secondary px-3 py-2">Disabled</span>
                                <small class="d-block text-danger mt-1">Enter a number to enable.</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Chatbot Integration & Simulator -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">🤖 No-API Chatbot Integration</h6>
                </div>
                <div class="card-body">
                    <p>We have installed a smart <strong>Reply Engine</strong> on your server.</p>

                    <div class="alert alert-secondary">
                        <strong>Your Webhook URL:</strong><br>
                        <code style="user-select: all;">{{ url('/api/whatsapp/webhook') }}</code>
                    </div>

                    <h6>How to use this?</h6>
                    <ol class="small text-muted pl-3">
                        <li>Install an automation app (e.g., <strong>AutoResponder for WA</strong> or
                            <strong>Tasker</strong>) on your Android phone.
                        </li>
                        <li>Set a rule to catch <strong>All Messages</strong> (Wildcard: *).</li>
                        <li>Set action to <strong>HTTP Request</strong> (POST or GET).</li>
                        <li>Use the URL above. Pass the message as a parameter named <code>message</code>.</li>
                        <li>The app will send the message to this server, get the smart reply, and send it back to the user
                            automatically.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">💬 Test Simulator</h6>
                </div>
                <div class="card-body">
                    <div id="chat-box"
                        style="height: 250px; overflow-y: auto; border: 1px solid #eee; padding: 10px; background: #fafafa; border-radius: 5px; margin-bottom: 10px;">
                        <div class="text-center text-muted small mt-5">Type "hi" to start...</div>
                    </div>
                    <div class="input-group">
                        <input type="text" id="sim-input" class="form-control"
                            placeholder="Type a message (e.g., hi, 1, 2)...">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" onclick="sendMessage()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function sendMessage() {
            let input = document.getElementById('sim-input');
            let msg = input.value;
            if (!msg) return;

            // Add user message
            let chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<div class="text-right mb-2"><span style="background:#dcf8c6; padding:5px 10px; border-radius:5px; display:inline-block;">${msg}</span></div>`;
            input.value = '';
            chatBox.scrollTop = chatBox.scrollHeight; // Auto scroll

            // Call API
            fetch('{{ url("/api/whatsapp/webhook") }}?message=' + encodeURIComponent(msg))
                .then(response => response.text())
                .then(reply => {
                    // Convert newlines to breaks for display
                    let formatted = reply.replace(/\n/g, '<br>');
                    chatBox.innerHTML += `<div class="text-left mb-2"><span style="background:#fff; border:1px solid #ddd; padding:5px 10px; border-radius:5px; display:inline-block;">${formatted}</span></div>`;
                    chatBox.scrollTop = chatBox.scrollHeight;
                })
                .catch(err => {
                    chatBox.innerHTML += `<div class="text-center text-danger small">Error connecting to server</div>`;
                });
        }

        // Enter key
        document.getElementById('sim-input').addEventListener("keyup", function (event) {
            if (event.key === "Enter") {
                sendMessage();
            }
        });
    </script>
@endsection