@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="GET" action="{{ route('library.book.index') }}">
                <div class="form-group">
                    <select class="form-control" name="genre" id="genre">
                        <option disabled hidden selected>Filters</option>
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
                    <select class="form-control" name="sort" id="sort">
                        <option disabled hidden selected>Sort</option>
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
            <div class="form-inline">
                <form method="GET" action="{{ route('library.book.index') }}" class="">
                    <div class="form-group">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search"
                               aria-label="Search" value="{{ request()->search }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="card justify-content-center col-md-12">
                <div class="card-body">
                    @auth
                        @if(Auth::user()->name == 'admin')
                            <a class="btn btn-primary" href="{{ route('library.admin.books.create') }}">Add</a>
                            @include('library.book.admin.includes.result_messages')
                        @endif
                    @endauth
                    <table class="table table-hover">
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
                                @auth
                                    @if(Auth::user()->name == 'admin')
                                        <td>
                                            <a class="text-decoration-none"
                                               href="{{ route('library.admin.books.edit', $item->id) }}">{{$item->id}}</a>
                                        </td>
                                    @else
                                        <td>{{$item->id}}</td>
                                    @endif
                                @else
                                    <td>{{$item->id}}</td>
                                @endauth
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{!! $item->content_html !!}</td>
                                <td>{!! $item->slug !!}</td>
                                @if(file_exists('storage/books/' . $item->slug))
                                    <td>
                                        <img src="{{ asset('storage/books/' . $item->slug) }}" alt="the book">
                                    </td>
                                @else
                                    <td>
                                        <img src="{{ asset('images/library/test_img_book.png') }}" alt="the book">
                                    </td>
                                @endif
                                <td>{{ $item->genre }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $items->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
