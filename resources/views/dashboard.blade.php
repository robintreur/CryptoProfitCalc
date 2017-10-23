@extends('layouts.app')
@section('body-class', 'dashboard')

@section('content')
<div class="container">
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="dropdown show">
                <a class="btn btn-primary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter active
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Show all</a>
                    <a class="dropdown-item" href="/dashboard/1">Show active</a>
                    <a class="dropdown-item" href="/dashboard/0">Show disabled</a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Active</th>
                        <th>Number of Cryptos</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if($user->is_admin == 1) Yes @else No @endif</td>
                            <td>
                                <form class="form-horizontal" method="POST" action="{{ route('dashboard') }}">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <input id="email" type="hidden" value="{{$user->email}}" class="form-control" name="email">

                                    <input type="checkbox" class="hidden active-true" name="active" value="1">
                                    <input type="checkbox" class="hidden active-false" name="active" value="0">

                                    <button type="submit" class="update_active btn btn-lg btn-toggle @if($user->active) active @endif" @if($user->active)aria-pressed="true" @else aria-pressed="false" @endif autocomplete="off" @if($user->is_admin) disabled @endif>
                                        <div class="handle"></div>
                                    </button>
                                </form>
                            </td>
                            <td>{{$user->cryptos->count()}}</td>
                            <td>{{$user->created_at->toFormattedDateString()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
