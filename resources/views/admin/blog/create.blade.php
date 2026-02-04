@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-edit text-primary me-2"></i> {{ isset($blog) ? 'Edit' : 'Create' }} Blog Post</h1>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <form id="blogPostForm" novalidate
                action="{{ isset($blog) ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST">
                @csrf
                @if(isset($blog))
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <div class="col-lg-8">
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Post Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title"
                                value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter a compelling title">
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="mb-4">
                            <label for="excerpt" class="form-label fw-bold">Excerpt</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="3"
                                placeholder="A brief summary for listings...">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                            <div class="form-text">Keep it between 150-160 characters for best SEO results.</div>
                        </div>

                        <!-- Content -->
                        <div class="mb-0">
                            <label for="content" class="form-label fw-bold">Content <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="content" name="content"
                                placeholder="Write your masterpiece here...">{{ old('content', $blog->content ?? '') }}</textarea>
                            @error('content')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sticky-top" style="top: 2rem; z-index: 10;">
                            <!-- Featured Image -->
                            <div class="mb-4">
                                <label for="featured_image" class="form-label fw-bold">Featured Image URL</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="fas fa-image text-muted"></i></span>
                                    <input type="url" class="form-control" id="featured_image" name="featured_image"
                                        value="{{ old('featured_image', $blog->featured_image ?? '') }}"
                                        placeholder="https://images.unsplash.com/...">
                                </div>
                                <div class="form-text">Recommended size: 1200x800px.</div>
                            </div>

                            <!-- Author -->
                            <div class="mb-4">
                                <label for="author" class="form-label fw-bold">Author</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i
                                            class="fas fa-user-pen text-muted"></i></span>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ old('author', $blog->author ?? 'Stuvalley Team') }}">
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="form-label fw-bold">Category</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="fas fa-list text-muted"></i></span>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Select Category</option>
                                        <option value="Web Development" {{ old('category', $blog->category ?? '') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                        <option value="Mobile Apps" {{ old('category', $blog->category ?? '') == 'Mobile Apps' ? 'selected' : '' }}>Mobile Apps</option>
                                        <option value="AI & ML" {{ old('category', $blog->category ?? '') == 'AI & ML' ? 'selected' : '' }}>AI & ML</option>
                                        <option value="Cloud & SaaS" {{ old('category', $blog->category ?? '') == 'Cloud & SaaS' ? 'selected' : '' }}>Cloud & SaaS</option>
                                        <option value="UI/UX Design" {{ old('category', $blog->category ?? '') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                        <option value="Digital Marketing" {{ old('category', $blog->category ?? '') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                        <option value="Industry News" {{ old('category', $blog->category ?? '') == 'Industry News' ? 'selected' : '' }}>Industry News</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label fw-bold">Tags</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="fas fa-hashtag text-muted"></i></span>
                                    <input type="text" class="form-control" id="tags" name="tags"
                                        value="{{ old('tags', $blog->tags ?? '') }}" placeholder="tech, innovation, ai">
                                </div>
                                <div class="form-text">Separate with commas.</div>
                            </div>

                            <!-- Reading Time -->
                            <div class="mb-4">
                                <label for="reading_time" class="form-label fw-bold">Reading Time (min)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i
                                            class="fas fa-hourglass-half text-muted"></i></span>
                                    <input type="number" class="form-control" id="reading_time" name="reading_time"
                                        value="{{ old('reading_time', $blog->reading_time ?? 5) }}" min="1">
                                    <span class="input-group-text bg-light">minutes</span>
                                </div>
                            </div>

                            <!-- Publish Status -->
                            <div class="mb-4">
                                <div class="card bg-light border-0 shadow-none" style="border-radius: 12px;">
                                    <div class="card-body p-3">
                                        <div class="form-check form-switch mb-1">
                                            <input class="form-check-input" type="checkbox" id="is_published"
                                                name="is_published" value="1" {{ old('is_published', $blog->is_published ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold ms-2 text-dark" for="is_published">
                                                Publish Post Immediately
                                            </label>
                                        </div>
                                        <div class="text-muted small ms-4">If disabled, the post will be saved as a draft.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 opacity-10">

                            <button type="submit" id="submitBtn" class="btn btn-publish-pro w-100 py-3 mb-3">
                                <span class="btn-text">
                                    <i class="fas fa-save me-2"></i> {{ isset($blog) ? 'Save Changes' : 'Publish Post' }}
                                </span>
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="true"></span>
                                <span class="processing-text d-none ms-2">Processing...</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .admin-header-v2 h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .btn-publish-pro {
            background: #f36f21;
            /* Match screenshot orange */
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(243, 111, 33, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-publish-pro:hover {
            background: #e65a0d;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(243, 111, 33, 0.3);
            color: white;
        }

        .btn-publish-pro:active {
            transform: translateY(0);
        }

        .input-group-text {
            border: 1px solid #e2e8f0;
            border-right: none;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .input-group>.form-control,
        .input-group>.form-select {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #f36f21;
            box-shadow: 0 0 0 4px rgba(243, 111, 33, 0.1);
            z-index: 3;
        }

        .form-control-lg {
            font-size: 1.25rem;
            font-weight: 700;
            border-radius: 12px;
        }

        /* CKEditor Override */
        .ck-editor__editable_inline {
            min-height: 500px;
            border-radius: 0 0 12px 12px !important;
            border: 1px solid #e2e8f0 !important;
        }

        .ck-toolbar {
            border-radius: 12px 12px 0 0 !important;
            border: 1px solid #e2e8f0 !important;
            background: #f8fafc !important;
        }

        .form-label {
            font-size: 0.9rem;
            color: #334155;
            margin-bottom: 0.6rem;
        }

        .sticky-top {
            padding-top: 10px;
        }
    </style>

    <!-- SweetAlert2 for Beautiful Modals -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor 5 Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        let editorInstance;

        document.addEventListener("DOMContentLoaded", function () {
            // CKEditor Initialization
            ClassicEditor
                .create(document.querySelector('#content'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', '|', 'undo', 'redo'],
                })
                .then(editor => {
                    editorInstance = editor;
                })
                .catch(error => {
                    console.error(error);
                });

            // Robust Native Form Submission
            const blogForm = document.getElementById('blogPostForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const spinner = submitBtn.querySelector('.spinner-border');
            const processingText = submitBtn.querySelector('.processing-text');

            blogForm.addEventListener('submit', function (e) {
                e.preventDefault();
                console.log('Form submission started');

                // Helper for alerts (falls back to native alert if Swal is blocked)
                const showMessage = (icon, title, text) => {
                    if (typeof Swal !== 'undefined') {
                        return Swal.fire({ icon, title, text, confirmButtonColor: '#f36f21' });
                    } else {
                        alert(`${title}: ${text}`);
                        return Promise.resolve();
                    }
                };

                // 1. Sync CKEditor Data if active
                if (editorInstance) {
                    document.querySelector('#content').value = editorInstance.getData();
                }
                const contentValue = document.querySelector('#content').value;

                // 2. Custom Validation
                const title = document.getElementById('title').value;
                if (!title || title.trim() === '') {
                    showMessage('warning', 'Title Required', 'Please enter a title.');
                    return;
                }
                if (!contentValue || contentValue.trim() === '') {
                    showMessage('warning', 'Content Required', 'Please write some content.');
                    return;
                }

                // 3. UI Updates
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.85';
                if (btnText) btnText.style.display = 'none';
                if (spinner) spinner.classList.remove('d-none');
                if (processingText) processingText.classList.remove('d-none');

                // 4. AJAX Submission
                const formData = new FormData(blogForm);

                fetch(blogForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                    .then(async response => {
                        console.log('Response received:', response.status);
                        const isJson = response.headers.get('content-type')?.includes('application/json');
                        const body = isJson ? await response.json() : null;

                        if (!response.ok) {
                            // Handle Validation Errors
                            let errorMessage = body?.message || 'Something went wrong.';
                            if (body?.errors) {
                                errorMessage = Object.values(body.errors).flat().join('\n');
                            }
                            throw new Error(errorMessage);
                        }

                        return body;
                    })
                    .then(data => {
                        // Success
                        const successTitle = data.status === 'published' ? 'Published!' : 'Saved!';

                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: successTitle,
                                text: data.message,
                                confirmButtonColor: '#f36f21',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = "{{ route('admin.blog.index') }}";
                            });
                        } else {
                            alert(`${successTitle}\n${data.message}`);
                            window.location.href = "{{ route('admin.blog.index') }}";
                        }
                    })
                    .catch(error => {
                        console.error('Submission Error:', error);
                        showMessage('error', 'Submission Failed', error.message || 'Failed to connect to the server.');

                        // Reset UI
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        if (btnText) btnText.style.display = 'block';
                        if (spinner) spinner.classList.add('d-none');
                        if (processingText) processingText.classList.add('d-none');
                    });
            });
        });
    </script>

    <style>
        /* Custom SweetAlert2 Styling */
        .animated-popup {
            border-radius: 16px !important;
            padding: 0 !important;
        }

        .swal2-title {
            font-size: 1.75rem !important;
            font-weight: 700 !important;
            padding: 30px 30px 10px !important;
        }

        .swal2-html-container {
            padding: 0 !important;
            margin: 0 !important;
        }

        .btn-confirm-custom,
        .btn-cancel-custom {
            border-radius: 10px !important;
            padding: 12px 30px !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
        }

        .swal2-actions {
            padding: 20px 30px 30px !important;
        }
    </style>
@endsection