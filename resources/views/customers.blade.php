@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th># of Orders</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }} </td>
                <td>{{ $customer->getFullName() }} </td>
                <td>{{ count($customer->getOrders()) }} </td>
                <td><a href='{{ route('CustomerDetails.show', $customer->id) }}'>View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
