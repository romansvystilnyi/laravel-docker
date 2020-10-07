@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('library.admin.books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            @include('library.book.admin.includes.result_messages')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('library.book.admin.includes.book_create_main_col')
                </div>
                <div class="col-md-3">
                    @include('library.book.admin.includes.book_create_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
