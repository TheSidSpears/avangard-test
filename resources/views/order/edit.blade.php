@extends('layouts.app')

@section('title', 'Orders list')

@section('body')
    <h1>Products</h1>
    @foreach($order->products as $product)
        <p>{{ $product->name }}, count: {{ $product->pivot->quantity }}</p>
    @endforeach

    <p>Price: {{ $order->countPrice() }}</p>

    @forelse($errors->all() as $error)
        <span class="error">{{ $error }}</span>
    @empty
    @endforelse

    <form action="{{ route('order.update', $order) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label for="email">Client e-mail:</label>
        <input type="email" name="client_email" value="{{ $order->client_email }}">

        <label for="partner">Partner</label>
        <select name="partner_id">
            @foreach($partners as $partner)
                <option value="{{ $partner->id }}"
                        @if($order->partner == $partner) selected @endif>{{ $partner->name }}</option>
            @endforeach
        </select>

        <label for="status">Status</label>
        <select name="status">
            @foreach($order->statuses as $key => $status)
                <option value="{{ $key }}" @if($order->status === $status) selected @endif>{{ $status }}</option>
            @endforeach
        </select>

        <input type="submit" value="Edit">
    </form>

    <a href="{{ route('order.index') }}">Back</a>
@endsection