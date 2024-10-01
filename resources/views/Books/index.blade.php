@extends('layout')

@section('page-content')

<p class="text-end">
    <a class="btn btn-primary", href="{{ route('Book.create') }}">New Book</a>
</p>

<table class="table table-striped table-bordered">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Stock</th>
        <th>Price</th>
        <th colspan=3>Details</th>
    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->stock}}</td>
            <td>{{$book->price}}</td>
            <td><a href="{{ route('Book.show', $book->id) }}" class="btn btn-outline-info" style="margin:0;padding:2">Details</a></td>
            <td><a href="{{ route('Book.show', $book->id) }}" class="btn btn-outline-success" style="margin:0;padding:2">Edit</a></td>
            <td>
                <form method="post", action="{{ route('Book.destroy', $book->id) }}", onsubmit="return confirm('Sure?')">
                    @csrf
                    @method('DELETE') 
                    <input type="submit", value="Delete" class="btn btn-outline-danger" style="margin:0;padding:2">
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{$books->links()}}

@endsection
