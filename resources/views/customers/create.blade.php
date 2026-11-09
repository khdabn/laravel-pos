@extends('layouts.app')

@section('content')
    <h1>Create Customer</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        @include('customers._form', [
            'buttonText' => 'Save Customer',
        ])
    </form>
@endsection