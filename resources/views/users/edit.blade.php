@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form
        action="{{ route('users.update', $user) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        @include('users._form', [
            'buttonText' => 'Update User',
        ])
    </form>
@endsection