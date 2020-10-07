@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('library.admin.books.update', $book->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="container">
            @include('library.book.admin.includes.result_messages')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('library.book.admin.includes.book_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('library.book.admin.includes.book_edit_add_col')
                </div>
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="border-right">
            <form method="POST" action="{{ route('library.admin.books.destroy', $book->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-secondary">Delete</button>
            </form>
        </div>
    </div>
@endsection
