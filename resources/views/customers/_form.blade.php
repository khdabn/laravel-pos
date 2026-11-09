<div>
    <label for="full_name">Full Name</label>
    <input
        id="full_name"
        name="full_name"
        type="text"
        maxlength="100"
        value="{{ old('full_name', $customer->full_name ?? '') }}"
        required
    >
    @error('full_name')
        <p style="color: #b00020;">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="email">Email Address</label>
    <input
        id="email"
        name="email"
        type="email"
        maxlength="100"
        value="{{ old('email', $customer->email ?? '') }}"
        required
    >
    @error('email')
        <p style="color: #b00020;">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="phone">Phone Number (optional)</label>
    <input
        id="phone"
        name="phone"
        type="text"
        maxlength="20"
        value="{{ old('phone', $customer->phone ?? '') }}"
    >
    @error('phone')
        <p style="color: #b00020;">{{ $message }}</p>
    @enderror
</div>

<button type="submit">{{ $buttonText }}</button>
<a href="{{ route('customers.index') }}">Cancel</a>