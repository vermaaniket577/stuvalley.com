@extends('layouts.admin')

@section('content')
    <div class="admin-header-v2 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-users text-primary me-2"></i> Team Members</h1>
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add Member
            </a>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                            @else
                                <div style="width: 50px; height: 50px; border-radius: 50%; background: #eee; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $member->name }}</strong></td>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->sort_order }}</td>
                        <td>
                            <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this member?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            color: white;
        }
        .bg-success { background-color: #28a745; }
        .bg-danger { background-color: #dc3545; }
        .d-inline { display: inline-block; }
    </style>
@endsection
