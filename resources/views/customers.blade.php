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
                <td>{{ $customer->getId() }} </td>
                <td>{{ $customer->getFullName() }} </td>
                <td>{{ $customer->getTotalOrders() }} </td>
                <td><a href='{{ route('CustomerDetails.show', $customer->getId()) }}'>View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
