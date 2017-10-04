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

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Active</th>
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
                                <form class="form-horizontal" method="POST" action="/dashboard">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <input id="email" type="hidden" value="{{$user->email}}" class="form-control" name="email">

                                    <input type="checkbox" class="hidden active-true" name="active" value="1">
                                    <input type="checkbox" class="hidden active-false" name="active" value="0">

                                    <button type="submit" class="update_active btn btn-lg btn-toggle @if($user->active) active @endif" aria-pressed="@if($user->active) true @else false @endif" autocomplete="off">
                                        <div class="handle"></div>
                                    </button>
                                </form>
                            </td>
                            <td>{{$user->created_at->toFormattedDateString()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
