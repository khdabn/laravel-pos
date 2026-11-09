@extends('layouts.app')

@section('content')
    <h1>Create User</h1>

    <p>You can upload a profile picture after creating the user.</p>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        @include('users._form', [
            'buttonText' => 'Save User',
        ])
    </form>
@endsection