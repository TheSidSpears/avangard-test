<form action="{{ route('order.update', $order) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <label for="email">Client e-mail:</label>
    <input type="email" name="client_email" value="{{ $order->client_email }}">

    <label for="partner">Partner</label>
    <input type="email" name="partner" value="{{ $order->partner->name }}">

    {{--    <label for="email">Products TODO</label>--}}
    {{--    <input type="email" name="email">--}}

    <label for="status">Status</label>
    <select name="status">
        @foreach($order->statuses as $key => $status)
            <option value="{{ $key }}" @if($order->status === $status) selected @endif>{{ $status }}</option>
        @endforeach
    </select>

    <p>Price:</p>
    <p>123123</p>
</form>