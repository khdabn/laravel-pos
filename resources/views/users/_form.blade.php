<div>
    <label for="username">Username</label>
    <input
        id="username"
        name="username"
        type="text"
        maxlength="50"
        value="{{ old('username', $user->username ?? '') }}"
        required
    >
    @error('username')
        <p style="color: #b00020;">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="full_name">Full Name</label>
    <input
        id="full_name"
        name="full_name"
        type="text"
        maxlength="100"
        value="{{ old('full_name', $user->full_name ?? '') }}"
        required
    >
    @error('full_name')
        <p style="color: #b00020;">{{ $message }}</p>
    @enderror
</div>

@if (isset($user))
    @if ($user->avatar)
        <p>Current avatar:</p>
        <img
            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($user->avatar) }}"
            alt="Current avatar for {{ $user->full_name }}"
            width="100"
            height="100"
        >
    @endif

    <div>
        <label for="avatar">Profile Picture (optional)</label>
        <input
            id="avatar"
            name="avatar"
            type="file"
            accept="image/jpeg,image/png,image/webp"
            aria-describedby="avatar-help"
        >
        <p id="avatar-help">
            JPG, PNG, or WEBP. Maximum 2 MB.
            Leave empty to keep the current avatar.
        </p>

        @error('avatar')
            <p style="color: #b00020;">{{ $message }}</p>
        @enderror
    </div>
@endif

<button type="submit">{{ $buttonText }}</button>
<a href="{{ route('users.index') }}">Cancel</a>