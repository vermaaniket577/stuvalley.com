@extends('layouts.admin')

@section('content')
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2>Social Links</h2>
            <button onclick="document.getElementById('createForm').style.display='block'" class="btn btn-primary">Add
                New</button>
        </div>

        <!-- Create Form (Hidden) -->
        <div id="createForm"
            style="display:none; margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 5px;">
            <form action="{{ route('social-links.store') }}" method="POST">
                @csrf
                <h3>Add Link</h3>
                <div class="form-group">
                    <label>Platform (e.g. Facebook)</label>
                    <input type="text" name="platform" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="url" name="url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Icon Class (FontAwesome, e.g. fab fa-facebook)</label>
                    <input type="text" name="icon" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" onclick="document.getElementById('createForm').style.display='none'"
                    class="btn">Cancel</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Platform</th>
                    <th>URL</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socialLinks as $link)
                    <tr>
                        <td>{{ $link->platform }}</td>
                        <td><a href="{{ $link->url }}" target="_blank">{{Str::limit($link->url, 30)}}</a></td>
                        <td><i class="{{ $link->icon }}"></i> {{ $link->icon }}</td>
                        <td style="display: flex; gap: 5px;">
                            <button
                                onclick="showEditForm({{ $link->id }}, '{{ $link->platform }}', '{{ $link->url }}', '{{ $link->icon }}')"
                                class="btn btn-warning"
                                style="padding: 5px 10px; font-size: 0.8rem; background: #ffc107; border: none; color: #000; border-radius: 4px; cursor: pointer;">Edit</button>
                            <form action="{{ route('social-links.destroy', $link->id) }}" method="POST"
                                onsubmit="return confirm('Delete?');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    style="padding: 5px 10px; font-size: 0.8rem; border-radius: 4px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Edit Form Modal (Hidden) -->
        <div id="editFormOverlay"
            style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
            <div
                style="background: white; width: 400px; margin: 100px auto; padding: 20px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                <form id="editSocialLinkForm" method="POST">
                    @csrf
                    @method('PUT')
                    <h3>Edit Social Link</h3>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">Platform</label>
                        <input type="text" name="platform" id="edit_platform" class="form-control"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px;">URL</label>
                        <input type="url" name="url" id="edit_url" class="form-control"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 5px;">Icon Class</label>
                        <input type="text" name="icon" id="edit_icon" class="form-control"
                            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn btn-success"
                            style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Update
                            Link</button>
                        <button type="button" onclick="document.getElementById('editFormOverlay').style.display='none'"
                            class="btn"
                            style="background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showEditForm(id, platform, url, icon) {
            document.getElementById('editSocialLinkForm').action = "{{ url('admin/social-links') }}/" + id;
            document.getElementById('edit_platform').value = platform;
            document.getElementById('edit_url').value = url;
            document.getElementById('edit_icon').value = icon;
            document.getElementById('editFormOverlay').style.display = 'block';
        }
    </script>
@endsection