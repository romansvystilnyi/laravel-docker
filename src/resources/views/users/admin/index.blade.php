@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('users.admin.includes.result_messages')
            <form method="GET" action="{{ route('admin.users.index') }}">
                <div class="form-group">
                    <select class="form-control" name="verified" id="verified">
                        <option disabled hidden selected>Filters</option>
                        <option>email_verified_at - yes</option>
                        <option>email_verified_at - null</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="sort" id="sort">
                        <option disabled hidden selected>Sort</option>
                        <option>Number +</option>
                        <option>Number -</option>
                        <option>Name Sort A to Z</option>
                        <option>Name Sort Z to A</option>
                        <option>Email Sort A to Z</option>
                        <option>Email Sort Z to A</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select</button>
            </form>
            <div class="form-inline">
                <form method="GET" action="{{ route('admin.users.index') }}" class="">
                    <div class="form-group">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search"
                               aria-label="Search" value="{{ request()->search }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <br>
                <nav>
                    <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Add</a>
                </nav>
                <div class="card col-md-12">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>email_verified_at</th>
                                <th>password</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->email_verified_at == null)
                                            null
                                        @else {{ $user->email_verified_at }}
                                        @endif
                                    </td>
                                    <td>{{ $user->password }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if($users->total() > $users->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $users->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
