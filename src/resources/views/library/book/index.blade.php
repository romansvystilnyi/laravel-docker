@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <form method="GET" action="{{ route('library.book.index') }}">
                <div class="form-group">
                    <label for="genre">Filters</label>
                    <select class="form-control" name="genre" id="genre">
                        <option></option>
                        <option>no categories</option>
                        <option>Children's Books</option>
                        <option>Education & Teaching</option>
                        <option>History</option>
                        <option>Literature & Fiction</option>
                        <option>Mystery, Thriller & Suspense</option>
                        <option>Romance</option>
                        <option>Science & Math</option>
                        <option>Science Fiction & Fantasy</option>
                        <option>Travel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sort">Sort</label>
                    <select class="form-control" name="sort" id="sort">
                        <option></option>
                        <option>Number +</option>
                        <option>Number -</option>
                        <option>Author Sort A to Z</option>
                        <option>Author Sort Z to A</option>
                        <option>Title Sort A to Z</option>
                        <option>Title Sort Z to A</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select</button>
            </form>
        </div>
        <div class="form-inline">
            <form method="GET" action="{{ route('library.book.index') }}" class="">
                <div class="form-group">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" value="{{ request()->search }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Genre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->content_html }}</td>
                    <td><img src="{{ asset('images/library/test_img_book.png') }}" alt="the book"></td>
                    <td>{{ $item->genre }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        <div>
            {{ $items->withQueryString()->links() }}
        </div>
</div>

@endsection
