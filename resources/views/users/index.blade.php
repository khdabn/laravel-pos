@extends('layouts.app')

@section('content')
    <h1>User Accounts</h1>

    <p>User accounts retrieved from the database.</p>

    @if (session('success'))
        <p role="status" style="color: #176b32;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ route('users.create') }}">Create User</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>
                        <img
                            src="{{ $user->avatar
                                ? \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar)
                                : asset('images/avatar-placeholder.svg') }}"
                            alt="Avatar for {{ $user->full_name }}"
                            width="80"
                            height="80"
                            style="object-fit: cover; border-radius: 8px;"
                        >
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection