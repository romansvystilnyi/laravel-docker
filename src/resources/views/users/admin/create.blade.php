@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="container">
            @include('users.admin.includes.result_messages')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('users.admin.includes.user_create_main_col')
                </div>
                <div class="col-md-3">
                    @include('users.admin.includes.user_create_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
