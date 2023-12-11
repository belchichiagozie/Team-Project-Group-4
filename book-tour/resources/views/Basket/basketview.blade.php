@extends('layouts.navbar')

@section('content')
    <h1>Your Basket</h1>

    @if (count($basketItems) > 0)
        <table>
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($basketItems as $item)
                    <tr>
                        <td>{{ $item->Title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>£{{ $item->Price }}</td>
                        <td>£{{ $item->quantity * $item->Price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total: £{{ $total }}</p>
    @else
        <p>Your basket is empty.</p>
    @endif

    <h2>Add Books to Basket</h2>


    <form action="{{ route('basket.add') }}" method="post">
        @csrf
        <label for="book_id">Select Books to Add:</label>
        <select name="book_id" id="book_id">
            @foreach ($availableBooks as $book)
                <option value="{{ $book->Book_ID }}">{{ $book->Title }} - £{{ $book->Price }}</option>
            @endforeach
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="submit">Add to Basket</button>
    </form>

    <h2>Remove Books from Basket</h2>

    <form action="{{ route('basket.remove') }}" method="post">
        @csrf
        <label for="book_ids">Select Books to Remove:</label>
        <select name="book_id" id="book_id">
            @foreach ($basketItems as $item)
                <option value="{{ $item->Book_ID }}">{{ $item->Title }} - ${{ $item->Price }}</option>
            @endforeach
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">

        <button type="submit">Remove from Basket</button>
    </form>


@endsection
