@foreach ($orders as $order)
    <p>{{ $order->id }}</p>
    <p>{{ $order->partner->name }}</p>

    <p>{{ $order->countPrice() }}</p>

    <p>
    @foreach ($order->products as $products)
        {{ $products->name }},
    @endforeach
    </p>
    <p>{{ $order->status }}</p>
    <br>
@endforeach