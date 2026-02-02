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
            <form action="{{ isset($blog) ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST">
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
                                value="{{ old('title', $blog->title ?? '') }}" placeholder="Enter a compelling title"
                                required>
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
                            <textarea class="form-control" id="content" name="content" required
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
                                <input type="url" class="form-control" id="featured_image" name="featured_image"
                                    value="{{ old('featured_image', $blog->featured_image ?? '') }}"
                                    placeholder="https://images.unsplash.com/...">
                                <div class="form-text">Recommended size: 1200x800px.</div>
                            </div>

                            <!-- Author -->
                            <div class="mb-4">
                                <label for="author" class="form-label fw-bold">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="{{ old('author', $blog->author ?? 'Stuvalley Team') }}">
                            </div>

                            <!-- Category -->
                            <div class="mb-4">
                                <label for="category" class="form-label fw-bold">Category</label>
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

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label fw-bold">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags"
                                    value="{{ old('tags', $blog->tags ?? '') }}" placeholder="tech, innovation, ai">
                                <div class="form-text">Separate with commas.</div>
                            </div>

                            <!-- Reading Time -->
                            <div class="mb-4">
                                <label for="reading_time" class="form-label fw-bold">Reading Time (min)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="reading_time" name="reading_time"
                                        value="{{ old('reading_time', $blog->reading_time ?? 5) }}" min="1">
                                    <span class="input-group-text">minutes</span>
                                </div>
                            </div>

                            <!-- Publish Status -->
                            <div class="mb-4">
                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_published"
                                                name="is_published" value="1" {{ old('is_published', $blog->is_published ?? false) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold ms-2" for="is_published">
                                                Publish Post Immediately
                                            </label>
                                        </div>
                                        <div class="form-text ms-4 mt-2 small">If disabled, the post will be saved as a
                                            draft.</div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button type="submit" class="btn btn-primary d-block w-100 py-3 shadow-sm">
                                <i class="fas fa-save me-2"></i> {{ isset($blog) ? 'Update' : 'Publish' }} Post
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

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }

        .form-control-lg {
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* CKEditor Override */
        .ck-editor__editable_inline {
            min-height: 500px;
        }

        /* Fix toolbar z-index if needed */
        .ck-toolbar {
            z-index: 1 !important;
        }

        .form-label {
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .form-text {
            color: #94a3b8;
            font-size: 0.75rem;
        }
    </style>

    <!-- CKEditor 5 Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            ClassicEditor
                .create(document.querySelector('#content'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', '|', 'undo', 'redo'],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                        ]
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection