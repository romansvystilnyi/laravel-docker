@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="container">
            @include('users.admin.includes.result_messages')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('users.admin.includes.user_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('users.admin.includes.user_edit_add_col')
                </div>
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <div class="border-right">
            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-secondary">Delete</button>
            </form>
        </div>
    </div>
@endsection
