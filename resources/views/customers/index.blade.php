@extends('layouts.app')

@section('content')
    <h1>Customer Accounts</h1>

    <p>Below is the list of customer accounts retrieved from the database.</p>

    @if (session('success'))
        <p role="status" style="color: #176b32;">
            {{ session('success') }}
        </p>
    @endif

    <p>
        <a href="{{ route('customers.create') }}">Create Customer</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection