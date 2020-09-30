<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Products</th>
        <th>Status</th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td><a href="{{ route('order.edit', $order)}}">{{ $order->id }}</a></td>
            <td>{{ $order->partner->name }}</td>
            <td>{{ $order->countPrice() }}</td>
            <td>
                @foreach ($order->products as $products)
                    @if ($loop->last)
                        {{ $products->name }}
                    @else
                        {{ $products->name }},
                    @endif
                @endforeach
            </td>
            <td>@lang("order.status.$order->status")</td>
        </tr>
    @endforeach
</table>

{{ $orders->links() }}