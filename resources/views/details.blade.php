@extends('layouts.app')

@section('title', $customer->getFirstName() . "'s Order History")

@section('content')
    @if( count($customer->getOrders()) < 1)
        <p>No order history yet</p>
    @endif
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th># of Products</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        {{-- Details go here --}}
        <tr>
            <td colspan="2">Lifetime Value</td>
            <td>${{ $lifeTimeValue }}</td>
        </tr>
        </tbody>
    </table>
@endsection
