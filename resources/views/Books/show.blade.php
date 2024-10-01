@extends('layout')

@section('page-content')

<body>
    <h1>Book</h1>

    <a href="{{ route('Book.index') }}">Back</a>

    <table class="table table-striped table-bordered">
        <tr>
            <th>Title</th>
            <td>{{$book->title}}</td>
        </tr>
        <tr>
            <th>Author</th>
            <td>{{$book->author}}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{$book->stock}}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{$book->price}}</td>
        </tr>
    </table>
</body>

@endsection