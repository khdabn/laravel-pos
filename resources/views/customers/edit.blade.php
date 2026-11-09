@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>

    <form
        action="{{ route('customers.update', $customer) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        @include('customers._form', [
            'buttonText' => 'Update Customer',
        ])
    </form>
@endsection