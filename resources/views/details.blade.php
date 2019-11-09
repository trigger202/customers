@extends('layouts.app')

@section('title', $customer->first_name . "'s Order History")

@section('content')
    <table class="table ">
        <thead>
        <tr>
            <th>Date</th>
            <th># of Products</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @if( count($customer->getOrders()) < 1)
            <tr>
                <td colspan="2">No order history yet <br><br><br></td>
            </tr>
        @else
            {{-- Details go here --}}
            @foreach($customer->getOrders() as $order)
                <tr>
                    <td colspan="2">{{ $order->getCreatedDate() }}</td>
                    <td colspan="2">{{ $order->items_total }}</td>
                    <td colspan="2">{{ $order->total_inc_tax }}</td>
                </tr>
            @endforeach
        @endif

        <tr>
            <td colspan="2">Lifetime Value</td>
            <td>${{ $lifeTimeValue}}</td>
        </tr>
        </tbody>
    </table>
@endsection
